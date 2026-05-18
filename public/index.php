<?php require_once '../resources/config.php'; ?>

<?php
    if ($url == '/') $pageTitle = 'Thoth Biosimulations';
    if ($url == '/about') $pageTitle = 'About | Thoth Biosimulations';
    if ($url == '/tools') $pageTitle = 'Tools | Thoth Biosimulations';
    if ($url == '/news') $pageTitle = 'News | Thoth Biosimulations';
    if ($url == '/contact') $pageTitle = 'Contact | Thoth Biosimulations';
?>

<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

    <?php
        if ($url == '/') {
            include VIEW_LAND . DS . 'home' . DS . 'header.php';
            include VIEW_LAND . DS . 'home' . DS . 'approach.php';
            include VIEW_LAND . DS . 'home' . DS . 'platform.php';
            include VIEW_LAND . DS . 'home' . DS . 'workflow.php';
            include VIEW_LAND . DS . 'home' . DS . 'capabilities.php';
            include VIEW_LAND . DS . 'home' . DS . 'partnerships.php';
            include VIEW_LAND . DS . 'home' . DS . 'faq.php';
            include VIEW_LAND . DS . 'home' . DS . 'collaboration.php';
        }

        if ($url == '/about') {
            include VIEW_LAND . DS . 'about' . DS . 'header.php';
            include VIEW_LAND . DS . 'about' . DS . 'mission.php';
            include VIEW_LAND . DS . 'about' . DS . 'team.php';
            include VIEW_LAND . DS . 'about' . DS . 'members.php';
            include VIEW_LAND . DS . 'about' . DS . 'values.php';
        }

        if ($url == '/tools') {
            include VIEW_LAND . DS . 'tools' . DS . 'header.php';
        }
        
        if ($url == '/news') {
            include VIEW_LAND . DS . 'news' . DS . 'header.php';
        }

        if ($url == '/careers') {
            include VIEW_LAND . DS . 'careers' . DS . 'header.php';
        }

        if ($url == '/contact') {
            postContact();
            include VIEW_LAND . DS . 'contact' . DS . 'header.php';
        }
    ?>

<?php include VIEW_LAND . DS . 'footer.php'; ?>