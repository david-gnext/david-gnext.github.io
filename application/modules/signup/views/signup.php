<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
	document.form1.address.focus();
	return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
	document.form1.city.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Plese Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');		
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 &&  f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>
<link href="<?= base_url() ?>css/signup.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="login-box ">
    <form name="form1" method="post" action="signup/signupuser" onsubmit="return check();">
        <div class="box-field">
            <h3>New User Signup</h3>                       
        </div>      
        <div class="box-field">
            <h5>Login Id </h5>
            <input type="text" name="lid"><input type="hidden" name="uid">
        </div>
        <div class="box-field">
        <h5>Password</h5>
           <input type="password" name="pass">
        </div>
        <div class="box-field">
            <h5>Confirm Password</h5>
           <input name="cpass" type="password" id="cpass">
        </div>
        <div class="box-field">
            <h5>Name</h5>
         <input name="name" type="text" id="name">
        </div>
        <div class="box-field">
            <h5>Address</h5>
            <textarea name="address" id="address"></textarea>
        </div>
        <div class="box-field">
            <h5>City</h5>
           <input name="city" type="text" id="city">
        </div>
        <div class="box-field">
            <h5>Phone</h5>
          <input name="phone" type="text" id="phone">
        </div>
        <div class="box-field">
            <h5>E-mail</h5>
       <input name="email" type="text" id="email">
        </div>           
        <input type="submit" name="Submit" value="Signup" class="button">           
       
     </form>
    </div>
</body>
</html>
