<?php
    function getUsers() {
        $res = query("SELECT * FROM users ORDER BY created_at ASC");
        while ($row = arrayAssoc($res)) {
            $name = $row['first_name'] . ' ' . $row['last_name'];
            $initial = strtoupper(substr($row['first_name'], 0, 1));
            $role = $row['role'];
            $date = date('M j, Y', strtotime($row['created_at']));
            $id = $row['id'];

            $deleteBtn = $role !== 'admin' ? <<<DELIMITER
                <a href="/admin/users/delete?id=$id" class="adminList__item--actions-delete"
                    onclick="return confirm('Are you sure you want to delete this user?')">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
DELIMITER : '';

            $user = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <div class="adminList__item--info-avatar">$initial</div>
                            <div>
                                <div class="adminList__item--info-name">
                                    <h3>$name</h3>
                                </div>
                                <p>{$row['email']}</p>
                            </div>
                        </div>
                    </div>
                    <div class="adminList__item--actions">
                        <span class="label label--$role">$role</span>
                        <span class="adminList__item--date">Joined $date</span>
                        $deleteBtn
                    </div>
                </div>
DELIMITER;
            echo $user;
        }
    }

    function getDeleteUser() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);

            $adminCount = arrayAssoc(query("SELECT COUNT(*) as total FROM users WHERE role = 'admin'"));
            $user = arrayAssoc(query("SELECT role FROM users WHERE id = $id"));

            if ($user['role'] === 'admin' && $adminCount['total'] <= 1) {
                setSwal('Error', 'Cannot delete the last admin.', 'error');
                redirect('/admin/users');
            }

            query("DELETE FROM users WHERE id = $id");
            setSwal('Success', 'User deleted successfully.', 'success');
            redirect('/admin/users');
        }
    }
?>
