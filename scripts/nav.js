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

    var navContainer = querySelector('.nav-container');
    var subSelect = querySelector('.sub');
    var main = querySelector('main');

    if (document.querySelector('.nav-menu') !== null) {
        // .. nav-menu exists
        var NavBtn = querySelector('.nav-menu');
    } else {
        // .. exit function
        return false;
    }

    function closeMenu() {
        NavBtn.classList.remove('sub-open');
        subSelect.classList.remove('sub-open');
        navContainer.classList.remove('sub-open');
    }

    function toggleMenu() {
        NavBtn.classList.toggle('sub-open');
        subSelect.classList.toggle('sub-open');
        navContainer.classList.toggle('sub-open');
    }

    main.addEventListener('click', closeMenu);
    NavBtn.addEventListener('click', toggleMenu);
    navContainer.addEventListener('click', function (event) {
        if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
            closeMenu();
        }
    });
})();