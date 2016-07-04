<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Adminstrative AreaOnline Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

extract($_POST);
if(isset($submit))
{
	include("../database.php");
	$rs=mysql_query("select * from mst_admin where loginid='$loginid' and pass='$pass'",$cn) or die(mysql_error());
	if(mysql_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
		
	}
	$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION['alogin']))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
include("header.php");
?>
    <div id="featured-wrapper">
        <div id="featured" id="container"><header>Welcome to Admistrative Area </header></div></div>
    <div id="content">
        <div id="button"><a href="subadd.php">Add Subject</a></div>
        <div id="button"><a href="testadd.php">Add Test</a></div>
        <div id="button"><a href="questionadd.php">Add Question </a></div>
        <div id="button"><a href="memberresult.php">See Member</a></div>
        <div id="button"><a href="subjectscore.php">Tasks Result</a></div>
    </div>
</body>
</html>
