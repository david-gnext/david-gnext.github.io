<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Gnext Online Quiz</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php        
        include("header.php");
        extract($_POST);
        if (isset($submit)) {
            include("database.php");
            $rs = mysql_query("select * from mst_user where login ='$user' and pass ='$pass'", $cn) or die(mysql_error());            
            if (mysql_num_rows($rs) < 1) {
                echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
                $_SESSION['alogin'] = false;
                exit;
            }
            $_SESSION['alogin'] = true;
        } 
        if (isset($_SESSION['alogin'])) {
            if($_SESSION['alogin']){
            ?>
            <script>window.location.href = 'sublist.php';</script>
            <?php
            }
            else{
            echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";                
            }
        }
        ?>    
        <div class="login-box ">
            <h3> Log In </h3>
            <form method="POST">
                <input type="text" name="user"  placeholder="Type User Name"><br>
                <input type="password" name="pass"  placeholder="Type Password"><br>
                <input type="submit" name="submit" value="Login" class="button">
            </form>
            <span id="signup_text">You are not still a member.Click <a href="signup.php">Sign Up</a></span>
        </div>
    </body>
</html>
