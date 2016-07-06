/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function preventBack() {
    window.history.forward();
}
setTimeout("preventBack()", 0);
$(window).on('beforeunload', function (e) {
    return 'Are you sure you want to leave?';
});

$(document).ready(function () {
    //next click 
    $(':submit').click(function (e) {
        e.preventDefault();
        if ($('input[type=radio]:checked').length == 0) {
            Common.error("You must click one answer for that question");
        }
        else {
            data = $('form').serialize() + "&submit=" + $(this).val();
            $.ajax({
                url :"quiz.php",
                data : data,
                dataType : "json",
                type : "POST",
                success : function (d) {                 
                $('body').html(d);
               }
            });    
        }    
    });
    var countdown = 1 * 60 * 1000;
    var timeload = setInterval(function () {
        countdown -= 1000;
        var min = Math.floor(countdown / (60 * 1000));
        //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
        var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

        if (countdown <= 0) {
            alert("5 min!");
            clearInterval(timeload);
             $.post("quiz.php", $('form').serialize(), function (d) {
                $('form').html(d);
            });
        } else {
            $("#time").html(min + " : " + sec);
        }
    }, 1000);
});