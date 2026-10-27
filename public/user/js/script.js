document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('.sidebar');
    const menuToggle = document.getElementById('menuToggle');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const profileButton = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    const closeSidebar = () => {
        sidebar?.classList.remove('active');
        document.body.classList.remove('sidebar-open');
    };

    menuToggle?.addEventListener('click', () => {
        sidebar?.classList.toggle('active');
        document.body.classList.toggle('sidebar-open', sidebar?.classList.contains('active') ?? false);
    });

    sidebarToggle?.addEventListener('click', closeSidebar);

    document.addEventListener('click', event => {
        if (sidebar && event.target instanceof Node && !sidebar.contains(event.target) && !menuToggle?.contains(event.target)) {
            closeSidebar();
        }

        if (
            profileButton
            && profileDropdown
            && event.target instanceof Node
            && !profileButton.contains(event.target)
            && !profileDropdown.contains(event.target)
        ) {
            profileDropdown.classList.remove('active');
            profileButton.setAttribute('aria-expanded', 'false');
        }
    });

    profileButton?.addEventListener('click', event => {
        event.stopPropagation();
        const isExpanded = profileDropdown?.classList.toggle('active') ?? false;
        profileButton.setAttribute('aria-expanded', String(isExpanded));
    });
});
