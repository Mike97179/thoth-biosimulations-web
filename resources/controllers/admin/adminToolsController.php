<?php
    function getTools() {
        $res = query("SELECT * FROM tools ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $icon = $row['icon'];
            $category = $row['category'];
            $numOrder = $row['numOrder'];

            $tool = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <h3>$name</h3>
                        </div>
                        <p>$description</p>
                    </div>
                    <div class="adminList__item--actions">
                        <a href="#" class="adminList__item--actions-edit"
                            data-id="$id"
                            data-name="$name"
                            data-description="$description"
                            data-icon="$icon"
                            data-category="$category"
                            data-order="$numOrder">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/admin/tools/delete?id=$id" class="adminList__item--actions-delete"
                            onclick="return confirm('Are you sure you want to delete this tool?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
DELIMITER;
            echo $tool;
        }
    }

    function postCreateTool() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = escape(trim($_POST['name']));
            $description = escape(trim($_POST['description']));
            $icon = escape(trim($_POST['icon']));
            $category = escape(trim($_POST['category']));
            $numOrder = escape(trim($_POST['order']));

            query("INSERT INTO tools (name, description, icon, category, numOrder) VALUES ('$name', '$description', '$icon', '$category', $numOrder)");
            setSwal('Success', 'Tool created successfully.', 'success');
            redirect('/admin/tools');
        }
    }

    function postEditTool() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $name = escape(trim($_POST['name']));
            $description = escape(trim($_POST['description']));
            $icon = escape(trim($_POST['icon']));
            $category = escape(trim($_POST['category']));
            $numOrder = escape(trim($_POST['order']));

            query("UPDATE tools SET name = '$name', description = '$description', icon = '$icon', category = '$category', numOrder = $numOrder WHERE id = $id");
            setSwal('Success', 'Tool updated successfully.', 'success');
            redirect('/admin/tools');
        }
    }

    function getDeleteTool() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM tools WHERE id = $id");
            setSwal('Success', 'Tool deleted successfully.', 'success');
            redirect('/admin/tools');
        }
    }
?>
