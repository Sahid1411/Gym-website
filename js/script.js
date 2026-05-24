document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.getElementById('menu-toggle');
            const menuClose = document.getElementById('menu-close');
            const navDrawer = document.getElementById('nav-drawer');
            const overlay = document.getElementById('drawer-overlay');

            function openMenu() {
                navDrawer.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevents background scrolling
            }

            function closeMenu() {
                navDrawer.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            menuToggle.addEventListener('click', openMenu);
            menuClose.addEventListener('click', closeMenu);
            overlay.addEventListener('click', closeMenu); // Close when clicking outside
        });