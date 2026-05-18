<?php
    $email = isset($_SESSION['reset_email']) ? $_SESSION['reset_email'] : '';
?>

<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authForgotSent pt-6 pb-6">
    <div class="authForgotSent__container container">
        <div class="authForgotSent__card">
            <div class="authForgotSent__card__icon">
                <i class="fa-regular fa-circle-check"></i>
            </div>
            <div class="authForgotSent__card__header">
                <h2>Check your email</h2>
                <p>We've sent a password reset link to <strong><?php echo $email; ?></strong>.</p>
            </div>
            <p class="authForgotSent__card__footer">
                <a href="/auth/login">← Back to Sign In</a>
            </p>
        </div>
    </div>
</section>

<?php include VIEW_LAND . DS . 'footer.php'; ?>
