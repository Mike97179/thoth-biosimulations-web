<?php
    function postValidateLogin() {
        $errors = [];
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = escape(trim($_POST['email']));
            $password = trim($_POST['password']);

            if (strlen($email) <= 0) {
                $errors['email'] = "Email is required";
            }
            if (strlen($password) <= 0) {
                $errors['password'] = "Password is required";
            }

            if (!empty($errors)) {
                $data['email'] = $email;
                return [$errors, $data];
            } else {
                $res = query("SELECT * FROM users WHERE email = '$email'");
                $user = arrayAssoc($res);

                if (!$user) {
                    $errors['email'] = "Email not found";
                    $data['email'] = $email;
                    return [$errors, $data];
                }

                if ($user['status'] == 0) {
                    $errors['email'] = "Account not activated. Check your email.";
                    $data['email'] = $email;
                    return [$errors, $data];
                }

                if (!password_verify($password, $user['password'])) {
                    $errors['password'] = "Incorrect password";
                    $data['email'] = $email;
                    return [$errors, $data];
                }

                $_SESSION['id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    redirect('/admin');
                } else {
                    redirect('/');
                }
            }
        }
    }

    function getLogout() {
        session_destroy();
        redirect('/');
    }
?>