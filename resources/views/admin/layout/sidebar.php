<?php showSwalMessage(); ?>
<aside class="adminSidebar">
    <div class="adminSidebar__logo">
        <div class="nav__container__logo--letter">
            <span>T</span>
        </div>
        <span>Admin Panel</span>
    </div>
    <nav class="adminSidebar__nav">
        <a href="/admin" class="adminSidebar__nav--link <?php echo $url == '/admin' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">dashboard</span>
            Dashboard
        </a>
        <a href="/admin/news" class="adminSidebar__nav--link <?php echo $url == '/admin/news' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">news</span>
            News
        </a>
        <a href="/admin/team" class="adminSidebar__nav--link <?php echo $url == '/admin/team' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">group</span>
            Team
        </a>
        <a href="/admin/faqs" class="adminSidebar__nav--link <?php echo $url == '/admin/faqs' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">help</span>
            FAQs
        </a>
        <a href="/admin/partners" class="adminSidebar__nav--link <?php echo $url == '/admin/partners' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">handshake</span>
            Partners
        </a>
        <a href="/admin/tickets" class="adminSidebar__nav--link <?php echo $url == '/admin/tickets' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">inbox</span>
            Tickets
        </a>
        <a href="/admin/users" class="adminSidebar__nav--link <?php echo $url == '/admin/users' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">contacts_product</span>
            Users
        </a>
        <a href="/admin/tools" class="adminSidebar__nav--link <?php echo $url == '/admin/tools' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">construction</span>
            Tools
        </a>
        <a href="/admin/careers" class="adminSidebar__nav--link <?php echo $url == '/admin/careers' ? 'active' : ''; ?>">
            <span class="material-symbols-outlined">work</span>
            Careers
        </a>
    </nav>
    <div class="adminSidebar__footer">
        <a href="/" class="adminSidebar__footer--link">
            <span class="material-symbols-outlined">arrow_circle_left</span>
            Back to Site
        </a>
    </div>
</aside>
