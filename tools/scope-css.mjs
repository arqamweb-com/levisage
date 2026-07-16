/**
 * Scope the compiled Tailwind bundle under `.lv-page`.
 *
 *   src/landing.css --(tailwind)--> css/.landing-vigilant.build.css --(this)--> css/landing-vigilant.css
 *
 * Two things happen here, and both are load-bearing:
 *
 * 1. Every selector is prefixed with `.lv-page`, so Tailwind's preflight
 *    (`*,::before,::after{margin:0;border:0}`, `h1..h6{font-size:inherit}`)
 *    stays inside the landing page and can't strip the Astra header/footer.
 *
 * 2. `@layer` wrappers are removed. Anything inside a cascade layer loses to
 *    unlayered CSS no matter how specific it is — Astra's `a{color:#0971b7}`
 *    would beat `.lv-page .text-white`. Source order already encodes Tailwind's
 *    layer order, so unwrapping keeps the intent and lets specificity decide.
 */
import { readFileSync, writeFileSync } from 'node:fs';

const SCOPE = '.lv-page';
const IN = new URL('../css/.landing-vigilant.build.css', import.meta.url);
const OUT = new URL('../css/landing-vigilant.css', import.meta.url);

const AT_GLOBAL = ['@property', '@keyframes', '@-webkit-keyframes', '@font-face', '@charset', '@page', '@counter-style'];
const AT_NESTED = ['@media', '@supports', '@container', '@scope'];

/** Split a selector list on top-level commas (not inside :is(…) or [..]). */
function splitSelectors(selector) {
    const parts = [];
    let depth = 0;
    let buffer = '';

    for (const char of selector) {
        if (char === '(' || char === '[') depth += 1;
        if (char === ')' || char === ']') depth -= 1;

        if (char === ',' && depth === 0) {
            parts.push(buffer.trim());
            buffer = '';
        } else {
            buffer += char;
        }
    }

    if (buffer.trim()) parts.push(buffer.trim());
    return parts;
}

function scopeOne(selector) {
    const s = selector.trim();
    if (!s) return s;

    // custom-property carriers stay global — they only declare variables
    if (s === ':root' || s === ':host') return s;

    // html/body styling belongs to the wrapper itself
    if (s === 'html' || s === 'body') return SCOPE;
    if (s.startsWith('html ')) return SCOPE + s.slice(4);
    if (s.startsWith('body ')) return SCOPE + s.slice(4);

    // preflight universals
    if (s === '*') return `${SCOPE} *`;

    return `${SCOPE} ${s}`;
}

function scopeSelectorList(selector) {
    return [...new Set(splitSelectors(selector).map(scopeOne))].join(',');
}

/** i points at '{' — return [body, indexAfterClosingBrace]. */
function readBlock(css, i) {
    let depth = 0;

    for (let j = i; j < css.length; j += 1) {
        if (css[j] === '{') depth += 1;
        else if (css[j] === '}') {
            depth -= 1;
            if (depth === 0) return [css.slice(i + 1, j), j + 1];
        }
    }

    return [css.slice(i + 1), css.length];
}

function transform(css) {
    const out = [];
    let i = 0;

    while (i < css.length) {
        let j = i;
        while (j < css.length && css[j] !== '{' && css[j] !== ';') j += 1;
        if (j >= css.length) {
            out.push(css.slice(i));
            break;
        }

        const prelude = css.slice(i, j);

        if (css[j] === ';') {                                   // statement at-rule
            out.push(`${prelude};`);
            i = j + 1;
            continue;
        }

        const head = prelude.trim();
        const [body, after] = readBlock(css, j);

        if (AT_GLOBAL.some((at) => head.startsWith(at))) {
            out.push(`${prelude}{${body}}`);                    // verbatim
        } else if (head.startsWith('@layer')) {
            out.push(transform(body));                          // drop the layer wrapper
        } else if (AT_NESTED.some((at) => head.startsWith(at))) {
            out.push(`${prelude}{${transform(body)}}`);         // recurse
        } else {
            out.push(`${scopeSelectorList(head)}{${body}}`);    // plain rule
        }

        i = after;
    }

    return out.join('');
}

const source = readFileSync(IN, 'utf8');
const banner = `/*! VIGILANT landing — GENERATED from src/landing.css. Do not edit.\n    Scoped under ${SCOPE}; run \`npm run build:css\` to rebuild. */\n`;
const result = banner + transform(source);

writeFileSync(OUT, result);

const kb = (n) => `${(n / 1024).toFixed(1)} KB`;
console.log(`scoped ${kb(source.length)} → ${kb(result.length)}  css/landing-vigilant.css`);
