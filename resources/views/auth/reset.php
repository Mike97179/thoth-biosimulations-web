<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authForgot pt-6 pb-6">
    <div class="authForgot__container container">
        <div class="authForgot__card">
            <div class="authForgot__card__header">
                <h1>Reset your password</h1>
                <p>Enter your new password below.</p>
            </div>
            <?php showSwalMessage(); ?>
            <form action="/auth/reset" method="POST">
                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?? ''; ?>">
                <input type="hidden" name="email" value="<?php echo $_GET['email'] ?? ''; ?>">
                <div class="authForgot__card__group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Your new password" required>
                </div>
                <div class="authForgot__card__group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn--yellow">Reset Password</button>
            </form>
            <p class="authForgot__card__footer">
                <a href="/auth/login">← Back to Sign In</a>
            </p>
        </div>
    </div>
</section>

<?php include VIEW_LAND . DS . 'footer.php'; ?>