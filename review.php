<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Online Quiz - Review Quiz </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include("header.php");
        echo "<h1 class=head1> Review Test Question</h1>";
        $rs = mysql_query("select * from mst_useranswer where sess_id='" . session_id() . "'", $cn) or die(mysql_error());
        if (!isset($_SESSION['qn'])) {
            $_SESSION['qn'] = 0;
        } else {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'Next Question') {

                    $_SESSION['qn'] = $_SESSION['qn'] + 1;
                } else if ($_POST['submit'] == 'Finish') {
                    mysql_query("delete from mst_useranswer where sess_id='" . session_id() . "'") or die(mysql_error());
                    unset($_SESSION['qn']);?>
<!--                    //header("location:index.php");-->
                    <script>location.replace("index.php");</script><!--header function is not working here ,so i put js location code-->
                   <?php
                    exit;
                }
            }
        }
        mysql_data_seek($rs, $_SESSION['qn']);
        $row = mysql_fetch_row($rs);
        echo "<form name=myfm method=post action=review.php>";
        echo "<table width=100% style='margin-left:310px'> <tr> <td width=30>&nbsp;</td><td> <table border=0>";
        //give margin-left 310px for table put center****modified date 21/5/15
        $n = $_SESSION['qn'] + 1;
        echo "<tr><td width='500' align='center'class=style2><span >Que " . $n . ": $row[2]</span></td></tr>";
        echo "<tr><td class=" . ($row[7] == 1 ? 'style5' : 'style16') . ">$row[3]</td></tr>";
        echo "<tr><td class=" . ($row[7] == 2 ? 'style5' : 'style16') . ">$row[4]</td></tr>";
        echo "<tr><td class=" . ($row[7] == 3 ? 'style5' : 'style16') . ">$row[5]</td></tr>";
        echo "<tr><td class=" . ($row[7] == 4 ? 'style5' : 'style16') . ">$row[6]</td></tr>";
        if ($_SESSION['qn'] < mysql_num_rows($rs) - 1) {
            echo "<tr><td><input type=submit name=submit value='Next Question'></tr></td>";
        } else {
            echo "<tr><td><input type=submit name=submit value='Finish'></tr></td>";
        }
        echo "</table></td></tr></table></form>";
        ?>
