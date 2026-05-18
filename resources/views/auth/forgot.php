<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authForgot pt-6 pb-6">
    <div class="authForgot__container container">
        <div class="authForgot__card">
            <div class="authForgot__card__header">
                <h1>Forgot your password?</h1>
                <p>Enter your email and we'll send you a reset link.</p>
            </div>
            <form action="/auth/forgot" method="POST">
                <div class="authForgot__card__group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <button type="submit" class="btn btn--yellow">Send Reset Link</button>
            </form>
            <p class="authForgot__card__footer">
                <a href="/auth/login">← Back to Sign In</a>
            </p>
        </div>
    </div>
</section>

<?php include VIEW_LAND . DS . 'footer.php'; ?>