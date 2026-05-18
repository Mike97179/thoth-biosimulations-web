<?php
    function getNews() {
        $res = query("SELECT * FROM news ORDER BY created_at DESC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $summary = $row['summary'];
            $category = $row['category'];
            $published = $row['published'] == 1 ? 'Published' : 'Draft';
            $labelClass = $row['published'] == 1 ? 'label--published' : 'label--draft';

            $news = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <h3>$title</h3>
                            <span class="label $labelClass">$published</span>
                        </div>
                        <p>$summary</p>
                    </div>
                    <div class="adminList__item--actions">
                        <a href="#" class="adminList__item--actions-edit"
                            data-id="$id"
                            data-title="$title"
                            data-summary="$summary"
                            data-category="$category"
                            data-date="{$row['created_at']}"
                            data-published="{$row['published']}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/admin/news/delete?id=$id" class="adminList__item--actions-delete"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
DELIMITER;
            echo $news;
        }
    }

    function postCreateNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = escape(trim($_POST['title']));
            $summary = escape(trim($_POST['summary']));
            $content = escape(trim($_POST['content']));
            $category = escape(trim($_POST['category_id']));
            $created_at = escape(trim($_POST['created_at']));
            $published = isset($_POST['published']) ? 1 : 0;

            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $image = md5(uniqid()) . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../../public/img/news/' . $image);
            }

            query("INSERT INTO news (title, summary, content, image, category, published, created_at) VALUES ('$title', '$summary', '$content', '$image', '$category', $published, '$created_at')");
            setSwal('Success', 'News post created successfully.', 'success');
            redirect('/admin/news');
        }
    }

    function postEditNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $title = escape(trim($_POST['title']));
            $summary = escape(trim($_POST['summary']));
            $content = escape(trim($_POST['content']));
            $category = escape(trim($_POST['category_id']));
            $created_at = escape(trim($_POST['created_at']));
            $published = isset($_POST['published']) ? 1 : 0;

            $imageUpdate = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $image = md5(uniqid()) . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../../public/img/news/' . $image);
                $imageUpdate = ", image = '$image'";
            }

            query("UPDATE news SET title = '$title', summary = '$summary', content = '$content', category = '$category', published = $published, created_at = '$created_at' $imageUpdate WHERE id = $id");
            setSwal('Success', 'News post updated successfully.', 'success');
            redirect('/admin/news');
        }
    }

    function getDeleteNews() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM news WHERE id = $id");
            setSwal('Success', 'News post deleted successfully.', 'success');
            redirect('/admin/news');
        }
    }
?>
