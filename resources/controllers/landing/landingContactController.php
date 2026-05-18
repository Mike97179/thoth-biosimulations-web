<?php
    function postContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name         = escape(trim($_POST['name']));
            $email        = escape(trim($_POST['email']));
            $organization = escape(trim($_POST['organization'] ?? ''));
            $area         = escape(trim($_POST['area'] ?? ''));
            $message      = escape(trim($_POST['message']));

            $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 'NULL';

            query("INSERT INTO tickets (user_id, name, email, organization, area, message) 
                   VALUES ($userId, '$name', '$email', '$organization', '$area', '$message')");

            setSwal('Message Sent', 'Thank you for reaching out. We will get back to you soon.', 'success');
            redirect('/contact');
        }
    }
?>
