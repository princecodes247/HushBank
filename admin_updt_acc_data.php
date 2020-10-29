<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Update Account Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body 
{	
background-color: #eeeeee;
}

.firstalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #e7ebef
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #d6dbde
}

.sectionhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #efefef 1px solid; 
FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #ffffff; 
BORDER-BOTTOM: #efefef 1px solid; 
BACKGROUND-COLOR: #858fbf
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #151535; 
BORDER-BOTTOM: #808a98 1px solid; 
LETTER-SPACING: -1px
}	

input.admin_add_items
{  
color:#055;   
font-family:'trebuchet ms',helvetica,sans-serif;   
font-size:84%;   
font-weight:bolder;   
background-color:#fed;    
width :10%;   
border:1px solid;   
border-top-color:#7699Cc;   
border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   
filter:progid:DXImageTransform.Microsoft.Gradient (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}		

.style1 
{	
font-family: "Courier New", Courier, mono;	
font-weight: bold;
}

.style2 
{
font-family: "Courier New", Courier, mono
}

</style>
</head>

<?php       
include 'db_connect.php'; //Connect mysql database	  
$result ="";	    
if(isset($_POST['Submit'])) ///forsubmit data           
{		     		     
$acc_type=ucwords($_POST['acc_type']); 			 
$minbalance=ucwords($_POST['minbal']);	
 $acctype=ucwords($_POST['actype']);
				 			
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($acc_type)))) //Accept characters only			    
{				  
echo "Enter Valid Data for Account Type!";				  
exit(0);				 
}			
else 
{			       
if (!eregi ("^[0-9 ]+$", stripslashes(trim($minbal))))  //Accept characters only				      
{					    
echo "Enter Valid Data for Last Name!";echo "<p>Click <a href='admin_updt_acc_data.php'> here </a> to go back";				        
exit(0);					  					  
}				 			 				 			
else 
{ 
$del=mysql_query("delete from accounts where acc_type='$acc_type'"); 
$result = mysql_query("update accounts set acc_type ='$acc_type',minbalance ='$minbal' where acc_type ='$acctype'");                     
$db_close=mysql_close();            			 
if ($result )			    
{				 
echo "Data Updated Successfully";
echo "<p>Click <a href='admin_updt_acc.php'> here </a> to update another";
exit(0);								 
}			 
else			  
{		
echo "Updation Failure";echo "<p>Click <a href='admin_updt_acc_data.php'> here </a> to go back";
exit(0);			  
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