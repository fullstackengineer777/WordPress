"use strict";
(function () {
    var a11yClass = 'a11y-mode-on';
    var scrollTopShowAfter = _sports_highlight.scrollTopShowAfter;
    /**
     * Accessibility related scripts.
     */
    var accessibility = function () {
        /**
         * Add class to body on tab key pressed.
         * @param event Keyboard event
         */
        document.onkeydown = function (event) {
            var isTabPressed = 'Tab' === event.key;
            var isDoingReverse = event.shiftKey && isTabPressed;
            if (isTabPressed || isDoingReverse) {
                document.body.classList.add(a11yClass);
            }
        };
        /**
         * Remove class from the body on mouse move.
         */
        document.onmousemove = function () {
            document.body.classList.remove(a11yClass);
        };
    };
    var trapFocus = function (allElements, btnMenuOpen, btnMenuClose) {
        function onKeyDownTrapFocus(event) {
            var style = window.getComputedStyle(btnMenuOpen);
            if ('none' === style.display) {
                return;
            }
            var elements, selectors, lastEl, firstEl, activeEl, tabKey, shiftKey, escKey;
            selectors = 'a, button';
            elements = allElements.querySelectorAll(selectors);
            elements = Array.prototype.slice.call(elements);
            tabKey = event.key === 'Tab';
            shiftKey = event.shiftKey;
            escKey = event.key === 'Escape';
            activeEl = document.activeElement; // eslint-disable-line @wordpress/no-global-active-element
            firstEl = elements[0];
            lastEl = elements[elements.length - 1];
            if (escKey) {
                event.preventDefault();
                btnMenuClose.focus();
            }
            if (!shiftKey && tabKey && lastEl === activeEl) {
                event.preventDefault();
                btnMenuClose.focus();
            }
            if (shiftKey && tabKey && firstEl === activeEl) {
                event.preventDefault();
                lastEl.focus();
            }
            // If there are no elements in the menu, don't move the focus
            if (tabKey && firstEl === lastEl) {
                event.preventDefault();
            }
        }
        document.addEventListener('keydown', onKeyDownTrapFocus);
    };
    /**
     * OffCanvas Slide.
     */
    var offCanvasSidebarToggler = function () {
        var sideMenuTrigger = document.querySelector('.side-menu-trigger');
        var closeBtnCanvas = document.querySelector('.closebtn-canvas');
        if (!sideMenuTrigger) {
            return;
        }
        if (!closeBtnCanvas) {
            return;
        }
        var offCanvas = document.querySelector('.sidecanvas');
        if (!offCanvas) {
            return;
        }
        /* Open Trigger OffCanvas */
        sideMenuTrigger && sideMenuTrigger.addEventListener('click', function () {
            offCanvas.style.removeProperty('display');
            closeBtnCanvas.style.display = 'inline-flex';
            setTimeout(function () {
                offCanvas.classList.add("show");
            }, 10);
        });
        /* Close Trigger OffCanvas */
        closeBtnCanvas && closeBtnCanvas.addEventListener('click', function (event) {
            event.preventDefault();
            offCanvas.classList.remove("show");
            closeBtnCanvas.style.display = 'none';
            setTimeout(function () {
                offCanvas.style.display = 'none';
            }, 900);
            sideMenuTrigger.focus();
        });
        trapFocus(document.querySelector('.offcanvas-nav-wrap'), sideMenuTrigger, closeBtnCanvas);
    };
    /**
     *  Mobile Search Icon Trigger
     */
    var mobileSearchToggle = function () {
        var mobileSearchIc = document.querySelector('.mobile-search-wrap');
        /* Open Main Navigation */
        mobileSearchIc && mobileSearchIc.addEventListener('click', function () {
            var searchForm = document.querySelector('.search-form');
            searchForm && searchForm.classList.toggle("search-active");
        });
    };
    /**
     * Scroll to top on button click.
     */
    var scrollToTop = function () {
        var btnScrollToTop = document.querySelector('.back-to-top');
        if (null === btnScrollToTop) {
            return;
        }
        /**
         * Track scroll and show/hide button.
         */
        window.addEventListener('scroll', function () {
            var scrolled = window.pageYOffset;
            if (scrolled > scrollTopShowAfter) {
                btnScrollToTop.classList.add('back-to-top-show');
            }
            if (scrolled < scrollTopShowAfter) {
                btnScrollToTop.classList.remove('back-to-top-show');
            }
        });
        /**
         * Scroll to top on button click.
         */
        btnScrollToTop.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        });
    };
    /**
     * Script for handling navigation related work.
     */
    var navigations = function () {
        var primaryMenu = function () {
            // Get all the link elements within the primary menu.
            var i, len, menu = document.querySelector('.menu-header-menu-container');
            if (!menu) {
                return false;
            }
            var links = menu.getElementsByTagName('a');
            // Each time a menu link is focused or blurred, toggle focus.
            for (i = 0, len = links.length; i < len; i++) {
                links[i].addEventListener('focus', toggleFocus, true);
                links[i].addEventListener('blur', toggleFocus, true);
                links[i].addEventListener('mouseenter', toggleFocus, true);
                links[i].addEventListener('mouseleave', toggleFocus, true);
            }
            //Sets or removes the .focus class on an element.
            function toggleFocus() {
                var self = this;
                // Move up through the ancestors of the current link until we hit .primary-menu.
                while (-1 === self.className.indexOf('menu-header-menu-container')) {
                    // On li elements toggle the class .focus.
                    if ('li' === self.tagName.toLowerCase()) {
                        if (-1 !== self.className.indexOf('focus')) {
                            self.className = self.className.replace(' focus', '');
                        }
                        else {
                            self.className += ' focus';
                        }
                    }
                    self = self.parentElement;
                }
            }
        };
        var mobileNavigation = function () {
            var mainMenuArea = document.querySelector('.main-menu-area');
            if (!mainMenuArea) {
                return;
            }
            var primaryMenu = mainMenuArea.querySelector('#primary-menu');
            if (!primaryMenu) {
                return;
            }
            var mainNavigation = document.querySelector('.main-navigation');
            var btnMenuOpen = document.querySelector('.menu-toggle');
            var btnMenuClose = document.querySelector('.mobile-menu-close');
            ;
            if (null === btnMenuOpen) {
                return;
            }
            var toggleMobileMenuContainer = function (event) {
                event.preventDefault();
                mainMenuArea === null || mainMenuArea === void 0 ? void 0 : mainMenuArea.classList.toggle('menu-expanded');
                mainNavigation && mainNavigation.classList.toggle("shown");
                mainMenuArea.classList.contains('menu-expanded') ? btnMenuClose.focus() : btnMenuOpen.focus();
            };
            btnMenuOpen === null || btnMenuOpen === void 0 ? void 0 : btnMenuOpen.addEventListener('click', toggleMobileMenuContainer);
            btnMenuClose === null || btnMenuClose === void 0 ? void 0 : btnMenuClose.addEventListener('click', toggleMobileMenuContainer);
            /**
             * Toggle classes on submenu button clicked.
             */
            var subMenuToggleButtons = document.querySelectorAll('#site-navigation .btn-mobile-submenu');
            if (subMenuToggleButtons.length) {
                subMenuToggleButtons.forEach(function (subMenuToggleButton) {
                    subMenuToggleButton.addEventListener('click', function () {
                        var _a;
                        var currentSubMenuToggleBtn = this;
                        /**
                         * Toggle classes in sub menu and button.
                         */
                        currentSubMenuToggleBtn.classList.toggle('active');
                        (_a = currentSubMenuToggleBtn.nextElementSibling) === null || _a === void 0 ? void 0 : _a.classList.toggle('expanded');
                    });
                });
            }
            trapFocus(primaryMenu, btnMenuOpen, btnMenuClose);
        };
        primaryMenu();
        mobileNavigation();
    };
    /**
     * Run our script on document load.
     */
    window.onload = function () {
        accessibility();
        offCanvasSidebarToggler();
        mobileSearchToggle();
        scrollToTop();
        navigations();
    };
})();
//# sourceMappingURL=index.js.map