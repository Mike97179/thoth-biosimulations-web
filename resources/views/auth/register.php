<?php include VIEW_LAYOUT . DS . 'head.php'; ?>
<?php include VIEW_LAYOUT . DS . 'nav.php'; ?>

<section class="authRegister pt-6 pb-6">
    <div class="authRegister__container container">
        <div class="authRegister__card">
            <div class="authRegister__card__header">
                <h1>Create an account</h1>
                <p>Join Thoth BioSimulations today</p>
            </div>
            <form action="/auth/register" method="POST">
                <div class="authRegister__card__row">
                    <div class="authRegister__card__group">
                        <label for="first_name">Given Names</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Jane" required>
                    </div>
                    <div class="authRegister__card__group">
                        <label for="last_name">Family Names</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Smith" required>
                    </div>
                </div>
                <div class="authRegister__card__group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                </div>
                <div class="authRegister__card__group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
                <div class="authRegister__card__group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn--yellow">Create Account</button>
            </form>
            <p class="authRegister__card__footer">
                Already have an account? <a href="/auth/login">Sign In</a>
            </p>
        </div>
    </div>
</section>

<?php include VIEW_LAND . DS . 'footer.php'; ?>
