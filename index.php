<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бассейн</title>
    <link rel="stylesheet" href="src/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
    <div class="main">
        <?php 
            include "components/header.php";
        ?>

        <section id="first-section">
            <div class="header-delta"></div>
            <div class="section-inner vermiddle">
                <div class="headers-wrapper">
                    <h1>
                        <span>Плавать</span> <br> 
                        или не плавать?
                    </h1>
                    <h3>
                        Плавание - это идеальный комплекс упражнений "все в одном", 
                        который воздействует на большинство мышц тела различными способами 
                        при каждом гребке.
                    </h3>
                    <div class="btn-outer">
                        <div class="btn">
                            <span>Присоединиться к нам</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="section-inner bottom-part">
                
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