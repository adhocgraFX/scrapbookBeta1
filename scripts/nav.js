/*  Web Starter Kit
     *  Copyright 2014 Google Inc. All rights reserved.
     *
     *  Licensed under the Apache License, Version 2.0 (the "License");
     *  you may not use this file except in compliance with the License.
     *  You may obtain a copy of the License at
     *
     *  https://www.apache.org/licenses/LICENSE-2.0
     *
     *  Unless required by applicable law or agreed to in writing, software
     *  distributed under the License is distributed on an "AS IS" BASIS,
     *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *  See the License for the specific language governing permissions and
     *  limitations under the License */

(function () {
    'use strict';

    var querySelector = document.querySelector.bind(document);
    var main = document.querySelector('main');
    var navContainer = document.querySelector('.nav-container');
    var x = document.querySelectorAll('.nav-menu').length;

    var i;

    if (x !== null) {
        // .. nav-menu exists
        var navButtons = document.querySelectorAll('.nav-menu');
    } else {
        // .. exit function
        return false;
    }

    function closeMenu() {
        for (i = 0; i < navButtons.length; i++) {
            navButtons[i].classList.remove('open');
        }
    }

    main.addEventListener('click', closeMenu);

    navContainer.addEventListener('click', function (event) {
        if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
            closeMenu();
        }
    });

    Array.from(navButtons).forEach(link => {
        link.addEventListener('click', function (event) {
            link.classList.toggle('open');
        });
    });

})();