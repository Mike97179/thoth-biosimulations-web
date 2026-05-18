<?php
    function postVerifyToken() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = implode('', $_POST['token']);
            $email = escape($_SESSION['register_email']);

            $res = query("SELECT * FROM users WHERE email = '$email' AND token = '$token'");
            $user = arrayAssoc($res);

            if (!$user) {
                setSwal('Error', 'Invalid token. Please try again.', 'error');
                redirect('/auth/verify');
            } else {
                query("UPDATE users SET status = 1, token = NULL WHERE email = '$email'");
                $_SESSION['activated'] = true;
                unset($_SESSION['register_email']);
                redirect('/auth/verify');
            }
        }
    }
?>