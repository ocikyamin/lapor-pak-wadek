/**
 * Developer: Abdul Yamin, S.Pd., M.Kom
 * GitHub: https://github.com/ocikyamin
 */

let deferredPrompt;

// PWA Install Logic
window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;

    // Show the install buttons
    const installBtns = document.querySelectorAll('.pwa-install-btn');
    installBtns.forEach(btn => {
        btn.classList.remove('hidden');
        btn.addEventListener('click', () => {
            // Show the prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                } else {
                    console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
                // Hide buttons again after the choice
                installBtns.forEach(b => b.classList.add('hidden'));
            });
        });
    });
});

window.addEventListener('appinstalled', (evt) => {
    console.log('App was installed');
    // Hide all install buttons if the app is already installed
    document.querySelectorAll('.pwa-install-btn').forEach(b => b.classList.add('hidden'));
});

document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    // Mobile menu toggle
    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.add('open');
            document.body.style.overflow = 'hidden';
        });
    }

    const closeBtn = document.getElementById('close-mobile-menu');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            menu.classList.remove('open');
            document.body.style.overflow = '';
        });
    }

    // Close menu when clicking outside
    if (menu) {
        menu.addEventListener('click', (e) => {
            if (e.target === menu) {
                menu.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    }

    // Scroll to Top functionality
    const scrollBtn = document.getElementById('scrollToTop');
    if (scrollBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.remove('translate-y-20', 'opacity-0');
                scrollBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                scrollBtn.classList.remove('translate-y-0', 'opacity-100');
                scrollBtn.classList.add('translate-y-20', 'opacity-0');
            }
        });

        scrollBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
