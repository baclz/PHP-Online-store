<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title><?= $title ?? 'X-store' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon//favicon-16x16.png">
    <link rel="manifest" href="/assets/img/favicon//site.webmanifest">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <div class="header-container">
                <div class="header-logo"><a class="gray-hover" href="/">X-store</a></div>
                <ul class="header-navbar">
                    <li><a class="gray-hover" href="/">Catalog</a></li>
                    <li><a class="gray-hover" href="/about">About Us</a></li>
                </ul>
                <ul class="header-reg">
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <li><a class="gray-hover" href="/login">Sign in</a></li>
                        <li><a class="gray-hover" href="/register">Sign up</a></li>
                    <?php else :  ?>
                        <li><a class="gray-hover" href="/admin">Panel</a></li>
                        <li><a class="gray-hover" href="/logout">Sign out</a></li>
                    <?php endif ?>
                    <li class="effect-block"><a class="header-cart" href="/cart">Cart</a></li>
                </ul>
                <div class="container-media-header">
                    <div class="header-media-btn" id="button-media-header">
                        <div class="div-button-media"></div>
                        <div class="div-button-media"></div>
                        <div class="div-button-media"></div>
                    </div>
                    <div class="media-ul display-none" id="ul-media-header">
                        <ul>
                            <li><a class="gray-hover" href="/">Catalog</a></li>
                            <li><a class="gray-hover" href="/about">About Us</a></li>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <li><a class="gray-hover" href="/login">Sign in</a></li>
                                <li><a class="gray-hover" href="/register">Sign up</a></li>
                            <?php else :  ?>
                                <li><a class="gray-hover" href="/admin">Panel</a></li>
                                <li><a class="gray-hover" href="/logout">Sign out</a></li>
                            <?php endif ?>
                            <li class="effect-block"><a class="header-cart" href="/cart">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
        <div class="hr"></div>
        <main class="main">