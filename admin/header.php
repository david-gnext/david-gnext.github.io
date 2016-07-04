
<div id="head-wrapper">
 <div id="header" class="container">
         <div id="logo">
   <h1>GNEXT Online Quiz Management</h1>
         </div>
     <div id="menu"><ul>
   
	<?php
	if(isset($_SESSION['alogin']))
	{
	 echo "<li><a href=\"login.php\">Admin Home</a></li><li><a href=\"signout.php\">Signout</a></li>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
         </ul>
     </div>
</div>
</div>
