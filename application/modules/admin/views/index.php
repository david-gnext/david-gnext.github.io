<link href="<?php echo base_url();?>common/css/quizz.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="login-box">
<h2>Adminstrative Login </h2>
<form name="form1" method="post" action="admin/login">       
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
