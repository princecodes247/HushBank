<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<!DOCTYPEHTMLPUBLIC"-//W3C//DTDHTML4.01Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Update Customer Details...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body
{	
background-color:#eeeeee;
}

.firstalt
{
BORDER-RIGHT:#808a981pxsolid;
BORDER-TOP:#e5e5e51pxsolid;
BORDER-LEFT:#e5e5e51pxsolid;
COLOR:#000000;
BORDER-BOTTOM:#808a981pxsolid;
BACKGROUND-COLOR:#e7ebef
}

.secondalt
{
BORDER-RIGHT:#808a981pxsolid;
BORDER-TOP:#e5e5e51pxsolid;
BORDER-LEFT:#e5e5e51pxsolid;
COLOR:#000000;
BORDER-BOTTOM:#808a981pxsolid;
BACKGROUND-COLOR:#d6dbde
}

.sectionhead
{
BORDER-RIGHT:#808a981pxsolid;
BORDER-TOP:#efefef1pxsolid;
FONT-WEIGHT:bold;
BORDER-LEFT:#e5e5e51pxsolid;
COLOR:#ffffff;
BORDER-BOTTOM:#efefef1pxsolid;
BACKGROUND-COLOR:#858fbf
}

.tblhead
{
BORDER-RIGHT:#808a981pxsolid;
BORDER-TOP:#e5e5e51pxsolid;
FONT-WEIGHT:bold;
BORDER-LEFT:#e5e5e51pxsolid;
COLOR:#151535;
BORDER-BOTTOM:#808a981pxsolid;
LETTER-SPACING:-1px
}	

input.admin_add_items
{
color:#055;
font-family:'trebuchetms',helvetica,sans-serif;
font-size:84%;
font-weight:bolder;
background-color:#fed;
width:10%;border:1pxsolid;
border-top-color:#7699Cc;
border-left-color:#7699Cc;
border-right-color:#7699Cd;
border-bottom-color:#7699Cc;
filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');
}		

.style1
{	
font-family:"CourierNew",Courier,mono;	
font-weight:bold;
}

.style2
{
font-family:"CourierNew",Courier,mono
}

</style>
</head>

<?php
include 'db_connect.php'; //Connectmysqldatabase	
$result="";	
if(isset($_POST['Submit']))///forsubmitdata
{		
$custid=ucwords($_POST['custid']);			
$first_name=ucwords($_POST['first_name']);
$last_name=ucwords($_POST['last_name']);
$address=ucwords($_POST['address']);			
$email=$_POST['email'];			
$sex=ucwords($_POST['sex']);			
$contact_number=ucwords($_POST['contact_number']);			
$acc_number=ucwords($_POST['acc_number']);									//checkanemailaddressispossiblyvalidhttp://www.zend.com/zend/spotlight/ev12apr.php

if(!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email))//validatingemail		
{			
echo"Invalid Email Address!";				
exit(0);			
}
			
else
{									
if(!eregi("^[a-zA-Z]+$",stripslashes(trim($first_name))))//Acceptcharactersonly			
{				
echo"Enter Valid Data For FirstName!";				
exit(0);				
}			
else
{			
if(!eregi("^[a-zA-Z]+$",stripslashes(trim($last_name))))//Acceptcharactersonly				
{					
echo"Enter Valid Data For LastName!";				
exit(0);										
}											
else						
{
if(!eregi("^[0-9]+$",stripslashes(trim($contact_number))))//AcceptNumericonly				
{					
echo"Enter Valid Data For Contact Number!";				
exit(0);										
}													
else
{
$bal=mysql_query("select balance from customer where custid=".$custid);

while($row=mysql_fetch_array($bal,MYSQL_BOTH))
{
$balance=$row[0];
}

$result=mysql_query("update customer set first_name='".$first_name."',last_name='".$last_name."',address='".$address."',email='".$email."',sex='".$sex."',contact_number='".$contact_number."',acc_number='".$acc_number."',balance='".$balance."'  WHERE custid='". $custid . "'");
 	 		

if($result)			
{				
$dmode=$_GET['mode'];	
echo"Data Updated Successfully...";
echo"<p>Click<a href='update_cust.php?mode=$dmode'>here</a>To Update Another...";
exit(0);				
echo"AddedToTheDatabase";				
}			
else			
{	
echo"Data Updation Failed...";			
echo"<p>Click <a href='updt_delet.php?mode=$dmode'>here</a>To Update Another...";
exit(0);			
}									
}				
}						
}	
}		
}
?>

<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>