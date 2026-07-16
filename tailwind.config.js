/**
 * Tailwind config for the ArqamWeb (LeVisage) THEME build.
 * Used by src/theme.css (@config) → compiled into css/main.min.css.
 *
 * `content` controls which files Tailwind scans for utility class names.
 * Add or remove globs here to change what gets scanned.
 *
 * NOTE: the theme build imports Tailwind WITHOUT preflight (see src/theme.css)
 * so it never resets the Astra parent theme / WooCommerce styling.
 *
 * The VIGILANT landing page has its own separate build (src/landing.css) and
 * is NOT affected by this config.
 *
 * @type {import('tailwindcss').Config}
 */
module.exports = {
  content: [
    './*.php',                 // front-page.php, header.php, footer.php ...
    './template/**/*.php',     // about, contact, pharmacies, site-header, components ...
    './inc/**/*.php',          // includes that print markup
    './js/**/*.js',

    // Exclude the VIGILANT landing — it has its own scoped Tailwind build
    // (src/landing.css). Scanning it here would pull hundreds of utilities
    // into the site-wide main.min.css.
    '!./template/landing-page.php',
    '!./js/landing-vigilant.js',
  ],
};
