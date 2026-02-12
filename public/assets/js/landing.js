/**
 * Developer: Abdul Yamin, S.Pd., M.Kom
 * GitHub: https://github.com/ocikyamin
 */
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const icon = btn.querySelector('.material-icons-round');

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
