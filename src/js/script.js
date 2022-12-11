/// <reference path="../../typings/globals/jquery/index.d.ts" />

$(function(){
    var isMenuOpened = false;

    $('#profile-btn').on("click", (e) => {
        if(!isMenuOpened){
            $(".main").animate({left: "-380px"});
            $("aside").show(0).animate({right: "0px"});
            isMenuOpened = true;
        }
        else{
            $(".main").animate({left: "0px"});
            $("aside").animate({right: "-380px"}).hide(0);
            isMenuOpened = false;
        }
    })
})