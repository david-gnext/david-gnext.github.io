</head>

<body>
<?php

if (isset($exist) && $exist)
{
	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";	
}
else{
echo "<br><br><br><div class=head1>Your Login ID  $name Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";
}
?>
</body>
</html>

