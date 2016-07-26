<link href="<?= base_url() ?>common/css/subadd.css" rel="stylesheet" type="text/css">  
</head>
<body>   
   
<?php
echo "<div class=box><h2>Subject Add</h2>";
if (isset($error)){
    if($error){
	echo "<div class=message>Subject is Already Exists</div>";	
}
else{
echo "<p class=message>Subject  ".$subname ." Added Successfully.</p>";
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
    <div><span class="spLeft">Enter Subject Name </span></div>
    <input name="subname" type="text" id="subname">
    <input type="submit" name="submit" value="Add" class="style1">
    
</form>
    </div>
</body>
</html>