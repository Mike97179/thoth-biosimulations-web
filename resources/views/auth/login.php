<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authLogin pt-6 pb-6">
    <div class="authLogin__container container">
        <div class="authLogin__card">
            <div class="authLogin__card__header">
                <h1>Welcome back</h1>
                <p>Sign in to your account to continue</p>
            </div>
            <form action="/auth/login" method="POST">
                <div class="authLogin__card__group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <div class="authLogin__card__group">
                    <div class="authLogin__card__group--label">
                        <label for="password">Password</label>
                        <a href="/auth/forgot">Forgot password?</a>
                    </div>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn--yellow">Sign In</button>
            </form>
            <p class="authLogin__card__footer">
                Don't have an account? <a href="/auth/register">Sign Up</a>
            </p>
        </div>
    </div>
</section>

<?php include VIEW_LAND . DS . 'footer.php'; ?>
