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

        if($("#persons_form").length == 0){
            notification("Ошибка", "Сначала создайте нового абонента!");
            return;
        }
        
        let person_id = $("#persons_form").val(),
            tarrif_id = $("#tarrif").val(),
            isGroup = $('input[name="isGroup"]:checked').val(),
            dpw = $("#days_per_week").val(),
            section_id = $("#sport_section").val(),
            start_date = $("#start_date").val();

        $.ajax({
            url: '../../core/create_abonnement.php',
            type: 'POST',
            dataType: 'json',
            data: {
                person_id: person_id,
                tarrif_id: tarrif_id,
                isGroup: isGroup,
                dpw: dpw,
                section_id: section_id,
                start_date: start_date,
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

    $("#abonent-back").on("click", (e) => {
        e.preventDefault();
        $(".create-person-wrapper").hide();
        $(".profile-wrapper").show();
    })

    $("#create-new-person").on("click", (e) => {
        e.preventDefault();
        $(".profile-wrapper").hide();
        $(".create-person-wrapper").show();

    })

    $("#person-delete").on("click", (e) => {
        e.preventDefault();

        let id = $(e.currentTarget).data("id");

        $.ajax({
            url: '../../core/delete_person.php',
            type: 'POST',
            data: {
                id: id
            },
            complete(){
                location.reload();
            }
        });
    })
    
    $("#person-back").on("click", () => personBack())

    function personBack(){
        $(".person-wrapper").hide();
        $(".profile-wrapper").show();
    }

    $(".person").on("click", (e) => {
        let id = $(e.currentTarget).data("id");
        
        $.ajax({
            url: '../../core/get_person.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success (data) {
                if (data.status) {
                    $("#psname").val(data.sname);
                    $("#pfname").val(data.fname);
                    $("#pfatname").val(data.fatname);
                    $("#pbirthday").val(data.birthday);
                    $("#person-delete").data("id", id);
                    $(".profile-wrapper").hide(500);
                    $(".person-wrapper").show(500);
                    $(".abonement-outer").remove();
                    data.abonnements.forEach(a => {
                        let elem = '<div class="abonement-outer"><span class="abonement" data-id="' + a.id + '">Абонемент #' + a.id + '</span></div>';
                        $("#ab-after").after($(elem));
                    });
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

    $("#create-new-abonement").on("click", () => {
        document.location.replace("services.php#abonement-page");
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

    $(".person-wrapper").on("click", ".abonement", (e) => {
        let id = $(e.currentTarget).data("id");
        
        $.ajax({
            url: '../../core/get_abonement.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success (data) {
                if (data.status) {
                    $(".abonement-wrapper h1").text("Абонемент #" + id);
                    $("#asection").val(data.abonemment.isGroup == "0" ? "Нет" : data.abonemment.section);
                    $("#atarrif").val(data.abonemment.tariff);
                    $("#adatestart").val(data.abonemment.start_date);
                    $("#adateend").val(data.abonemment.end_date);
                    $("#adpw").val(data.abonemment.dpw);
                    $("#acost").val(data.abonemment.cost);


                    $("#abonement-delete").data("id", id);
                    $(".person-wrapper").hide(500);
                    $(".abonement-wrapper").show(500);
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

    $("#abonement-back").on("click", (e) => {
        e.preventDefault();
        $(".abonement-wrapper").hide(500);
        $(".person-wrapper").show(500);

    })

    $("#abonement-delete").on("click", (e) => {
        e.preventDefault();

        let id = $(e.currentTarget).data("id");

        $.ajax({
            url: '../../core/delete_abonement.php',
            type: 'POST',
            data: {
                id: id
            },
            complete(){
                location.reload();
            }
        });
    })
    
    $("#tarrif").on("change", (e) => {
        if($(e.currentTarget).val() == 1){
            $(".dpw").hide(500);
            $("#days_per_week").val(1);
        }
        else{
            $(".dpw").show(500);
        }


    })

    function notification(header, text){
        $(".notification h2").text(header);
        $(".notification p").text(text)
        $(".notification").show(500).delay(5000).hide(500);
    }
})