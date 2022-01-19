<!DOCTYPE html>
<head lang="en">
    <title></title>

    <meta charset="UTF-8">
    <meta name="author" content="Ahmed, Zhi, Luke, Joris & Dante">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

    require_once __DIR__ . '/partials/navbar.php';

    switch ($_SERVER['REQUEST_URI']) {
        case '/register':
            require_once __DIR__ . '/users/register.php';
            break;
        case '/login':
            require_once __DIR__ . '/users/login.php';
            break;
    }

    ?>
</body>
