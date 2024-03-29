<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бассейн</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="shortcut icon" href="src/img/logo.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
    <div class="main">
        <?php 
            include "components/header.php";
        ?>

        <section class="banner" id="about-page1">
            <div class="header-wrapper">
                <h1 class="only-border">О НАС</h1>
                <h1 class="without-border">О НАС</h1>
                <h1 class="only-border">О НАС</h1>
            </div>
            <div class="bottom-wave">
                
            </div>
        </section>

        <section class="flex" id="about-page">
            <div class="text-wrapper outer">
                <span class="tag">
                    ПРИСОЕДИНЯЙТЕСЬ СЕЙЧАС
                </span>
                <h1 class="header-adress">
                    630-099, Новосибирск, Каменская ул., д.60
                </h1>
                <p>
                    Мы находимся в центре, поэтому добраться до нас сможет даже ребенок!
                </p>
                <div class="btn-wrapper flex">
                    <a href="services.php" class="btn">
                        АБОНЕМЕНТЫ
                    </a>
                    <a href="tel:+78006006006" class="btn white-btn">
                        +7 800 600 60 06
                    </a>
                </div>
                
            </div>
            <div class="map-wrapper outer">
                <div id="luqiud1"></div>
                <div class="map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7bac4c383ab6b39b87ee10e41e9965eb588afe33d13dd23d4faa674f56d0b2e5&amp;width=800&amp;height=800&amp;lang=ru_RU&amp;scroll=true"></script>                
                </div>
                <div id="luqiud2">
                    <img  src="src/img/backgrounds/map_liquid2.png" alt="">
                </div>
            </div>
        </section>
    </div>

    <?php
        include "components/aside.php";
        include "components/notification.php";
    ?>

    <script src="src/js/script.js"></script>
</body>
</html>