<?php
    function getCareers() {
        $res = query("SELECT * FROM careers ORDER BY id ASC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $department = $row['department'];
            $type = $row['type'];
            $location = $row['location'];
            $description = $row['description'];
            $requirements = $row['requirements'];
            $active = $row['active'];
            $labelClass = $active == 1 ? 'label--active' : 'label--draft';
            $labelText = $active == 1 ? 'Active' : 'Inactive';

            $career = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <h3>$title</h3>
                            <span class="label $labelClass">$labelText</span>
                        </div>
                        <p>$department · $type · $location</p>
                    </div>
                    <div class="adminList__item--actions">
                        <a href="#" class="adminList__item--actions-edit"
                            data-id="$id"
                            data-title="$title"
                            data-department="$department"
                            data-type="$type"
                            data-location="$location"
                            data-description="$description"
                            data-requirements="$requirements"
                            data-active="$active">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/admin/careers/delete?id=$id" class="adminList__item--actions-delete"
                            onclick="return confirm('Are you sure you want to delete this position?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
DELIMITER;
            echo $career;
        }
    }

    function postCreateCareer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = escape(trim($_POST['title']));
            $department = escape(trim($_POST['department']));
            $type = escape(trim($_POST['type']));
            $location = escape(trim($_POST['location']));
            $description = escape(trim($_POST['description']));
            $requirements = escape(trim($_POST['requirements']));
            $active = isset($_POST['active']) ? 1 : 0;

            query("INSERT INTO careers (title, department, type, location, description, requirements, active) VALUES ('$title', '$department', '$type', '$location', '$description', '$requirements', $active)");
            setSwal('Success', 'Position created successfully.', 'success');
            redirect('/admin/careers');
        }
    }

    function postEditCareer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $title = escape(trim($_POST['title']));
            $department = escape(trim($_POST['department']));
            $type = escape(trim($_POST['type']));
            $location = escape(trim($_POST['location']));
            $description = escape(trim($_POST['description']));
            $requirements = escape(trim($_POST['requirements']));
            $active = isset($_POST['active']) ? 1 : 0;

            query("UPDATE careers SET title = '$title', department = '$department', type = '$type', location = '$location', description = '$description', requirements = '$requirements', active = $active WHERE id = $id");
            setSwal('Success', 'Position updated successfully.', 'success');
            redirect('/admin/careers');
        }
    }

    function getDeleteCareer() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM careers WHERE id = $id");
            setSwal('Success', 'Position deleted successfully.', 'success');
            redirect('/admin/careers');
        }
    }
?>
