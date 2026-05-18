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
                    <i class="fa-regular fa-newspaper" style="color: rgb(93, 39, 155)"></i>
                </div>
                <h2><?php echo $stats['news']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Tools</span>
                    <i class="fa-regular fa-wrench" style="color: rgb(235, 171, 10)"></i>
                </div>
                <h2><?php echo $stats['tools']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Team Members</span>
                    <i class="fa-regular fa-users" style="color: rgb(46, 138, 184)"></i>
                </div>
                <h2><?php echo $stats['team']; ?></h2>
            </div>
            <div class="adminMain__stats--card">
                <div class="adminMain__stats--card-info">
                    <span>Messages</span>
                    <i class="fa-regular fa-envelope" style="color: rgb(191, 64, 128)"></i>
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
                    <i class="fa-regular fa-briefcase" style="color: rgb(54, 161, 107)"></i>
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