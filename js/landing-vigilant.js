/**
 * VIGILANT landing page — the behaviour the React version had, in vanilla JS.
 * Countdown, FAQ accordion, package picker, exit-intent popup, form validation.
 */
(function () {
    'use strict';

    var page = document.querySelector('.lv-page');
    if (!page) {
        return;
    }

    /* ---------------------------------------------------------------- countdown
       The offer window is per-visitor and survives a reload, so the timer never
       resets to 6:00:00 on every page view. */
    (function countdown() {
        var boxes = page.querySelectorAll('.tabular-nums');
        if (boxes.length < 3) {
            return;
        }

        var WINDOW_MS = 6 * 60 * 60 * 1000;
        var key = 'lvVigilantDeadline';
        var deadline = parseInt(window.localStorage.getItem(key) || '0', 10);

        if (!deadline || deadline < Date.now()) {
            deadline = Date.now() + WINDOW_MS;
            window.localStorage.setItem(key, String(deadline));
        }

        var pad = function (n) {
            return n < 10 ? '0' + n : String(n);
        };

        var tick = function () {
            var left = Math.max(0, deadline - Date.now());
            var h = Math.floor(left / 3600000);
            var m = Math.floor((left % 3600000) / 60000);
            var s = Math.floor((left % 60000) / 1000);

            boxes[0].textContent = pad(h);
            boxes[1].textContent = pad(m);
            boxes[2].textContent = pad(s);
        };

        tick();
        window.setInterval(tick, 1000);
    }());

    /* -------------------------------------------------------------- accordion */
    page.querySelectorAll('.lv-acc-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var panel = document.getElementById(trigger.getAttribute('aria-controls'));
            var isOpen = trigger.getAttribute('aria-expanded') === 'true';

            // single-open, like the original
            page.querySelectorAll('.lv-acc-trigger[aria-expanded="true"]').forEach(function (other) {
                if (other !== trigger) {
                    close(other, document.getElementById(other.getAttribute('aria-controls')));
                }
            });

            if (isOpen) {
                close(trigger, panel);
            } else {
                open(trigger, panel);
            }
        });
    });

    function open(trigger, panel) {
        panel.hidden = false;
        // the compiled keyframes animate to this height
        panel.style.setProperty('--radix-accordion-content-height', panel.scrollHeight + 'px');
        panel.setAttribute('data-state', 'open');
        trigger.setAttribute('data-state', 'open');
        trigger.setAttribute('aria-expanded', 'true');
        trigger.closest('[data-state]').setAttribute('data-state', 'open');
    }

    function close(trigger, panel) {
        panel.hidden = true;
        panel.setAttribute('data-state', 'closed');
        trigger.setAttribute('data-state', 'closed');
        trigger.setAttribute('aria-expanded', 'false');
        trigger.closest('[data-state]').setAttribute('data-state', 'closed');
    }

    /* ------------------------------------------- package picker + live totals
       Shipping comes from the real WooCommerce zones (localised server-side), so
       the number here is the number the order will be charged. A governorate with
       no zone shows "confirmed by phone" rather than a fake 0. */
    var config = window.LV_LANDING || { prices: {}, shipping: {}, strings: {} };
    var packages = page.querySelectorAll('.lv-pkg');
    var govField = page.querySelector('#lv-gov');
    var subtotalEl = page.querySelector('[data-lv-subtotal]');
    var shippingEl = page.querySelector('[data-lv-shipping]');
    var totalEls = page.querySelectorAll('[data-lv-total]');

    var selectedPackage = function () {
        var checked = page.querySelector('.lv-pkg-input:checked');
        return checked ? checked.value : 'bundle';
    };

    var syncTotals = function () {
        packages.forEach(function (label) {
            label.classList.toggle('is-selected', label.querySelector('.lv-pkg-input').checked);
        });

        var price = config.prices[selectedPackage()] || 0;
        var currency = config.strings.currency || '';
        var gov = govField ? govField.value : '';
        var shipping = gov ? config.shipping[gov] : undefined;

        if (subtotalEl) {
            subtotalEl.textContent = price;
        }

        if (shippingEl) {
            if (!gov) {
                shippingEl.textContent = config.strings.pickGovernorate || '';
            } else if (shipping === null || shipping === undefined) {
                shippingEl.textContent = config.strings.noZone || '';
            } else {
                shippingEl.textContent = shipping > 0 ? shipping + ' ' + currency : 'مجاني';
            }
        }

        var total = price + (typeof shipping === 'number' ? shipping : 0);
        totalEls.forEach(function (el) {
            el.textContent = total;
        });
    };

    packages.forEach(function (label) {
        label.querySelector('.lv-pkg-input').addEventListener('change', syncTotals);
    });

    if (govField) {
        govField.addEventListener('change', syncTotals);
    }

    syncTotals();

    /* ---------------------------------------------------- form validation (AR) */
    var form = page.querySelector('form[method="post"]');

    if (form) {
        form.addEventListener('submit', function (event) {
            var problems = 0;

            form.querySelectorAll('.lv-error-msg').forEach(function (el) {
                el.remove();
            });

            var check = function (field, message, valid) {
                field.classList.toggle('lv-invalid', !valid);

                if (!valid) {
                    var note = document.createElement('div');
                    note.className = 'lv-error-msg';
                    note.textContent = message;
                    field.parentNode.appendChild(note);
                    problems += 1;
                }
            };

            var name = form.querySelector('#lv-name');
            var phone = form.querySelector('#lv-phone');
            var gov = form.querySelector('#lv-gov');
            var address = form.querySelector('#lv-address');

            check(name, 'اكتب اسمك بالكامل.', name.value.trim().length >= 3);
            check(phone, 'رقم الموبايل لازم يكون 11 رقم ويبدأ بـ 01.', /^01[0-9]{9}$/.test(phone.value.trim()));
            check(gov, 'اختر المحافظة.', gov.value !== '');
            check(address, 'اكتب العنوان بالتفصيل.', address.value.trim().length >= 10);

            if (problems > 0) {
                event.preventDefault();
                form.querySelector('.lv-invalid').focus();
            }
        });
    }

    /* ------------------------------------------------------- exit-intent popup */
    (function exitIntent() {
        var dialog = page.querySelector('[data-lv-exit]');
        if (!dialog || window.sessionStorage.getItem('lvVigilantExitSeen')) {
            return;
        }

        var show = function () {
            if (window.sessionStorage.getItem('lvVigilantExitSeen')) {
                return;
            }
            dialog.hidden = false;
            window.sessionStorage.setItem('lvVigilantExitSeen', '1');
        };

        var hide = function () {
            dialog.hidden = true;
        };

        // desktop: cursor leaves through the top of the viewport
        document.addEventListener('mouseout', function (event) {
            if (!event.relatedTarget && event.clientY <= 0) {
                show();
            }
        });

        // mobile has no exit intent — fall back to a scroll-depth trigger
        var mobileTriggered = false;
        window.addEventListener('scroll', function () {
            if (mobileTriggered || window.innerWidth > 768) {
                return;
            }
            var depth = (window.scrollY + window.innerHeight) / document.body.scrollHeight;
            if (depth > 0.55) {
                mobileTriggered = true;
                show();
            }
        }, { passive: true });

        dialog.querySelectorAll('[data-lv-exit-close]').forEach(function (el) {
            el.addEventListener('click', hide);
        });

        dialog.addEventListener('click', function (event) {
            if (event.target === dialog) {
                hide();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                hide();
            }
        });
    }());

    /* --------------------------------------------- smooth scroll to the form */
    page.querySelectorAll('a[href="#order"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            var target = document.getElementById('order');
            if (!target) {
                return;
            }
            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
}());
