<?php session_start();
/**
 * Created by PhpStorm.
 * User: Daiwen
 * Date: 1/20/14
 * Time: 1:23 PM
 */
include ('DBAPI.php');
$cmd = $_POST['cmd'];
$new_pswd=$_POST['new_pswd'];

$web = new SMPDB\DBACCESS;
$web->user_email = $_POST['user_email'];
$web->user_pswd = $_POST['user_pswd'];
$web->user_first_name = $_POST['user_first_name'];
$web->user_last_name = $_POST['user_last_name'];
$web->user_address = $_POST['user_address'];
$web->user_mobile = $_POST['user_mobile'];
$web->user_postcode_F = $_POST['user_postcode_F'];
$web->user_postcode_R = $_POST['user_postcode_R'];
$web->user_address = $_POST['user_address'];

if($_POST['user_id']!=0){
	$web->user_id=$_POST['user_id'];
}
else{
	$web->user_id = $_SESSION['user_id'];
};

//$web->user_id = $_SESSION['user_id'];

//echo "Command: $cmd<br>";

if($cmd == 'login_verification')
{
    $rtn_login = $web->login_verification();       //the function returns an array from the class, the field in it will direct the webpage into the correct ones.
    if($rtn_login['rtnstatus']==true)
    {
        session_start();                        //this is the redirect part into the userpage.php
        $_SESSION["temp"]=$rtn_login['user_email'];
		$_SESSION["user_id"]=$rtn_login['user_id'];
        $url = "userpage.php";
        Header("Location:$url");
    }
    elseif($rtn_login['rtnstatus'] == false)       //will return to the error page if there is an error in the login information
    {
        $url = "error.php";
        Header("Location:$url");
    }
}
elseif($cmd == 'add_user')                      //the add_user function will also insert the address for registration
{
    $web->add_user();
    $web->add_address();
	echo "Sign up successful, re-direct to log in page";
	$url = "login.php";
    Header("Location:$url");
}
elseif($cmd == 'delete_user')
{
    $web->delete_user();
	$url = "login.php";
	Header("Location:$url");
}
elseif($cmd == 'add_address')
{
    $web->add_address();
}
elseif($cmd == 'change_pswd')
{
    $web->change_pswd($new_pswd);
}
elseif($cmd == 'list_parcel')
{
    $parcel=$web->list_parcel();
	$_SESSION["parcel_id"]=$parcel["parcel_id"];
	$_SESSION["received"]=$parcel['received'];
 	$_SESSION["orig_first_name"]=$parcel["orig_first_name"];
 	$_SESSION["orig_last_name"]=$parcel['orig_last_name'];
	$_SESSION["orig_phone"]=$parcel['orig_phone'];
	$_SESSION["orig_receiver"]=$parcel['orig_receiver'];
	$_SESSION["orig_county"]=$parcel['orig_county'];
	$_SESSION["orig_postcode"]=$parcel['orig_postcode'];
	$_SESSION["div_first_name"]=$parcel['div_first_name'];
	$_SESSION["div_last_name"]=$parcel["div_last_name"];
	$_SESSION["div_phone"]=$parcel['div_phone'];
 	$_SESSION["div_receiver"]=$parcel["div_receiver"];
 	$_SESSION["div_county"]=$parcel['div_county'];
	$_SESSION["div_postcode"]=$parcel['div_postcode'];
	
	$url = "parcelinfo.php";
    Header("Location:$url");
}
elseif($cmd == 'view_user')
{
    $rtnview_user = $web->view_user();
    //send back to the page userinfo.php
	$_SESSION["temp"]=$rtnview_user["user_email"];
	$_SESSION["user_id"]=$rtnview_user['user_id'];
 	$_SESSION["user_email"]=$rtnview_user["user_email"];
 	$_SESSION["user_first_name"]=$rtnview_user['user_first_name'];
	$_SESSION["user_last_name"]=$rtnview_user['user_last_name'];
	$_SESSION["user_mobile"]=$rtnview_user['user_mobile'];
	$_SESSION["user_address"]=$rtnview_user['user_address'];
	$_SESSION["user_county"]=$rtnview_user['user_county'];
	$_SESSION["user_postcode"]=$rtnview_user['user_postcode'];
    $url = "userinfo.php";
    Header("Location:$url");
}
?>