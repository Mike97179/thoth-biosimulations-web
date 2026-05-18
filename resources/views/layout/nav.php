<nav class="nav">
    <div class="nav__container container">
        <a href="/" class="nav__container__logo">
            <div class="nav__container__logo--letter">
                <span>T</span>
            </div>
            <div class="nav__container__logo--text">
                <div>Thoth</div>
                <span>Bio</span>
            </div>
        </a>
        <div class="nav__container__menu">
            <a href="/" class="nav__container__menu--link">Home</a>
            <a href="/about" class="nav__container__menu--link">About</a>
            <a href="#" class="nav__container__menu--link">AI-MedCraft</a>
            <a href="/tools" class="nav__container__menu--link">Tools</a>
            <a href="/news" class="nav__container__menu--link">News</a>
            <a href="/careers" class="nav__container__menu--link">Careers</a>
            <a href="/contact" class="nav__container__menu--link">Contact</a>
        </div>
        <div class="nav__container__actions">
            <?php if(isset($_SESSION['first_name'])) : ?>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                    <a href="/admin" class="nav__container__actions--signin btn btn--gray">Admin</a>
                <?php endif; ?>
                <span class="nav__container__actions--user">
                    <?php echo $_SESSION['first_name']; ?>
                </span>
                <a href="/auth/logout" class="nav__container__actions--signup btn btn--yellow">Sign Out</a>
            <?php else : ?>
                <a href="/auth/login" class="nav__container__actions--signin btn btn--gray">Sign In</a>
                <a href="/auth/register" class="nav__container__actions--signup btn btn--yellow">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>