<?php
session_start();

?>
<html>
<head>    
<title>Adding Subject</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="../css/subadd.css" type="text/css" rel="stylesheet">
</head>
<body>   
   
<?php
include("header.php");
include("../database.php");
extract($_POST);  
echo "<div class=box><h2>Subject Add</h2>";

if(isset($_POST['submit'])){
if($_POST['submit']=='submit' || strlen($subname)>0 )
{
$rs=mysqli_query($cn,"select * from mst_subject where sub_name='$subname'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Subject is Already Exists</div>";
	exit;
}
mysqli_query($cn,"insert into mst_subject(sub_name) values ('$subname')");
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$_POST['submit']="";
}
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>


<form name="form1" method="post" onSubmit="return check();" >
    <div><span>Enter Subject Name </span><input name="subname" type="text" id="subname"></div>
    
       <input type="submit" name="submit" value="Add" >
    
</form>
    </div>
</body>
</html>