/// <reference path="../../typings/globals/jquery/index.d.ts" />

$(function(){
    var isMenuOpened = false;

    function asideToggle(e){
        e.preventDefault();
        if(!isMenuOpened){
            $(".main").animate({left: "-380px"});
            $("aside").show(0).animate({right: "0px"});
            isMenuOpened = true;
        }
        else{
            $(".main").animate({left: "0px"});
            $("aside").animate({right: "-380px"}).hide(0);
            isMenuOpened = false;
            if(isMenuOpened && $(".create-person-wrapper").is(':visible')){
                $(".profile-wrapper").show();
                $(".create-person-wrapper").hide();
            }
        }
    }

    $('#profile-btn').on("click", (e) => asideToggle(e))

    $("#send_form").on("click", (e) => {
        e.preventDefault();
        //Создание абонемента AJAX
        notification("Ошибка", "Функция не доступна в данный момент!")
    })
        
    $("#reg-sbm").on("click", (e) => {
        e.preventDefault();
        let email = $("#remail").val(),
            password = $("#rpassword").val(),
            password_confirm = $("#rpassword-confirm").val();
        
        $.ajax({
            url: '../../core/signup.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: email,
                password: password,
                password_confirm: password_confirm                
            },
            success (data) {
                if (data.status) {
                    notification("Успешно", data.message);
                } 
                else {
                    notification("Ошибка", data.message);
                }
            },
            error(data){
                console.log(data.responseText);
            }
        });
    })

    $("#auth-sbm").on("click", (e) => {
        e.preventDefault();

        let email = $("#aemail").val(),
            password = $("#apassword").val();

        $.ajax({
            url: '../../core/signin.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: email,
                password: password            
            },
            success (data) {
                if (data.status) {
                    location.reload();
                } 
                else {
                    notification("Ошибка", data.message);
                }
            },
            error(data){
                console.log(data.responseText);
            }
        });
        // Авторизация AJAX
    })

    $("#profile-sbm").on("click", (e) => {
        e.preventDefault();

        $.ajax({
            url: '../../core/logout.php',
            type: 'POST',
            complete (){
                location.reload();
            }
        });
        // Авторизация AJAX
    })

    $("#abonent-sbm").on("click", (e) => {
        e.preventDefault();

        let sname = $("#sname").val(),
            fname = $("#fname").val(),
            fatname = $("#fatname").val(),
            birthday = $("#birthday").val();

        $.ajax({
            url: '../../core/create_person.php',
            type: 'POST',
            dataType: 'json',
            data: {
                sname: sname,
                fname: fname,
                fatname: fatname,
                birthday: birthday,
            },
            success (data) {
                if (data.status) {
                    location.reload();
                } 
                else {
                    notification("Ошибка", data.message);
                }
            },
            error(data){
                console.log(data.responseText);
            }
        });
        // Создание абонента AJAX
    })

    $("#isGroup_no").on("click", () => {
        $("#sport-section-wrapper").hide(500);
    })
        
    $("#isGroup_yes").on("click", () => {
        $("#sport-section-wrapper").show(500);
    })
    
    $(".form-desc b").on("click", (e) => {
        ct = e.currentTarget.id;
        if( ct == "switch-to-auth") { 
            $(".reg-wrapper").hide(500);
            $(".auth-wrapper").show(500);
        }
        else{
            $(".auth-wrapper").hide(500);
            $(".reg-wrapper").show(500);
        }
    })

    $("#create_person").on("click", (e) => {
        if(isMenuOpened == false){
            $(".profile-wrapper").hide();
            $(".create-person-wrapper").show();
            asideToggle(e);
        }
        else{
            $(".profile-wrapper").show();
            $(".create-person-wrapper").hide();
            asideToggle(e);
        }
        
    })

    function notification(header, text){
        $(".notification h2").text(header);
        $(".notification p").text(text)
        $(".notification").show(500).delay(5000).hide(500);
    }
})