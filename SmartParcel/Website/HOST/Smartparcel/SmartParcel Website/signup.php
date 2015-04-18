<!DOCTYPE HTML>
<!--
	Halcyonic 2.0 by HTML5 Up!
	html5up.net | @nodethirtythree
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<title>Smart Parcel</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=55&amp;mobileUI.openerWidth=75&amp;mobileUI.openerText=&lt;"></script>
<script type="text/javascript"> 

		function check_email(x){		
			var emailStr=document.getElementById(x).value;
			var emailPat=/^(.+)@(.+)$/;
			var matchArray=emailStr.match(emailPat);
			
			if(matchArray==null){
			alert("Invalid Email Address");
			form.user_email.focus();	
			form.user_email.select(); 	
			}
		} 	
		
		function check_pswd(x){
			if(document.getElementById(x).value!= document.getElementById("user_pswd").value)  
    		{  
       		 alert("Password not match");  
			 form.password_check.focus();	
			 form.password_check.select(); 
    		}
		} 
		</script>
<script type="text/javascript"> 		
		function check_form(){
			if(document.getElementById("user_first_name").value==""){
			alert("First name cannot be empty!");
			form.user_first_name.select();
			form.user_first_name.focus();
			return false;
			}
			else if(document.getElementById("user_last_name").value==""){
			alert("Last name cannot be empty!");
			form.user_last_name.select();
			form.user_last_name.focus();
			return false;
			}
			else if(document.getElementById("user_email").value==""){
			alert("Email cannot be empty!");
			form.user_email.select();
			form.user_email.focus();
			return false;
			}
			else if(document.getElementById("user_pswd").value==""){
			alert("Password cannot be empty!");
			form.user_pswd.select();
			form.user_pswd.focus();
			return false;
			}
			else if(document.getElementById("password_check").value==""){
			alert("Please re-enter password!");
			form.password_check.select();
			form.password_check.focus();
			return false;
			}
			else if(document.getElementById("user_county").value==""){
			alert("County cannot be empty!");
			form.user_county.select();
			form.user_county.focus();
			return false;
			}
			return true;
		}
			</script>
<script type="text/javascript"> 
function check2(){
			if(document.getElementById("user_postcode_F").value==""){
			alert("Postcode cannot be empty!");
			form.user_postcode_F.select();
			form.user_postcode_F.focus();
			return false;
			}
			else if(document.getElementById("user_postcode_R").value==""){
			alert("Postcode cannot be empty!");
			form.user_postcode_R.select();
			form.user_postcode_R.focus();
			return false;
			}
			else if(document.getElementById("user_address").value==""){
			alert("Address cannot be empty!");
			form.user_address.select();
			form.user_address.focus();
			return false;
			}
			else if(document.getElementById("user_mobile").value==""){
			alert("Mobile cannot be empty!");
			form.user_mobile.select();
			form.user_mobile.focus();
			return false;
			}
			return true;
		}
			
		</script>
<script type="text/javascript"> 	
		function onlyNum(){
			var mobileStr=document.getElementById(user_mobile).value;
			var mobilePat=/^\(\d{3}\)\s*\d{3}(?:-|\s*)\d{4}$/;
			var matchArray=mobileStr.match(mobilePat);
			if(matchArray==null){
			alert("Invalid mobile number");
			document.getElementById(x).value="";	
			}
		}
		</script>
<!--[if lte IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
</head>
<body class="subpage">
<!-- Header -->
<div id="header-wrapper">
  <header id="header" class="5grid-layout">
    <div class="row">
      <div class="12u">
        <!-- Logo -->
        <h1 class="mobileUI-site-name"><a href="default.htm">Smart Parcel</a></h1>
        <!-- Nav -->
        <nav class="mobileUI-site-nav"> <a href="default.htm">Homepage</a> <a href="ourproposal.html">Our Proposal </a> <a href="ourproduct.html">Our Product </a> <a href="ourreport.html">Our Report </a> <a href="aboutus.html">About Us </a> </nav>
      </div>
    </div>
  </header>
</div>
<!-- Content -->
<div id="content-wrapper">
<div id="content">
<div class="5grid-layout">
<div class="row">
  <div class="12u">
    <!-- Main Content -->
  </div>
</div>
<form action="WEBACCESS.php" method="post" name="form" id="form" onSubmit="return check_form()&&check2()" />
  <input name="cmd" type="hidden" value="add_user">
  <table width="421" border="0" align="center">
    <tr>
      <td>First Name </td>
      <td><input type="text" name="user_first_name" id="user_first_name" onChange="check_name(this.id)"/></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td><input type="text" name="user_last_name" id="user_last_name" onChange="check_name(this.id)"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="user_email" id="user_email" onChange="check_email(this.id)"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" id="user_pswd" name="user_pswd">
      </td>
    </tr>
    <tr>
      <td>Re-enter</td>
      <td><input type="password" name="password_check" id="password_check" onChange="check_pswd(this.id)"/>
      </td>
    </tr>
    <tr>
      <td>County</td>
      <td><input type="text" name="user_county" id="user_county"></td>
    </tr>
    <tr>
      <td>Postcode </td>
      <td><input name="user_postcode_F" type="text" size="6" id="user_postcode_F">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="user_postcode_R" type="text" size="8" id="user_postcode_R"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="user_address" id="user_address"></td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><input type="text" name="user_mobile" onChange="onlyNum();" id="user_mobile"></td>
    </tr>
  </table>
  <p></p>
  <input name="Submit" type="submit" class="button" id="Submit" value="Sign Up">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="cs" type="reset" class="button" id="cs" onClick="showConfirmMsg1()" value="Reset">
  <tr>
    <td height="35" ><p></p>
      <p><a href="login.php">Already have an acount?</a> </p></td>
    <td width="20%" height="35" ><div align="center"></div></td>
    <td width="67%" class="top_hui_text"><div align="center"></div></td>
  </tr>
</form>
<p></p>
<!-- Copyright -->
<div id="copyright"> &copy; SmartParcel. All rights reserved. </div>
</body>
</html>