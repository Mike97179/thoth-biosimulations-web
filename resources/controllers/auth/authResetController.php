<?php
    function postResetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = escape(trim($_POST['email']));
            $token    = escape(trim($_POST['token']));
            $password = escape(trim($_POST['password']));
            $confirm  = escape(trim($_POST['confirm_password']));

            if ($password !== $confirm) {
                setSwal('Error', 'Passwords do not match.', 'error');
                redirect('/auth/reset?token=' . $token . '&email=' . $email);
            }

            $res = query("SELECT id FROM users WHERE email = '$email' AND token = '$token'");

            if (mysqli_num_rows($res) === 0) {
                setSwal('Error', 'Invalid or expired token.', 'error');
                redirect('/auth/forgot');
            }

            $hashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            query("UPDATE users SET password = '$hashed', token = NULL WHERE email = '$email'");

            setSwal('Success', 'Your password has been reset. Please log in.', 'success');
            redirect('/auth/login');
        }
    }
?>
