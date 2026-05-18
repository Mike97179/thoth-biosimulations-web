<?php
    function getPartners() {
        $res = query("SELECT * FROM partners ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $logo = $row['logo'];
            $url = $row['url'];
            $numOrder = $row['numOrder'];

            $partner = <<<DELIMITER
                <div class="adminPartnersGrid__item">
                    <div class="adminPartnersGrid__item--info">
                        <img src="img/home/$logo" alt="$name">
                        <div>
                            <h3>$name</h3>
                            <p>$url</p>
                        </div>
                    </div>
                    <div class="adminList__item--actions">
                        <a href="#" class="adminList__item--actions-edit"
                            data-id="$id"
                            data-name="$name"
                            data-description="$description"
                            data-logo="$logo"
                            data-url="$url"
                            data-order="$numOrder">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/admin/partners/delete?id=$id" class="adminList__item--actions-delete"
                            onclick="return confirm('Are you sure you want to delete this partner?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
DELIMITER;
            echo $partner;
        }
    }

    function postCreatePartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = escape(trim($_POST['name']));
            $description = escape(trim($_POST['description']));
            $logo = escape(trim($_POST['logo']));
            $url = escape(trim($_POST['url']));
            $numOrder = escape(trim($_POST['order']));

            query("INSERT INTO partners (name, description, logo, url, numOrder) VALUES ('$name', '$description', '$logo', '$url', $numOrder)");
            setSwal('Success', 'Partner created successfully.', 'success');
            redirect('/admin/partners');
        }
    }

    function postEditPartner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $name = escape(trim($_POST['name']));
            $description = escape(trim($_POST['description']));
            $logo = escape(trim($_POST['logo']));
            $url = escape(trim($_POST['url']));
            $numOrder = escape(trim($_POST['order']));

            query("UPDATE partners SET name = '$name', description = '$description', logo = '$logo', url = '$url', numOrder = $numOrder WHERE id = $id");
            setSwal('Success', 'Partner updated successfully.', 'success');
            redirect('/admin/partners');
        }
    }

    function getDeletePartner() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM partners WHERE id = $id");
            setSwal('Success', 'Partner deleted successfully.', 'success');
            redirect('/admin/partners');
        }
    }
?>
