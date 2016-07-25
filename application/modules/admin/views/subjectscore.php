<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Test List Score</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
        <script src="../js/Chart.js-master/Chart.js"></script>
    </head>
    <body>
        <?php
        include("header.php");
        include("../database.php");
/*
 *  show selected member result
*/
        if (isset($_GET['testid'])) {
            $mem_name = array();
            $score = array();
            $result = mysqli_query($cn,"select test_name,login,score,total_que from mst_subject s JOIN mst_test t ON (t.sub_id=s.sub_id) JOIN mst_result r ON(r.test_id=t.test_id) where s.sub_id='" . $_GET['testid'] . "'order by score DESC");
            echo "<h2 class=head1>" . $_GET['testname'] . " Test Result Score</h2>";
            echo "<table class=coll align=center><thead><th class=style3>Name</th><th class=style3>Subject</th><th class=style3>Give Mark</th><th class=style3>Score</th><th class=style3>Status</th></thead>";
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td align=center class=style3>$row[1]</td><td aling=center class=style3>$row[0]</td><td align=center class=style3>$row[3]</td><td align=center class=style3>$row[2]</td>";
                $status = $row[3] / 2;
                if ($row[2] > $status) {
                    echo "<td align=center class='style3 pass'>Pass</td></tr>";
                } else {
                    echo "<td align=center class='style3 fail'>Fail</td></tr>";
                }
                array_push($mem_name, $row[1]); //get member name array
                array_push($score, $row[2]);  //get score array
            }
            echo "</table>";
            ?>
            <script>
                var arr, i, dat, val, data = [], colour = [], mem_name = "";
    <?php
    echo "arr=" . json_encode($mem_name) . ";"; //convert member array from php to javascript
    echo "val=" . json_encode($score) . ";";  //convert score array from php to javascript
    ?>
                for (i = 0; i < arr.length; i++) {
                    colour[i] = getRandomColor();
                    updateChartData(arr[i], val[i], colour[i]);
                    data[i] = dat;          //get member chart array 
                    mem_name += "<div style='background:" + colour[i] + ";min-width:80px;height:20px;float:left;'></div><span>" + arr[i] + "</span><div style='clear:both'></div>";
                }
                
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
            
            </script>
<!-- 
##  display doughnut's chart 
##  member name with color 
-->
            <div id="canvas-holder" style="width:20%;margin:0 auto;">
                <canvas id="chart-area" width="100" height="100"/>
            </div>
            <div style="float:right;width: 200px;" id="mem_name">
            </div>         
            <?php        
            
            exit;
              }
#member result table list
#@david.jp
##                     
        $rs1 = mysqli_query($cn,"select * from mst_subject ");

        echo "<h2 class=head1> Select Subject Name to See Score </h2>";
        echo "<table align=center class=coll>";

        while ($row = mysqli_fetch_row($rs1)) {
            echo "<tr><td align=center class=style3><a href=subjectscore.php?testid=$row[0]&testname=$row[1]><div >$row[1]</div></a>";
        }
        echo "</table>";
        ?>
    </body>
</html>
