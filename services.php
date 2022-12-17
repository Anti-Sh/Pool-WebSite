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

        <section class="flex" id="abonement-page">
            <div class="text-wrapper outer">
                <span class="tag">
                    СОЗДАЙ СВОЙ АБОНЕМЕНТ
                </span>
                <h1 class="header-adress">
                    Не подстраивайся ни под кого, настрой под себя
                </h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum impedit tenetur dicta eius dolor labore.
                </p>
            </div>
            <div class="form-wrapper outer">
                <form action="" method="post">
                    <span class="lbl">АБОНЕНТ</span>
                    <select name="" id="">
                        <option value="0">Иванов Иван Иванович</option>
                    </select> 
                    <span>или <b id="create_person">Создать</b></span> 
                    <br>
                    <span class="lbl">Срок действия абонемента:</span>
                    <select name="tarrif" id="tarrif">
                        <option value="0">День</option>
                        <option value="1">Неделя</option>
                        <option value="2">Месяц</option>
                        <option value="3">3 месяца</option>
                        <option value="4">6 месяца</option>
                        <option value="5">Год</option>
                    </select>
                    <br>
                    <span class="lbl">Хотите ли вы посещать спортивную секцию?</span>
                    
                    <input type="radio" name="isGroup" id="isGroup_yes">
                    <label for="isGroup_yes">Да</label>
                    <input type="radio" name="isGroup" checked id="isGroup_no">
                    <label for="isGroup_no">Нет</label>
                    <br>
                    <div id="sport-section-wrapper" style="display:none;">
                        <span class="lbl">Спортивная секция</span>
                        <select name="sport_section" id="sport_section">
                            <option value="0">Аквoаэробика</option>
                            <option value="1">Дайвинг</option>
                        </select>
                    </div>
                    <span class="lbl">Начало действия</span>
                    <input type="date" name="start_date" id="start_date">

                    <button id="send_form" type="submit">оформить</button>
                </form>
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