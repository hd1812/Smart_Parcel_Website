<!DOCTYPE html PUBLIC>
<!--
	Halcyonic 2.0 by HTML5 Up!
	html5up.net | @nodethirtythree
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php session_start();

include ('DBAPI.php');

$new_user= new SMPDB\DBACCESS(); 
if($_POST['user_id']!=0){
	$new_user->user_id=$_POST['user_id'];
}
else{
	$new_user->user_id = $_SESSION['user_id'];
};
?>
<html>
	<head>
		<title>Smart Parcel</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<noscript><link rel="stylesheet" href="css/5grid/core.css" /><link rel="stylesheet" href="css/5grid/core-desktop.css" /><link rel="stylesheet" href="css/5grid/core-1200px.css" /><link rel="stylesheet" href="css/5grid/core-noscript.css" /><link rel="stylesheet" href="css/style.css" /><link rel="stylesheet" href="css/style-desktop.css" /></noscript>
		<script src="css/5grid/jquery.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=55&amp;mobileUI.openerWidth=75&amp;mobileUI.openerText=&lt;"></script>
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
	 

	    <label>
	    Welcome &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
	    <a href="userinfo.php">
	    <?php
         echo $_SESSION['temp'].'<br />';
		 //echo $new_user->view_user();
		?>
      </a>
	    <div align="center"></div>
	    </label>
        


	   	  
	    <table width="490" height="248" border="0">
          <tr>
            <td width="214">ID</td>
            <td width="266">
	    <?php
         echo $_SESSION['user_id'].'<br />';
		?>
		</td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php
         echo $_SESSION['user_email'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td><?php
         echo $_SESSION['user_first_name'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>Last Name </td>
            <td><?php
         echo $_SESSION['user_last_name'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td><?php
         echo $_SESSION['user_mobile'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><?php
         echo $_SESSION['user_address'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>County</td>
            <td><?php
         echo $_SESSION['user_county'].'<br />';
		?></td>
          </tr>
          <tr>
            <td>Post Code </td>
            <td><?php
         echo $_SESSION['user_postcode'].'<br />';
		?></td>
          </tr>
        </table>
	    <p><a href="userpage.php">Back to  previous page</a> </p>
    </div>

		            <!-- Copyright -->
			<div id="copyright">
				&copy; SmartParcel. All rights reserved.  
			</div>

	</body>
</html>