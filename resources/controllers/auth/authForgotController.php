<?php
    function postForgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = escape(trim($_POST['email']));

            if (!validateEmail($email)) {
                setSwal('Error', 'Email not found.', 'error');
                redirect('/auth/forgot');
            } else {
                $token = rand(100000, 999999);
                query("UPDATE users SET token = '$token' WHERE email = '$email'");
                $_SESSION['reset_email'] = $email;

                $resetLink = "http://localhost:8000/auth/reset?token=$token&email=$email";
                $body = "
                    <h2>Password Reset Request</h2>
                    <p>Click the link below to reset your password:</p>
                    <a href='$resetLink'>$resetLink</a>
                    <p>If you didn't request this, ignore this email.</p>
                ";

                sendEmail($email, 'Reset your password', $body);
                redirect('/auth/forgot-sent');
            }
        }
    }
?>