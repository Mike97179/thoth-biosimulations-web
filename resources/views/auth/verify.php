<?php postVerifyToken(); ?>

<?php
    $email = isset($_SESSION['register_email']) ? $_SESSION['register_email'] : '';
    $activated = isset($_SESSION['activated']) ? $_SESSION['activated'] : false;
?>

<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authVerify pt-6 pb-6">
    <div class="authVerify__container container">
        <div class="authVerify__card">
            <div class="authVerify__card__icon">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="authVerify__card__header">
                <h2>Verify your email</h2>
                <p>We've sent an activation token to</p>
                <strong><?php echo $email; ?></strong>
                <p>Please check your inbox and enter the 6-digit activation token below.</p>
            </div>

            <?php if ($activated): ?>

                <div class="authVerify__card__activated">
                    <div class="authVerify__card__activated--icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <h3>Account activated!</h3>
                    <p>Your account is ready. <a href="/auth/login">Sign in</a></p>
                </div>

            <?php else: ?>

                <form action="/auth/verify" method="POST">
                    <div class="authVerify__card__token">
                        <input type="text" name="token[]" maxlength="1" required>
                        <input type="text" name="token[]" maxlength="1" required>
                        <input type="text" name="token[]" maxlength="1" required>
                        <input type="text" name="token[]" maxlength="1" required>
                        <input type="text" name="token[]" maxlength="1" required>
                        <input type="text" name="token[]" maxlength="1" required>
                    </div>
                    <button type="submit" class="btn btn--yellow">Verify Token</button>
                </form>
                <div class="authVerify__card__resend">
                    <p>Didn't receive it? Check your spam folder or <a href="/auth/register">try again</a>.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<script src="/js/token.js"></script>
<?php include VIEW_LAND . DS . 'footer.php'; ?>