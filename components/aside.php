<aside>
    <?php
    if(!isset($_SESSION["user"])):
    ?>
    <div class="reg-wrapper" style="display:none;">
        <h1>Регистрация</h1>
        <form action="">
            <span class="reg_lbl">e-mail</span>
            <input type="email" name="remail" id="remail">
            <span class="reg_lbl">пароль</span>
            <input type="password" name="rpassword" id="rpassword">
            <span class="reg_lbl">подтверждение пароля</span>
            <input type="password" name="rpassword-confirm" id="rpassword-confirm">
            <br>
            <span class="form-desc">Если у вас уже есть аккаунт - <b id="switch-to-auth"><u>Авторизация</u></b></span>
            <button type="submit" id="reg-sbm" class="frm-button">СОЗДАТЬ</button>
        </form>
    </div>
    <div class="auth-wrapper">
        <h1>Авторизация</h1>
        <form action="">
            <span class="reg_lbl">e-mail</span>
            <input type="email" name="aemail" id="aemail">
            <span class="reg_lbl">пароль</span>
            <input type="password" name="apassword" id="apassword">
            <br>
            <span class="form-desc">Если у вас еще нет аккаунта - <b id="switch-to-reg"><u>Регистрация</u></b></span>
            <button type="submit" id="auth-sbm" class="frm-button">войти</button>
        </form>
    </div>
    <? else: ?>
    <div class="create-person-wrapper" style="display: none;">
        <h1>Создание абонента</h1>
        <span class="reg_lbl">Фамилия</span>
        <input type="text" name="sname" id="sname">
        <span class="reg_lbl">Имя</span>
        <input type="text" name="fname" id="fname">
        <span class="reg_lbl">Отчество</span>
        <input type="text" name="fatname" id="fatname">
        <span class="reg_lbl">Дата рождения</span>
        <input type="date" name="birthday" id="birthday">
        <button type="submit" id="abonent-sbm" class="frm-button">создать</button>
    </div>
    <div class="profile-wrapper">
        <h1>Профиль</h1>
        <span class="reg_lbl">e-mail</span>
        <input type="text" name="pemail" id="pemail" disabled value="<?=$_SESSION["user"]["email"]?>">
        <button type="submit" id="profile-sbm" class="frm-button">выйти</button>
        <?
        $created_by = $_SESSION['user']['id'];
        $persons = mysqli_query($connect, "SELECT * FROM `persons` WHERE `created_by`='$created_by'");
        if(mysqli_num_rows($persons) > 0):
        ?>
            <h1>Личности</h1>
            <?while ($row = mysqli_fetch_assoc($persons)):?>
            <input type="text" name="pemail" id="pemail" disabled value="<?=$row['second_name'] . " " . $row['first_name'] . " " . $row['father_name']?>">
        <? 
            endwhile;
        endif; 
        ?>
    </div>
    <? endif; ?>
</aside>