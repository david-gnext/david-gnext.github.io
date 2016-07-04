<?php
session_start();
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/* $rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
  if($_SESSION[qn]>mysql_num_rows($rs))
  {
  unset($_SESSION[qn]);
  exit;
  } */
if (isset($subid) && isset($testid)) {
    $_SESSION['sid'] = $subid;
    $_SESSION['tid'] = $testid;
    header("location:quiz.php");
}
if (!isset($_SESSION['sid']) || !isset($_SESSION['tid'])) {
    header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Online Quiz</title>
        <script src="jquery.min.js"></script><script src="jquery-ui.js"></script>
        <script src="js/common.js"></script>
        <script src="js/quiz.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link href="css/quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body onload="time()"> 
        <?php
        include("header.php");


        $query = "select * from mst_question";

        $rs = mysql_query("select * from mst_question where test_id=$tid", $cn) or die(mysql_error());
        if (!isset($_SESSION['qn'])) {
            $_SESSION['qn'] = 0;
            mysql_query("delete from mst_useranswer where sess_id='" . session_id() . "'") or die(mysql_error());
            $_SESSION['trueans'] = 0;
        } else {
            if (isset($_POST['submit'])) {
                extract($_POST);
                if ($_POST['submit'] == 'Next Question' && isset($ans)) {
                    mysql_data_seek($rs, $_SESSION['qn']);
                    $row = mysql_fetch_row($rs);
                    mysql_query("insert into mst_useranswer(sess_id,test_id,que_des,ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
                    if ($ans == $row[7]) {
                        $_SESSION['trueans'] = $_SESSION['trueans'] + 1;
                    }
                    $_SESSION['qn'] = $_SESSION['qn'] + 1;
                } else if ($_POST['submit'] == 'Get Result' && isset($ans)) {
                    mysql_data_seek($rs, $_SESSION['qn']);
                    $row = mysql_fetch_row($rs);
                    mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
                    if ($ans == $row[7]) {
                        $_SESSION['trueans'] = $_SESSION['trueans'] + 1;
                    }
                    echo "<div id=featured-wrapper> Result</div>";
                    $_SESSION['qn'] = $_SESSION['qn'] + 1;
                    echo "<div id=content><div class=style1>Total Question<span style='float:right;'>" . $_SESSION['qn']."</span></div>";
                    echo "<div class=style1>True Answer<span style='float:right;'>" . $_SESSION['trueans']."</span></div>";
                    $w = $_SESSION['qn'] - $_SESSION['trueans'];
                    echo "<div class=style1>Wrong Answer<span style='float:right;'>" . $w."</span></div>";;
                    if ($_SESSION['trueans'] > $_SESSION['qn'] / 2) {
                        ?>
                        <script>alert('You are Pass!!!!');</script>
                        <?php
                    } else {
                        ?>
                        <script>alert('You are Fail,Try more your lesson!!!');</script>
                        <?php
                    }                    
                    mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login','$tid','" . date("d/m/Y") . "','" . $_SESSION['trueans'] . "')") or die(mysql_error());
                    echo "<h1 align=center><a href=review.php> Review Question</a> </h1></div>";
                    unset($_SESSION['qn']);
                    unset($_SESSION['sid']);
                    unset($_SESSION['tid']);
                    unset($_SESSION['trueans']);
                    exit;
                }
            }
        }        
        //$rs = mysql_query("select * from mst_question where test_id=" . $tid, $cn) or die(mysql_error());
        if ($_SESSION['qn'] > mysql_num_rows($rs) - 1) {
            unset($_SESSION['qn']);
            echo "<h1 class=head1>Some Error  Occured</h1>";
            //session_destroy();
            echo "Please <a href=index.php> Start Again</a>";

            exit;
        }
        mysql_data_seek($rs, $_SESSION['qn']);
        $row = mysql_fetch_row($rs);        
        echo "<form name='myfm' method='POST' action='quiz.php' class='login-box'>";
                $n = $_SESSION['qn'] + 1;
        echo "<div id=featured_wrapper><center><h3>Que " . $n . ": $row[2]</h3></center></div>";
        echo "<div><input type='radio' name='ans' value='1' id='a1'>$row[3]</div>";
        echo "<div><input type='radio' name='ans' value='2'id='a2'>$row[4]</div>";
        echo "<div><input type='radio' name='ans' value='3' id='a3'>$row[5]</div>";
        echo "<div><input type='radio' name='ans' value='4' id='a4'>$row[6]</div>";

        if ($_SESSION['qn'] < mysql_num_rows($rs) - 1) {
            echo "<center><input type='submit' name='submit' value='Next Question' id='next'></center>";
        } else {
            echo "<center><input type='submit' name='submit' value='Get Result'></center>";
        }
        echo "</form>";
        ?>                  
    </body>
</html>