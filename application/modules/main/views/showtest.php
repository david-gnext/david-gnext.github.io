</head>
<body>
<?php
echo "<div id=featured-wrapper><div id=featured><h3>".$query[0]->sub_name."</h3>";
//Select for start taking exam
if(count($test) == 0)
{
	echo "<br><br><h2> No Quiz for this Subject </h2></div></div>";
	exit;
}
echo "<h5>Select Quiz Name to Give Quiz </h5></div></div>";
echo "<div id=content>";
foreach($test as $t)
{
	echo "<div class=link-li><a href=".site_url("main/quiz/testid/".$t->test_id."/subid/".$t->sub_id)."><div>".$t->test_name."</div></div>";
}
echo "</div>";
?>
</body>
</html>
