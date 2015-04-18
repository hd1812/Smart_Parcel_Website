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
		<noscript><link rel="stylesheet" href="css/5grid/core.css" /><link rel="stylesheet" href="css/5grid/core-desktop.css" /><link rel="stylesheet" href="css/5grid/core-1200px.css" /><link rel="stylesheet" href="css/5grid/core-noscript.css" /><link rel="stylesheet" href="css/style.css" /><link rel="stylesheet" href="css/style-desktop.css" /></noscript>
		<script src="css/5grid/jquery.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=55&amp;mobileUI.openerWidth=75&amp;mobileUI.openerText=&lt;"></script>
		<script type="text/javascript">
		function clear_text(x){
			document.getElementById(x).value=""
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
							  <nav class="mobileUI-site-nav"> <a href="default.htm">Homepage</a>
								    <a href="ourproposal.html">Our Proposal </a>
								    <a href="ourproduct.html">Our Product </a>
								    <a href="ourreport.html">Our Report </a>
								    <a href="aboutus.html">About Us </a>	</nav>
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
	 
	  <form action="WEBACCESS.php" method="post" >
	    <label>
	    <div align="center">Username
	      <input name="user_email" type="text" id="user_email" value="Your Email Address" onFocus="clear_text(this.id)"/>
        </div>
	    </label>
        <p align="center">
          <label>Password
          <input type="password" name="user_pswd">
          </label>
		  
          <input type="hidden" name="cmd" value="login_verification">
        </p>
<tr>
                            <td height="35" ><div align="center"><input name="Submit" type="submit" class="button" id="Submit" value="Log in">
                            <input name="cs" type="reset" class="button" id="cs" value="Reset" onClick="showConfirmMsg1()">
                            </div></td>
                            <td width="20%" height="35" ><div align="center"></div></td>
                            <td width="67%" class="top_hui_text"><div align="center"><a href="signup.php">Back to sign up</a> </div></td>
        </tr>
	  </form>

	   	  
	  <p>&nbsp;</p>
	</div>

		            <!-- Copyright -->
			<div id="copyright">
				&copy; SmartParcel. All rights reserved.  
			</div>

	</body>
</html>