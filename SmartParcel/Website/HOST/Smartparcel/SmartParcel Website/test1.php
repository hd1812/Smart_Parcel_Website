<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=55&amp;mobileUI.openerWidth=75&amp;mobileUI.openerText=&lt;"></script>
<script type="text/javascript"> 
		function check_pswd(x){
			if(document.getElementById(x).value!= document.getElementById("user_pswd").value)  
    		{  
       		 alert("Password not match");  
			 document.getElementById(x).value="";	
			 document.getElementById("user_pswd").value="";		 
    		}
		} 
		function check_email(x){		
			var emailStr=document.getElementById(x).value;
			var emailPat=/^(.+)@(.+)$/;
			var matchArray=emailStr.match(emailPat);
			if(matchArray==null){
			alert("Invalid Email Address");
			document.getElementById(x).value="";	
			}
			if(emailStr==('')||emailStr==NULL||emailStr==0){
			alert("Email cannot be empty")
			}
		} 
		function onlyNum(){
			if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))  
			event.returnvalue=false; 
			/^\(\d{3}\)\s*\d{3}(?:-|\s*)\d{4}$/
		} 
		function check_name(x){
			var name=document.getElementById(x).value;
			if(name==('')||name==NULL||name==""){
			alert('Name cannot be empty');
			}			
		}
		function check_form(){
			var form = document.thisForm;
			if(document.getElementById(user_first_name).value="";){
			alert('Name cannot be empty!');
			form.user_first_name.select();
			}
		}
		
		</script>
<body>
</body>
</html>
