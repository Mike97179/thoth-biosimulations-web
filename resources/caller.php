<?php
    // Auth controllers
    require_once __DIR__ . '/controllers/auth/authLoginController.php';
    require_once __DIR__ . '/controllers/auth/authRegisterController.php';
    require_once __DIR__ . '/controllers/auth/authVerifyController.php';
    require_once __DIR__ . '/controllers/auth/authForgotController.php';
    require_once __DIR__ . '/controllers/auth/authResetController.php';

    // Admin controllers
    require_once __DIR__ . '/controllers/admin/adminDashboardController.php';
    require_once __DIR__ . '/controllers/admin/adminUsersController.php';
    require_once __DIR__ . '/controllers/admin/adminNewsController.php';
    require_once __DIR__ . '/controllers/admin/adminTeamController.php';
    require_once __DIR__ . '/controllers/admin/adminFaqsController.php';
    require_once __DIR__ . '/controllers/admin/adminPartnersController.php';
    require_once __DIR__ . '/controllers/admin/adminToolsController.php';
    require_once __DIR__ . '/controllers/admin/adminCareersController.php';
    require_once __DIR__ . '/controllers/admin/adminTicketsController.php';

    // Landing controllers
    require_once __DIR__ . '/controllers/landing/landingNewsController.php';
    require_once __DIR__ . '/controllers/landing/landingTeamController.php';
    require_once __DIR__ . '/controllers/landing/landingFaqsController.php';
    require_once __DIR__ . '/controllers/landing/landingPartnersController.php';
    require_once __DIR__ . '/controllers/landing/landingToolsController.php';
    require_once __DIR__ . '/controllers/landing/landingCareersController.php';
    require_once __DIR__ . '/controllers/landing/landingContactController.php';
?>