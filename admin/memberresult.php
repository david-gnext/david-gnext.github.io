<?php
session_start();
?>
<html>
    <head>
        <title>Member Result</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include("header.php");
        include("../database.php");
        ?>

        <p class="head1">Member List</p>
        
        
        <?php
        $rs = mysql_query("select * from mst_user", $cn) or die(mysql_error());
        echo "<table border=0 align=center class='result_tb'><thead class=style6><th width=300>Member Name </th><th width=300>City</th><th width=200>Email</th></thead>";
        //check for member exist
        if (mysql_num_rows($rs) > 0) {
            while ($row = mysql_fetch_row($rs)) {
                echo "<tr class=style5>
                          <td><abbr title='See my result'>" . $row[3] . "</abbr>
                               <a href='result.php?name=$row[1]&mem=$row[3]'><input type='button' style='float:right' value='Result'></a>
                             
                                       <form method='post' action='memberresult.php'>
                                       <input type='hidden' name='del' value='$row[1]'>         
                                       
                                       </form>
                          </td> 
                          <td align=center> $row[5]</td> 
                          <td align=center> $row[7]</td></tr>";
            }
        } else {
            echo "<tr align='center'><td colspan='3'>No member to show</td></tr>";//<input type='submit' style='float:right;' name='submit' value='Delete'>
        }
        //------------------*---------------------
        echo "</table>";
        
        if (isset($_POST['submit'])) {
            extract($_SESSION);
            mysql_query('delete from mst_user where login="'.$_POST["del"].'"', $cn) or die(mysql_error());
            mysql_query('delete from mst_result where login="'.$_POST["del"].'"', $cn) or die(mysql_error());
            mysql_query('delete from mst_useranswer where sess_id="'.session_id().'"', $cn) or die(mysql_error());
            
            echo '<meta http-equiv="refresh" content="0">';
        }
        ?>
<!--        <script>            
                    function showbox(){                                  
                    var Box = 'result_box';
                    var ovlSchedule = {
                            isClick: true,
                            isOvl: false,
                            init: function () {
                                //init
                                $('body').append('<div id="' + Box + '">');
                                this.isOvl = true;
                            },
                            openBox: function () {
                                if (!this.isOvl) {
                                    this.init();
                                }
                                var act = 'result.html';
                                Core.ajax({
                                    url: act,
                                    data: d.data,
                                    dataType: 'json'
                                },
                                // callback function
                                function (d) {
                                    ovlSchedule.openCb(d.html);
                                });
                            },
                            openCb: function (contents) {
                                var $ovl = $('#' + Box);
                                $ovl.dialog({
                                    autoOpen: false,
                                    position: ['center', 'center'],
                                    height: 'auto',
                                    width: 'auto',
                                    modal: true                                                                     
                                });
                                $ovl.dialog("open");
                            }
                        };
    return ovlSchedule;                
    }

        </script>-->


