<?php require_once '../../resources/config.php'; ?>

<?php
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        redirect('/');
    }
?>

<?php
    if ($url == '/admin') {
        include VIEW_ADMIN . DS . 'dashboard.php';
    }

    // News
    if ($url == '/admin/news') {
        include VIEW_ADMIN . DS . 'news.php';
    }
    if ($url == '/admin/news/create') {
        postCreateNews();
    }
    if ($url == '/admin/news/edit') {
        postEditNews();
    }
    if ($url == '/admin/news/delete') {
        getDeleteNews();
    }
    
    // Team
    if ($url == '/admin/team') {
        include VIEW_ADMIN . DS . 'team.php';
    }
    if ($url == '/admin/team/create') {
        postCreateMember();
    }
    if ($url == '/admin/team/edit') {
        postEditMember();
    }
    if ($url == '/admin/team/delete') {
        getDeleteMember();
    }

    // FAQs
    if ($url == '/admin/faqs') {
        include VIEW_ADMIN . DS . 'faqs.php';
    }
    if ($url == '/admin/faqs/create') {
        postCreateFaq();
    }
    if ($url == '/admin/faqs/edit') {
        postEditFaq();
    }
    if ($url == '/admin/faqs/delete') {
        getDeleteFaq();
    }

    // Partners
    if ($url == '/admin/partners') {
        include VIEW_ADMIN . DS . 'partners.php';
    }
    if ($url == '/admin/partners/create') {
        postCreatePartner();
    }
    if ($url == '/admin/partners/edit') {
        postEditPartner();
    }
    if ($url == '/admin/partners/delete') {
        getDeletePartner();
    }

    // Tickets
    if ($url == '/admin/tickets') {
        include VIEW_ADMIN . DS . 'tickets.php';
    }
    if ($url == '/admin/tickets/status') {
        postUpdateTicketStatus();
    }
    if ($url == '/admin/tickets/delete') {
        getDeleteTicket();
    }

    // Tools
    if ($url == '/admin/tools') {
        include VIEW_ADMIN . DS . 'tools.php';
    }
    if ($url == '/admin/tools/create') {
        postCreateTool();
    }
    if ($url == '/admin/tools/edit') {
        postEditTool();
    }
    if ($url == '/admin/tools/delete') {
        getDeleteTool();
    }

    // Careers
    if ($url == '/admin/careers') {
        include VIEW_ADMIN . DS . 'careers.php';
    }
    if ($url == '/admin/careers/create') {
        postCreateCareer();
    }
    if ($url == '/admin/careers/edit') {
        postEditCareer();
    }
    if ($url == '/admin/careers/delete') {
        getDeleteCareer();
    }

    // Users
    if ($url == '/admin/users') {
        include VIEW_ADMIN . DS . 'users.php';
    }
    if ($url == '/admin/users/delete') {
        getDeleteUser();
    }

?>