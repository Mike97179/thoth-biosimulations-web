<?php
    function getFaqs() {
        $res = query("SELECT * FROM faqs ORDER BY numOrder ASC");
        while ($row = arrayAssoc($res)) {
            $id = $row['id'];
            $question = $row['question'];
            $answer = $row['answer'];
            $numOrder = $row['numOrder'];

            $faq = <<<DELIMITER
                <div class="adminList__item">
                    <div class="adminList__item--info">
                        <div class="adminList__item--info-title">
                            <h3>$question</h3>
                        </div>
                        <p>$answer</p>
                    </div>
                    <div class="adminList__item--actions">
                        <a href="#" class="adminList__item--actions-edit"
                            data-id="$id"
                            data-question="$question"
                            data-answer="$answer"
                            data-order="$numOrder">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/admin/faqs/delete?id=$id" class="adminList__item--actions-delete"
                            onclick="return confirm('Are you sure you want to delete this FAQ?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
DELIMITER;
            echo $faq;
        }
    }

    function postCreateFaq() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = escape(trim($_POST['question']));
            $answer = escape(trim($_POST['answer']));
            $numOrder = escape(trim($_POST['order']));

            query("INSERT INTO faqs (question, answer, numOrder) VALUES ('$question', '$answer', $numOrder)");
            setSwal('Success', 'FAQ created successfully.', 'success');
            redirect('/admin/faqs');
        }
    }

    function postEditFaq() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = escape(trim($_POST['id']));
            $question = escape(trim($_POST['question']));
            $answer = escape(trim($_POST['answer']));
            $numOrder = escape(trim($_POST['order']));

            query("UPDATE faqs SET question = '$question', answer = '$answer', numOrder = $numOrder WHERE id = $id");
            setSwal('Success', 'FAQ updated successfully.', 'success');
            redirect('/admin/faqs');
        }
    }

    function getDeleteFaq() {
        if (isset($_GET['id'])) {
            $id = escape($_GET['id']);
            query("DELETE FROM faqs WHERE id = $id");
            setSwal('Success', 'FAQ deleted successfully.', 'success');
            redirect('/admin/faqs');
        }
    }
?>
