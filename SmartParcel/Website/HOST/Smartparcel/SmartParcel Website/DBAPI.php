<?php
/**
 * Created by PhpStorm.
 * User: Daiwen
 * Date: 1/10/14
 * Time: 3:51 PM
 */

namespace SMPDB;
include ('conndbsmp.php');

class DBACCESS {
    var $user_first_name;     //sql query input
    var $user_last_name;
    var $user_mobile;
    var $user_address;
    var $user_county;
    var $user_postcode_F;
    var $user_postcode_R;
    var $user_pswd;
    var $user_email;
    var $user_id;
    var $address_id;



    function login_verification()           //login function requires user_email and user_pswd ---DONE
    {
        if($this->user_email == '' or $this->user_pswd == '')
        {
            echo "input parameters not correct";
			$returnarr = array(
                "rtnstatus" => false,
                "user_email" => "NULL",
            );
            return $returnarr;
        }
        else
        {
            echo "User email: $this->user_email<br>";
            echo "User Password: $this->user_pswd<br>";
            $check_query=mysql_query("SELECT user_id FROM user_info where user_email='$this->user_email' AND user_pswd='$this->user_pswd' limit 1");  //check if there is any matches in the database
            if($result = mysql_fetch_array($check_query))
            {
                $url='http://smartparcel.hol.es/WEBACCESS.php';
                $this->user_id=$result['user_id'];
                echo "Login successful<br>";
                $returnarr = array(                 //this is the return array with fields rtnstatus(indicate the login is successful or not), and user_email for return
                    "rtnstatus" => true,
                    "user_email" => $this->user_email,
                    "user_id" => $this->user_id,
                );
                return $returnarr;                  //return value for successful verification


                /*$curlpost = 'test message';
                $ch=curl_init();
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HEADER,0);
                curl_setopt($ch,CURLOPT_POST,true);
                curl_setopt($ch,CURLOPT_POSTFIELDS,$curlpost);

                $response=curl_exec($ch);
                if($response == false)
                {
                    echo 'POST FAILED';
                }
                else
                {
                    echo 'POST SUCCESS';
                }
                curl_close($ch);
                exit;*/
                /*session_start();
                $_SESSION["temp"]=array($this->user_email);
                $url = "userpage.php";
                Header("Location:$url");*/
            }
            else
            {
                echo "Login failed";
                $returnarr = array(
                    "rtnstatus" => false,
                    "user_email" => "NULL",
                );
                return $returnarr;
            }
        }
    }
    function validation()        //check if there is any exactly same records in the database, if there is returns 0, otherwise returns 1
    {
        $check_query = mysql_query("SELECT * FROM user_info WHERE user_email='$this->user_email'");
        if($result=mysql_fetch_array($check_query))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    function add_user_validation()        //check if there is any exactly same records in the database, if there is returns 1, otherwise returns 0
    {
        if($this->user_first_name == '' OR $this->user_last_name == '' OR $this->user_mobile == '' OR $this->user_email == '' OR $this->user_pswd == '')
        {
            echo "MISSING BASIC INFORMATION (BLANK FIELD DETECTED)";
            return 1;
        }
        else
        {
            $check_query = mysql_query("SELECT * FROM user_info WHERE user_email='$this->user_email'");
            if($result=mysql_fetch_array($check_query))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
    }
    function address_validation()       //check if there is any same address belongs to the same user, if yes returns 1 and otherwise 0
    {
        if($this->user_address=='')
        {
            echo "MISSING ADDRESS";
            return 1;
        }
        else
        {
            $check_query = mysql_query("SELECT * FROM user_address WHERE user_id='$this->user_id' AND user_address='$this->user_address' ");
            if($result=mysql_fetch_array($check_query))
            {
                $this->address_id=$result['address_id'];
                return 1;
            }
            else
            {
                return 0;
            }
        }
    }
    function add_user()                 //add a new user into the database;
    {
        $commit=0;
        $rtnarr=array(
            "rtnstatus" => "Failed",
            "user_id" => "NULL",
        );
            $sql = "INSERT INTO user_info (user_first_name, user_last_name, user_mobile, user_email, user_pswd) VALUES ('$this->user_first_name','$this->user_last_name','$this->user_mobile','$this->user_email','$this->user_pswd')";
            $commit = $this->add_user_validation();
            if($commit==0)
            {
                if(!mysql_query($sql))
                {
                    echo "RECORD_ADD FAILED£º".mysql_error();
                    $rtnarr['rtnstatus'] = "sqlerror_FAILED";
                }
                else
                {
                    echo "RECORD_ADD SUCCESS <br>";
                    $rtnarr['rtnstatus'] = "success";
                    $result = mysql_query("SELECT user_id FROM user_info WHERE user_first_name='$this->user_first_name'");
                    $row = mysql_fetch_array($result);
                    print_r($row);
                    $rtnarr['user_id']=$row['user_id'];
                    return $rtnarr;                             //merge the returned user_id in the return array

                }
            }
            elseif($commit==1)
            {
                echo "SAME RECORD DETECTED.<br>";
                $rtnarr['rtnstatus'] = "same_record_detected_FAILED";
            }
        else
        {
            echo "MISSING PARAMETERS";
            $rtnarr['rtnstatus'] = "missing_parameters_FAILED";
        }
        return $rtnarr;

    }
    function update_user_info()
    {

    }
    function delete_user()
    {
        $commit=0;
        $commit = $this->validation();
        $sql = "DELETE FROM user_info WHERE user_id='$this->user_id'";
        if($commit==0)
        {
            if(!mysql_query($sql))
            {
                echo "RECORD_DELETE FAILED£º".mysql_error();
            }
            else
            {
                echo "RECORD_DELETE SUCCESS<br>";
            }
        }
        elseif($commit==1)
        {
            echo "RECORD DIDN'T FOUND <br>";
        }
    }
    function view_user()
    {
        $result = mysql_query("SELECT * FROM user_info WHERE user_id='$this->user_id'");
        $row = mysql_fetch_array($result);
        $this->user_id = $row['user_id'];
        $this->user_email = $row['user_email'];
        $this->user_first_name = $row['user_first_name'];
        $this->user_last_name = $row['user_last_name'];
        $this->user_mobile = $row['user_mobile'];
        /*while(@$row = mysql_fetch_array($result))
        {
            print_r($row);
            echo "<br>";
        }*/
        //TODO: for returning multiple results.
        $resaddsql = "SELECT * FROM user_address WHERE user_id = '$this->user_id'";
        $resultadd = mysql_query($resaddsql);
        $rowresultadd = mysql_fetch_array($resultadd);
        print_r($row);
        echo "<br> Address information <br>";
        print_r($rowresultadd);
        echo "start return array";
        $returnarr = array(
            "user_id" => $row['user_id'],
            "user_email" => $row['user_email'],
            "user_first_name" => $row['user_first_name'],
            "user_last_name" => $row['user_last_name'],
            "user_mobile" => $row['user_mobile'],
            "user_address" => $rowresultadd['user_address'],
            "user_county" => $rowresultadd['user_county'],
            "user_postcode" => $rowresultadd['user_postcode_F'].' '.$rowresultadd['user_postcode_R'],
        );
        echo "return array <br>";
        print_r($returnarr);
        return $returnarr;

    }
    function add_address()          //TODO: STILL A BUG HERE (IF A DUPLICATE USER IS FOUND BUT ADDING A NEW ADDRESS)
    {
        $rtnarr = array(
            "rtnstatus" => "FAILED",
            "address_id" => 0,
        );
        $commit=0;
        $sql = "INSERT INTO user_address (user_id, user_address, user_postcode_F, user_postcode_R, user_county) VALUES ('$this->user_id', '$this->user_address','$this->user_postcode_F','$this->user_postcode_R','$this->user_county')";
        $commit=$this->address_validation();
        if($commit==0)
        {
            if(!mysql_query($sql))
            {
                echo "RECORD_ADD FAILED£º".mysql_error();
                $rtnarr['rtnstatus'] = "sqlerror_FAILED";
            }
            else
            {
                echo "RECORD_ADD SUCCESS <br>";
                $rtnarr['rtnstatus'] = "success";
                $this->address_validation();
                $rtnarr['address_id'] = $this->address_id;
            }
        }
        else
        {
            echo "same address belongs to same user found";
            $rtnarr['rtnstatus'] = "same_add_belongs_to_same_usr_found_FAILED";
        }
        return $rtnarr;
    }
    function delete_address()
    {

    }
    function update_address($new_address,$new_postcode_F,$new_postcode_R)
    {
        $updsql = "UPDATE user_address SET user_address='$new_address' AND user_postcode_F='$new_postcode_F' AND user_postcode_R='$new_postcode_R' WHERE address_id='$this->user_address_id'";
    }
    function change_pswd($new_pswd)
    {
        //$sql = "SELECT user_pswd From user_info WHERE user_id = '$this->user_id'";
        //$result = mysql_query($sql);
        $updsql = "UPDATE user_info SET user_pswd = '$new_pswd' WHERE user_id = '$this->user_id'";
        if(!mysql_query($updsql))
        {
            echo "PASSWORD UPDATE FAILED£º".mysql_error();
        }
        else
        {
            echo "PASSWORD UPDATE SUCCESS <br>";
        }
    }
    function divert_parcel()
    {

    }
    function list_parcel()
    {
        //retrieve the parcel according to user_id
        $sqlparcel="SELECT * from parcel_info WHERE user_id='$this->user_id'";
        $resultparcel=mysql_query($sqlparcel);
        $rowparcel=mysql_fetch_array($resultparcel);

        echo "parcel information <br>";
        print_r($rowparcel);

        $origadd=$rowparcel['orig_receiver_addr_ID'];
        $divadd=$rowparcel['div_receiver_addr_ID'];
        echo "<br>";

        //retrieve the original deliver address
        $sqladdressorig="SELECT * from user_address WHERE address_id='$origadd'";
        $resultaddress=mysql_query($sqladdressorig);
        $rowaddressorig=mysql_fetch_array($resultaddress);
        $origusrid=$rowaddressorig['user_ID'];

        //retrieve the diverted deliver address
        $sqladdressdiv="SELECT * from user_address WHERE address_id='$divadd'";
        $resultaddressdiv=mysql_query($sqladdressdiv);
        $rowaddressdiv=mysql_fetch_array($resultaddressdiv);
        $divusrid=$rowaddressdiv['user_ID'];

        //retrieve original receiver user name referenced by user_id
        $sqlrecvorig="SELECT * FROM user_info WHERE user_id='$origusrid'";
        $resultrecvorig=mysql_query($sqlrecvorig);
        $rowrecvorig=mysql_fetch_array($resultrecvorig);

        //retrieve diverted receiver user name reference by user_id
        $sqlrecvdiv="SELECT * FROM user_info WHERE user_id='$divusrid'";
        $resultrecvdiv=mysql_query($sqlrecvdiv);
        $rowrecvdiv=mysql_fetch_array($resultrecvdiv);

        //print out the result
        echo "address information <br>";
        echo "original address <br>";
        print_r($rowaddressorig);
        echo "<br>";
        echo "diverted address <br>";
        print_r($rowaddressdiv);
        echo "<br>";

        $returnarr=array(
            "parcel_id" => $rowparcel['parcel_ID'],
            "received" => $rowparcel['RECEIVED'],
            "orig_first_name" => $rowrecvorig['user_first_name'],
            "orig_last_name" => $rowrecvorig['user_last_name'],
            "orig_phone" => $rowrecvorig['user_mobile'],
            "orig_receiver" => $rowaddressorig['user_address'],
            "orig_county" => $rowaddressorig['user_county'],
            "orig_postcode" => $rowaddressorig['user_postcode_F'].' '.$rowaddressorig['user_postcode_R'],
            "div_first_name" => $rowrecvdiv['user_first_name'],
            "div_last_name" => $rowrecvdiv['user_last_name'],
            "div_phone" => $rowrecvdiv['user_mobile'],
            "div_receiver" => $rowaddressdiv['user_address'],
            "div_county" => $rowaddressdiv['user_county'],
            "div_postcode" => $rowaddressdiv['user_postcode_F'].' '.$rowaddressdiv['user_postcode_R'],
        );

        echo "This is the return array <br>";
        print_r($returnarr);


        return $returnarr;
    }
}