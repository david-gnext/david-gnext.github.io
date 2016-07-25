<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login - Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
if(isset($_SESSION['alogin'])){
    unset($_SESSION['alogin']);
}
include("header.php");
?>
<div class="login-box">
<h2>Adminstrative Login </h2>
<form name="form1" method="post" action="login.php">       
    <div class="col">
     Login ID
    <input name="loginid" type="text" class="style2" id="loginid" placeholder="Type ID here">
    </div>
    <div class="col">
    Password
    <input name="pass" type="password" class="style2" id="pass" placeholder="Type Password here">    
    </div>
    <div class="col">
        <input name="submit" type="submit" id="submit" value="Login" class="button">
    </div>
</form>
</div>
</body>
</html>
