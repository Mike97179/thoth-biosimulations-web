<?php
    function postRegisterUser() {
        $errors = [];
        $data = [];
        unset($_SESSION['activated']);
        unset($_SESSION['register_email']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = escape(trim($_POST['first_name']));
            $last_name = escape(trim($_POST['last_name']));
            $email = escape(trim($_POST['email']));
            $password = escape(trim($_POST['password']));
            $confirm_password = escape(trim($_POST['confirm_password']));

            if (strlen($first_name) <= 0) {
                $errors['first_name'] = "First name is required";
            }
            if (strlen($last_name) <= 0) {
                $errors['last_name'] = "Last name is required";
            }
            if (strlen($email) <= 0) {
                $errors['email'] = "Email is required";
            } elseif (validateEmail($email)) {
                $errors['email'] = "Email already registered";
            }
            if (strlen($password) <= 0) {
                $errors['password'] = "Password is required";
            } elseif (strlen($password) < 8) {
                $errors['password'] = "Password must be at least 8 characters";
            }
            if ($password !== $confirm_password) {
                $errors['confirm_password'] = "Passwords do not match";
            }

            if (!empty($errors)) {
                $data['first_name'] = $first_name;
                $data['last_name'] = $last_name;
                $data['email'] = $email;
                return [$errors, $data];
            } else {
                $token = rand(100000, 999999);
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                query("INSERT INTO users (first_name, last_name, email, password, token) VALUES ('$first_name', '$last_name', '$email', '$password', '$token')");
                $_SESSION['register_email'] = $email;
                $body = "
                    <h2>Hi $first_name,</h2>
                    <p>Your activation token is:</p>
                    <h1 style='letter-spacing: 8px;'>$token</h1>
                    <p>Enter this code on the verification page to activate your account.</p>
                ";
                sendEmail($email, 'Activate your Thoth account', $body);
                redirect('/auth/verify');
            }
        }
    }
?>