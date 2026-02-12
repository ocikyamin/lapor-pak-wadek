/**
 * Developer: Abdul Yamin, S.Pd., M.Kom
 * GitHub: https://github.com/ocikyamin
 */
$(function () {
    const sidebar = document.getElementById('sidebar');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const openMobileMenu = document.getElementById('openMobileMenu');
    const closeMobileMenu = document.getElementById('closeMobileMenu');

    function openMenu() {
        if (!sidebar || !mobileMenuOverlay) return;
        sidebar.classList.remove('-translate-x-full');
        mobileMenuOverlay.classList.remove('hidden');
        setTimeout(() => {
            mobileMenuOverlay.classList.remove('opacity-0');
        }, 10);
    }

    function closeMenu() {
        if (!sidebar || !mobileMenuOverlay) return;
        sidebar.classList.add('-translate-x-full');
        mobileMenuOverlay.classList.add('opacity-0');
        setTimeout(() => {
            mobileMenuOverlay.classList.add('hidden');
        }, 300);
    }

    openMobileMenu?.addEventListener('click', openMenu);
    closeMobileMenu?.addEventListener('click', closeMenu);
    mobileMenuOverlay?.addEventListener('click', closeMenu);

    // Close menu when clicking a nav item on mobile
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
                closeMenu();
            }
        });
    });

    // Dynamic Active Menu Handling
    const currentUrl = window.location.href;
    const navLinks = document.querySelectorAll('.nav-item');

    // Classes for Active and Inactive states
    const activeClasses = ['active', 'bg-gradient-to-r', 'from-primary', 'to-primary-light', 'text-white', 'shadow-lg', 'shadow-primary/30'];
    const inactiveClasses = ['text-slate-600', 'hover:text-primary', 'hover:bg-primary/5'];

    navLinks.forEach(link => {
        const dashboardUrl = window.ADMIN_DASHBOARD_URL;
        if (link.href === currentUrl || (currentUrl.includes(link.href) && link.href !== dashboardUrl)) {
            link.classList.remove(...inactiveClasses);
            link.classList.add(...activeClasses);

            const badge = link.querySelector('.badge-counter');
            if (badge) {
                badge.classList.remove('bg-primary', 'text-white');
                badge.classList.add('bg-white', 'text-primary');
            }
        }
    });

    // AJAX Notification Count
    function updateNotificationCount() {
        if (!window.NOTIF_COUNT_URL) return;

        $.ajax({
            url: window.NOTIF_COUNT_URL,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                const count = response.unread;
                $('#notif-badge').text(count);
                $('#sidebar-badge').text(count);

                // Update Header Quick Stats
                $('#header-total-count').text(response.total);
                $('#header-selesai-count').text(response.selesai);

                if (count > 0) {
                    $('#notif-badge').parent().removeClass('hidden');
                } else {
                    $('#notif-badge').parent().addClass('hidden');
                }
            }
        });
    }

    // Run initially and then every 30 seconds
    updateNotificationCount();
    setInterval(updateNotificationCount, 30000);

    // Dark Mode Logic
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;

    darkModeToggle?.addEventListener('click', () => {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
});
