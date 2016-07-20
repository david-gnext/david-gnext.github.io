<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Test List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<script src="jquery.min.js"></script>
<script src="js/common.js"></script>
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$rs1=mysqli_query($cn,"select * from mst_subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<div id=featured-wrapper><div id=featured><h3>$row1[1]</h3>";
$rs=mysqli_query($cn,"select * from mst_test where sub_id=$subid");
//Select for start taking exam
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h2> No Quiz for this Subject </h2></div></div>";
	exit;
}
echo "<h5>Select Quiz Name to Give Quiz </h5></div></div>";
echo "<div id=content>";

while($row=mysqli_fetch_row($rs))
{
	echo "<div class=link-li><a href=quiz.php?testid=$row[0]&subid=$subid><div>$row[2]</div></div>";
}
echo "</div>";
?>
</body>
</html>
