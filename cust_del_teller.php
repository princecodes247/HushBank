<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Delete Customer Details</title>
<?php       
include 'db_connect.php'; //Connect mysql database	  
$result ="";$result = mysql_query("select custid from customer order by custid");
if(isset($_POST['Submit'])) ///forsubmit data           
{
$custid=$_POST['custid'];
$delres=mysql_query("delete from customer where custid=\"$custid\"");
if($delres==1)
{
echo "Customer Deleted Successfully";
echo "<p>Click <a href='cust_del_teller.php'> here </a> to delete another";
exit(0);
}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body 
{	
background-color: #eeeeee;    
SCROLLBAR-ARROW-COLupdate_custOR:#666699; 
SCROLLBAR-BASE-COLOR: #3958A6;
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

.style15 
{	
font-family: Verdana;	font-size: 14px;	
color: #0033CC;
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

.style16 
{	
font-size: 14px;	
font-weight: bold;
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
filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}		
</style>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>   

<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='teller_data.php'><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
</STRONG>
<STRONG>
<a href='add_data_teller.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Create Customer </FONT>
</STRONG>
<STRONG>
<a href='update_cust_teller.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Update Customer </FONT>
</STRONG>


<STRONG>
<a href='cust_del_teller.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#aaeeff size=2>| Delete Customer </FONT>
</STRONG>
</TD>    
</TR>       

<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right> 
 <form name="Form1" method="post" action="">          
<p>&nbsp;</p>          
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> 
<font face="Verdana, Arial, Helvetica, sans-serif" >
<font color="#0000FF"><b>
<?php 
if ($result ) 
{ 
echo $msg;
}
?>
</b></font></font></div>
</td>            
</tr>          
</table>                

 <TABLE width="65%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">            
<TBODY>              
<TR>                
<TD class=sectionhead align=middle colSpan=2><div align="center">Select the Customer ID to be deleted !</div>
</TD>              
</TR>      
       
<TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Customer Id :</div>
</TD>                

<TD width="59%" align=left class=firstalt>
<select name="custid"  id="username2"   tabindex="1">
<?php  
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
print "<option>$row[0]</option>";
}
print "</select>";
?>                
</TD>             
 </TR>                                                                      
</TBODY>          
</TABLE>          
<div align="center">            
<p>              
<input name="Submit" type="submit" class="admin_add_items" value="Delete">&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./customer_accounts_teller.php')" value="Cancel" ></div> </p>   
</form>           
</DIV>
</TD>    
</TR>  
</TBODY>
</TABLE>
</body>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>