<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?PHP  
                        
include 'db_connect.php'; //connection to MYSQL database
						
                        /////posting variables here /////
					    
$edit_f_name=$_POST['user_f_name']; //posting variables
$edit_l_name=$_POST['last_name'];
$edit_email=$_POST['email'];
$edit_country=$_POST['country'];
$edit_age=$_POST['country2'];
$edit_rate=$_POST['country22'];
$comments=$_POST['comments'];
					
						$update_user_index=$_POST['hdd_user_index']; //hidden variable for user index
						
						 
if(!eregi ("^[a-zA-Z ]+$", stripslashes(trim($edit_f_name)))) //Accept characters only from php manual
{ 			     			  
echo "Enter Valid Data for First Name ";
}   
else
{  
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($edit_l_name)))) //Accept characters only from php manual
{ 
echo "Enter Valid Data for Last  Name ";
} 
else
{
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($edit_country)))) //Accept characters only from php manual
{
echo "Enter Valid Data for Country ";
}
else
{    // check an email address is possibly valid http://www.buildwebsite4u.com/advanced/php.shtml
if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$edit_email)) 
{
echo "Enter Valid Email Address";
}
else 
{  
if(!eregi ("^[0-9]+$", stripslashes(trim($edit_age)))) //Accept numeric  only from php manual
{
echo "Enter Valid data for Age"; 
}
else 
{  
if(!eregi ("^[0-9]+$", stripslashes(trim($edit_rate)))) //Accept numeric  only from php manual
{
echo "Enter Valid data for Rating"; 
}
else
{    
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($comments)))) 
{
echo "Enter Valid data for Comments"; 
}
else
{ 
$result = mysql_query("Update users set u_first_name='$edit_f_name' ,u_last_name='$edit_l_name' ,u_email='$edit_email' ,u_country='$edit_country' ,u_age='$edit_age' ,u_rate='$edit_rate' ,u_comments='$comments' where user_index='$update_user_index'" );

if ($result)
{
echo "User Details Have Been Updated Successfully !";
}
else
{
echo "User Details Have Been NOT Updated Successfully !";
}	
} 
}   
}
}
}	
} 
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="index.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center">
    <input name="Back" type="reset" id="Back" value="Back" onClick="history.back()">
    <input type="submit" name="Submit2" value="Submit">
  </p>
</form>
</body>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>