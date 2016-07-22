<?php
session_start();
?>
<html>
    <head>
        <title>Member Result</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
        <script src="../js/Chart.js-master/Chart.js"></script>
    </head>

    <body>

        <?php
        include("header.php");

        include("../database.php");
        extract($_SESSION);
        $member = $_GET['name'];
        $rs = mysqli_query($cn,"select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
t.test_id=r.test_id and r.login='$member'");
        echo "<h1 class=head1><u><span style='background:#abdd99'>" . $_GET["mem"] . "</span></u> Result </h1>";
        if (mysqli_num_rows($rs) < 1) {
            echo "<br><br><h1 class=head1> You have not take answer any quiz</h1>";
            exit;
        }
        echo "<table align=center class='result_tb'><thead class='style6'><th width=300 >Test Name</th> <th width=200> Total<br> Question</th> <th width=100 > Score</th><th width=200 >Qualification</th></thead>";
        $na = array();
        $sub = array();
        while ($row = mysqli_fetch_row($rs)) {            
            echo "<tr class=style5><td>$row[0]</td> <td align=center> $row[1]</td> <td align=center> $row[3]</td>";
            if ($row[3] > ($row[1] / 2)) {
                echo "<td align=center class=pass>Pass</td></tr>";
            } else {
                echo "<td align=center class=fail>Fail</td></tr>";
            }
            array_push($na, $row[3]);
            array_push($sub, $row[0]);
            //$js_array=  json_encode($na);             
        }
        $name = $_GET['mem'];
        echo "</table>";
        ?>
        <script>
            var name, arr, subj, cond = new Array();
<?php
echo "name='" . $name . "';";
echo "arr = " . json_encode($na) . ";";
echo "subj=" . json_encode($sub) . ";";
?>

            cond[2] = (typeof arr[2] === 'undefined' ? '0' : arr[2]);
            cond[1] = (typeof arr[1] === 'undefined' ? '0' : arr[1]);
            cond[0] = (typeof arr[0] === 'undefined' ? '0' : arr[0]);
            if (subj[0] == 'Jquery Exam1')
            {
                cond[1] = (subj[0] == 'Jquery Exam1' ? arr[0] : arr[1]);
                cond[2] = (typeof arr[1] === 'undefined' ? '0' : arr[1]);
                cond[0] = (subj[0] == 'Jquery Exam1' ? '0' : arr[0]);
            }
          if(subj[0]== 'HTML basic '){
              cond[2]=(subj[0]== 'HTML basic '?arr[0]:arr[2]);
              cond[0]=(typeof arr[0] === 'undefined' ? '0' : '0');
          }
            //    cond[2]=(subj[0]=='HTML basic'?arr[0]:cond[0]);


            var polarData = {
                labels: [name],
                datasets: [
                    {
                        fillColor: "#F7464A",
                        strokeColor: "#FFf",
                        hightlightStroke: "#aaa",
                        data: [cond[0]]
                    },
                    {
                        fillColor: "#46BFBD",
                        strokeColor: "#FFf",
                        hightlightStroke: "#aaa",
                        data: [cond[1]]
                    },
                    {
                        fillColor: "#949fb1",
                        strokeColor: "#fff",
                        hightlightStroke: "#aaa",
                        data: [cond[2]]

                    }]
            }


            window.onload = function () {
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myBar = new Chart(ctx).Bar(polarData, {
                    responsive: true,
                });
            };
        </script>
        <div id="canvas-holder" style="width:20%;margin:0 auto;">
            <canvas id="chart-area" width="100" height="100"/>

        </div>
    </div>
    <div style="float: right;width:200px;">
        <div style="background:#F7464A;min-width:80px;height:20px;float:left;"></div><span>CSS</span>
        <div style="clear:both;"></div>
        <div style="background:#46BFBD;min-width:80px;height:20px;float:left;"></div><span>Jquery</span>
        <div style="clear:both;"></div>
        <div style="background:#949fb1;min-width:80px;height:20px;float:left;"></div><span>HTML</span>
        <div style="clear: both;"></div>

    </div>
</body>
</html>