<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Search</title>
<?php       
include 'db_connect.php'; //Connect mysql database	  
$result ="";$result = mysql_query("select custid from customer order by custid");
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
font-family: Verdana;	
font-size: 14px;	
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
font-family:'trebuchet ms',helvetica,sans-serif;   font-size:84%;   
font-weight:bolder;   
background-color:#fed;    
width :13%;   
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
<STRONG><a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif">Home</FONT></a><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#0000FF> |</FONT></STRONG><font color="#0000FF">
</font>
<STRONG><a href='loan_type.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif">Loan Type </FONT></a>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#0000FF>|</font><a href='loan_request.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif">Loan Request </FONT>
</a>
<FONT face="Verdana, Arial, Helvetica, sans-serif"><a href='loan_detail_admin.php'>
|Loan Detail</a></FONT><font color="#0000FF"> </font></STRONG>
</TD>    

</TR>     
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