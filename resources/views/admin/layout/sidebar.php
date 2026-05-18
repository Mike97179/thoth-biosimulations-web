<aside class="adminSidebar">
    <div class="adminSidebar__logo">
        <div class="nav__container__logo--letter">
            <span>T</span>
        </div>
        <span>Admin Panel</span>
    </div>
    <nav class="adminSidebar__nav">
        <a href="/admin" class="adminSidebar__nav--link <?php echo $url == '/admin' ? 'active' : ''; ?>">
            <i class="fa-regular fa-gauge-high"></i>
            Dashboard
        </a>
        <a href="/admin/news" class="adminSidebar__nav--link <?php echo $url == '/admin/news' ? 'active' : ''; ?>">
            <i class="fa-regular fa-newspaper"></i>
            News
        </a>
        <a href="/admin/team" class="adminSidebar__nav--link <?php echo $url == '/admin/team' ? 'active' : ''; ?>">
            <i class="fa-regular fa-user"></i>
            Team
        </a>
        <a href="/admin/faqs" class="adminSidebar__nav--link <?php echo $url == '/admin/faqs' ? 'active' : ''; ?>">
            <i class="fa-regular fa-circle-question"></i>
            FAQs
        </a>
        <a href="/admin/partners" class="adminSidebar__nav--link <?php echo $url == '/admin/partners' ? 'active' : ''; ?>">
            <i class="fa-regular fa-handshake"></i>
            Partners
        </a>
        <a href="/admin/tickets" class="adminSidebar__nav--link <?php echo $url == '/admin/tickets' ? 'active' : ''; ?>">
            <i class="fa-regular fa-ticket"></i>
            Tickets
        </a>
        <a href="/admin/users" class="adminSidebar__nav--link <?php echo $url == '/admin/users' ? 'active' : ''; ?>">
            <i class="fa-regular fa-users"></i>
            Users
        </a>
        <a href="/admin/tools" class="adminSidebar__nav--link <?php echo $url == '/admin/tools' ? 'active' : ''; ?>">
            <i class="fa-regular fa-wrench"></i>
            Tools
        </a>
        <a href="/admin/careers" class="adminSidebar__nav--link <?php echo $url == '/admin/careers' ? 'active' : ''; ?>">
            <i class="fa-regular fa-briefcase"></i>
            Careers
        </a>
    </nav>
    <div class="adminSidebar__footer">
        <a href="/" class="adminSidebar__footer--link">
            <i class="fa-regular fa-arrow-left"></i>
            Back to Site
        </a>
    </div>
</aside>
