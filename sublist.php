<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Online Quiz - Quiz List</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script src="jquery.min.js"></script>
        <script src="js/common.js"></script>
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link href="css/sublist.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<!--        to select quiz subject by member-->
        <?php
        include("header.php");
        include("database.php");
        echo "<div id=featured-wrapper><div id='featured' class=container> Select Subject to Give Quiz</div> </div>";
        $rs = mysqli_query($cn,"select * from mst_subject");
        echo "<div id=content>";
        while ($row = mysqli_fetch_row($rs)) {
            echo "<div class='link-li'><a href=showtest.php?subid=$row[0]><div>$row[1]</div></a></div>";
        }
        echo "</div>";
        ?>     
    </body>
</html>
