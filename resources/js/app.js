import './bootstrap';
import 'flowbite';
// import { Tabs } from 'flowbite';
import { Modal } from 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});

// const tabElements = [
//     {
//         id: 'rentee',
//         triggerEl: document.querySelector('#rentee-tab'),
//         targetEl: document.querySelector('#rentee')
//     },
//     {
//         id: 'renter',
//         triggerEl: document.querySelector('#renter-tab'),
//         targetEl: document.querySelector('#renter')
//     },
// ];

// // options with default values
// const options = {
//     defaultTabId: 'rentee',
//     activeClasses: 'text-red-600 hover:text-blue-600 dark:text-red-100 dark:hover:text-red-400 border-red-600 dark:border-red-500',
//     inactiveClasses: 'text-neutral-500 hover:text-neutral-600 dark:text-neutral-400 border-neutral-100 hover:border-neutral-300 dark:border-neutral-700 dark:hover:text-neutral-300',
// };

// const tabs = new Tabs(tabElements, options);
