/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Common = {
    error : function (t) {
        var err = "<div id='error_message'>"+t+"</div>";
        $('body').append(err).children(":not(#error_message)").css('opacity',.3);
        setTimeout(function(){
            $("#error_message").remove();
            $('body').children().css('opacity','');
        },4000);
    }
}

$(document).ready(function(){
    //link hover
    $('a').hover(function(){
        current = $(this).parent('div').css('background');
        $(this).parent('div').css("background","#40806a");
    },function(){
        $(this).parent('div').css("background","");
    });
    //next click 
    $('#next').click(function(e){
        e.preventDefault();
        Common.error("You must click one answer for that question");
    });
});