<?php
    function getTeam() {
        $res = query("SELECT * FROM team ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $name = $row['name'];
            $role = $row['role'];
            $initial = strtoupper(substr($name, 0, 1));
            $founderBadge = $row['founder'] == 1 ? '<span class="label label--yellow"><i class="fa-solid fa-crown"></i> Founder</span>' : '';

            $actions = $row['founder'] != 1 ? <<<DELIMITER
                <div class="adminList__item--actions">
                    <a href="#" class="adminList__item--actions-edit"
                        data-id="$id"
                        data-name="$name"
                        data-role="$role"
                        data-bio="{$row['bio']}"
                        data-linkedin="{$row['linkedin']}"
                        data-order="{$row['numOrder']}"
                        data-founder="{$row['founder']}">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="/admin/team/delete?id=$id" class="adminList__item--actions-delete"
                        onclick="return confirm('Are you sure you want to delete this member?')">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>
DELIMITER : '';

            $member = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <div class="adminList__item--info-avatar">$initial</div>
                            <div>
                                <div class="adminList__item--info-name">
                                    <h3>$name</h3>
                                    $founderBadge
                                </div>
                                <p>$role</p>
                            </div>
                        </div>
                    </div>
                    $actions
                </div>
DELIMITER;
            echo $member;
        }
    }

    function postCreateMember() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = escape(trim($_POST['name']));
            $role = escape(trim($_POST['role']));
            $bio = escape(trim($_POST['bio']));
            $linkedin = escape(trim($_POST['linkedin']));
            $founder = isset($_POST['founder']) ? 1 : 0;
            $numOrder = escape(trim($_POST['order']));
            $active = 1;

            $photo = '';
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
                $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $photo = md5(uniqid()) . '.' . $ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__ . '/../../../public/img/team/' . $photo);
            }

            query("INSERT INTO team (name, role, bio, photo, linkedin, founder, numOrder, active) VALUES ('$name', '$role', '$bio', '$photo', '$linkedin', $founder, $numOrder, $active)");
            setSwal('Success', 'Team member added successfully.', 'success');
            redirect('/admin/team');
        }
    }

    function postEditMember() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $name = escape(trim($_POST['name']));
            $role = escape(trim($_POST['role']));
            $bio = escape(trim($_POST['bio']));
            $linkedin = escape(trim($_POST['linkedin']));
            $founder = isset($_POST['founder']) ? 1 : 0;
            $numOrder = escape(trim($_POST['order']));

            $photoUpdate = '';
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
                $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $photo = md5(uniqid()) . '.' . $ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__ . '/../../../public/img/team/' . $photo);
                $photoUpdate = ", photo = '$photo'";
            }

            query("UPDATE team SET name = '$name', role = '$role', bio = '$bio', linkedin = '$linkedin', founder = $founder, numOrder = $numOrder $photoUpdate WHERE id = $id");
            setSwal('Success', 'Team member updated successfully.', 'success');
            redirect('/admin/team');
        }
    }

    function getDeleteMember() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM team WHERE id = $id");
            setSwal('Success', 'Team member deleted successfully.', 'success');
            redirect('/admin/team');
        }
    }
?>
