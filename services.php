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

        <section class="banner" id="services-page">
            <div class="header-wrapper">
                <h1 class="only-border">АБОНЕМЕНТЫ</h1>
                <h1 class="without-border">АБОНЕМЕНТЫ</h1>
                <h1 class="only-border">АБОНЕМЕНТЫ</h1>
            </div>
            <div class="bottom-wave">
                
            </div>
        </section>

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
                    <?
                    $user_id = $_SESSION["user"]["id"];
                    $persons = mysqli_query($connect, "SELECT * FROM `persons` WHERE `created_by`='$user_id'");
                    $word = "";
                    if(mysqli_num_rows($persons) > 0):
                    $word = "или";
                    ?>
                    <select name="persons" id="persons_form">
                        <?
                        while($row = mysqli_fetch_assoc($persons)):
                        ?>
                        <option value="<?=$row['id']?>"><?=$row['second_name'] . " " . $row['first_name'] . " " . $row['father_name']?></option>
                        <?
                        endwhile;
                    endif;
                        ?>
                    </select> 
        
                    <span>
                        <? echo $word; ?>
                        <b id="create_person">Создать</b>
                    </span> 
                    <br>
                    <span class="lbl">Срок действия абонемента:</span>
                    <select name="tarrif" id="tarrif">
                        <?
                        $tarrifs = mysqli_query($connect, "SELECT * FROM `tariffs`");
                        while($row = mysqli_fetch_assoc($tarrifs)):
                        ?>
                            <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
                        <?
                        endwhile;
                        ?>
                    </select>
                    <br>
                    <span class="lbl">Хотите ли вы посещать спортивную секцию?</span>
                    
                    <input type="radio" name="isGroup" id="isGroup_yes" value="1">
                    <label for="isGroup_yes">Да</label>
                    <input type="radio" name="isGroup" checked id="isGroup_no" value="0">
                    <label for="isGroup_no">Нет</label>
                    <br>
                    <div id="sport-section-wrapper" style="display:none;">
                        <span class="lbl">Спортивная секция</span>
                        <select name="sport_section" id="sport_section">
                            <?
                            $sections = mysqli_query($connect, "SELECT * FROM `sport_sections`");
                            while($row = mysqli_fetch_assoc($sections)):
                            ?>
                                <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
                            <?
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <span class="lbl">Начало действия</span>
                    <input type="date" name="start_date" id="start_date" min="<?=date("Y-m-d");?>" value="<?=date("Y-m-d");?>">

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