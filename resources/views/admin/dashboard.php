<?php
    $stats = getDashboardStats();
?>

<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminMain__header">
            <h1>Dashboard Overview</h1>
        </div>

        <div class="adminMain__stats">
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>News Posts</span>
                    <span class="material-symbols-outlined" style="color: rgb(93, 39, 155); font-size: 2.4rem;">news</span>
                </div>
                <h2><?php echo $stats['news']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Tools</span>
                    <span class="material-symbols-outlined" style="color: rgb(235, 171, 10); font-size: 2.4rem;">construction</span>
                </div>
                <h2><?php echo $stats['tools']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Team Members</span>
                    <span class="material-symbols-outlined" style="color: rgb(46, 138, 184); font-size: 2.4rem;">contacts_product</span>
                </div>
                <h2><?php echo $stats['team']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Messages</span>
                    <span class="material-symbols-outlined" style="color: rgb(191, 64, 128); font-size: 2.4rem;">inbox</span>
                </div>
                <div class="adminMain__stats--card-count">
                    <h2><?php echo $stats['tickets']; ?></h2>
                    <?php if ($stats['newTickets'] > 0): ?>
                        <span class="label label--new"><?php echo $stats['newTickets']; ?> new</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Open Positions</span>
                    <span class="material-symbols-outlined" style="color: rgb(54, 161, 107); font-size: 2.4rem;">work</span>
                </div>
                <h2><?php echo $stats['careers']; ?></h2>
            </div>
        </div>

        <div class="adminMain__recent">
            <h2>Recent Messages</h2>
            <div class="adminMain__recent__list">
                <?php getRecentTickets(); ?>
            </div>
        </div>
    </main>
</div>