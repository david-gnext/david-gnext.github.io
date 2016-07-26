
var arr, i, dat, val, data = [], colour = [], mem_name = "";
$(document).ready(function () {
    arr = $("#member_name").text();
    val = $("#member_score").text();
    arr = $.parseJSON(arr);
    val = $.parseJSON(val);
    for (i = 0; i < arr.length; i++) {
        colour[i] = getRandomColor();
        updateChartData(arr[i], val[i], colour[i]);
        data[i] = dat;          //get member chart array 
        mem_name += "<div style='background:" + colour[i] + ";min-width:80px;height:20px;float:left;'></div><span>" + arr[i] + "</span><div style='clear:both'></div>";
    }
});

function  updateChartData(name, vall, col)
{
    var nam = name;
    var color = col;
    var value = vall;
    dat = {
        value: value,
        color: color,
        label: nam,
    }
}
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
window.onload = function () {
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myBar = new Chart(ctx).Doughnut(data, {
        responsive: true,
    });
    var nameformember = document.getElementById("mem_name");
    nameformember.innerHTML += mem_name;                    //display member colour
};

      