<!doctype html>
<html lang="en">
<head>
    <title>@yield('title') | Sarab Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://sarab.tech/public/images/media/1689461139icon light.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://sarab.tech/css/front/bootstrap.min.css" rel="stylesheet">
    <link href="https://sarab.tech/css/front/venor.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #000; color: #fff; }
        .header { background: rgba(0,0,0,0.8); backdrop-filter: blur(10px); }
        .project-row { margin-bottom: 80px; }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="common-front">
    <header class="header">
        <div class="header__content__venor">
            <div class="header__logo">
                <a href="/"><img width="105" src="https://sarab.tech/public/images/media/17135578102.png"></a>
            </div>
            <div class="header__actions__venor">
                <a class="header__action-btn" href="/portfolio">Our Portfolio</a>
                <a class="header__action-btn header__action-btn--start-project" href="/contact">Start a Project</a>
            </div>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="footer-section">
        <div class="container text-center py-5">
            <p>© 2026. All rights reserved by <a href="/">sarab.tech</a></p>
        </div>
    </footer>

    <script src="https://sarab.tech/js/libs/jquery.min.js"></script>
    <script src="https://sarab.tech/js/front/venor.js" defer></script>
</body>
</html>
