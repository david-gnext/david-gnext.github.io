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

<p class="head1">Adminstrative Login </p>
<form name="form1" method="post" action="login.php">
    <table width="490" border="0" align="center">
        <tr class="style8">
    <td width="106"><span class="style2"></span></td>
    <td width="132"><span class="style2"><span class="head1"><img src="login.jpg" width="131" height="155"></span></span></td>
    <td width="238"><table width="219" border="0" align="center">
  <tr class="style8">
    <td width="163" class="style2">Login ID </td>
    <td width="149"><input name="loginid" type="text" id="loginid" placeholder="Type ID here"></td>
  </tr>
  <tr class="style8">
    <td class="style2">Password</td>
    <td><input name="pass" type="password" id="pass" placeholder="Type Password here"></td>
  </tr>
  <tr class="style8">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="style8">
    <td>&nbsp;</td>
    <td><input name="submit" type="submit" id="submit" value="Login"></td>
  </tr>
</table></td>
  </tr>
</table>

</form>

</body>
</html>
