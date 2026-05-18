<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Users</h1>
            <span class="adminTicketsCount"><?php echo mysqli_num_rows(query("SELECT * FROM users")); ?> total</span>
        </div>

        <div class="adminList">
            <?php getUsers(); ?>
        </div>
    </main>
</div>