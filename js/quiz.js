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
                  
    $(document).on("click", "#featured_wrapper img", function (e) {
        e.preventDefault();
        var pop_image = "<div id='pop_image'><img src='" + $(this).attr("src") + "' width='100%' hieght='100%' id='pop_image_t' ></div>";
        $('body').append(pop_image);
        $("body").on("click","#pop_image_t",function (e) {
                $('#pop_image').remove();
        });
    });
    //next click 
    $(document).on("click", ':submit', function (e) {
        e.preventDefault();
        if ($('input[type=radio]:checked').length == 0) {
            Common.error("You must click one answer for that question");
        }
        else {
            data = $('form').serialize() + "&submit=" + $(this).val() + "&js=0";
            if ($(this).val() == "Get Result") {
                clearInterval(timeload);
            }
            $.ajax({
                url: "quiz.php",
                data: data,
                type: "POST",
                success: function (d) {
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
            data = "ans=0&submit=Get Result" + "&js=0";
            $.post("quiz.php", data, function (d) {
                $('body').html(d);
            });
        } else {
            $("#time").html("<font color='red'>Allowed Time </font>" + min + " : " + sec);
        }
    }, 1000);
});