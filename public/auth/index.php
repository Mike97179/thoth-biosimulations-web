<?php require_once '../../resources/config.php'; ?>

<?php
    if ($url == '/auth/login') $pageTitle = 'Sign In | Thoth Biosimulations';
    if ($url == '/auth/register') $pageTitle = 'Sign Up | Thoth Biosimulations';
    if ($url == '/auth/verify') $pageTitle = 'Verify Email | Thoth Biosimulations';
    if ($url == '/auth/forgot') $pageTitle = 'Forgot Password | Thoth Biosimulations';
    if ($url == '/auth/forgot-sent') $pageTitle = 'Check Your Email | Thoth Biosimulations';
?>

<?php
    if ($url == '/auth/login') {
        $res = postValidateLogin();
        include VIEW_AUTH . DS . 'login.php';
    }

    if ($url == '/auth/register') {
        $res = postRegisterUser();
        include VIEW_AUTH . DS . 'register.php';
    }

    if ($url == '/auth/verify') {
        postVerifyToken();
        include VIEW_AUTH . DS . 'verify.php';
    }

    if ($url == '/auth/forgot') {
        postForgotPassword();
        include VIEW_AUTH . DS . 'forgot.php';
    }

    if ($url == '/auth/forgot-sent') {
        include VIEW_AUTH . DS . 'forgot-sent.php';
    }

    if ($url == '/auth/reset') {
        postResetPassword();
        include VIEW_AUTH . DS . 'reset.php';
    }

    if ($url == '/auth/logout') {
        getLogout();
    }
?>