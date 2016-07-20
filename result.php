<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Quiz  - Result </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include_once("header.php");
        include_once("database.php");
        extract($_SESSION);
        $rs = mysqli_query($cn,"select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
        t.test_id=r.test_id and r.login='$login'");           
        echo "<h1 class=head1><u><span style='background:#abdd99'>$nam</span></u> Result </h1>";    
        if (mysqli_num_rows($rs) < 1) {
            echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
            exit;
        }
        echo "<table  align=center class='result_tb'><thead class=style6><th width=300 >Test Name </th><th width=100 > Total<br> Question</th> <th width=100> Score</th><th width=100>Qualification</th></thead>";
        while ($row = mysqli_fetch_row($rs)) {
            echo "<tr class=style5><td>$row[0]</td><td align=center> $row[1]</td> <td align=center> $row[3]</td>";
        
        if ($row[3]>($row[1] / 2)) {
            echo "<td align=center class=pass>Pass</td></tr>";
        } else {
            echo "<td align=center class=fail>Fail</td></tr>";
        }
        }
        echo "</table>";
        ?>
    </body>
</html>
