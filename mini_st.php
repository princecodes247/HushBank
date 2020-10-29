<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Mini Statement</title>

<?php       
include 'db_connect.php'; //Connect mysql database	  
$result ="";
$result = mysql_query("select acc_number from customer");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">

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
{  color:#055;   
font-family:'trebuchet ms',helvetica,sans-serif;   
font-size:84%;   
font-weight:bolder;   
background-color:#fed;    
width :12%;   
border:1px solid;   
border-top-color:#7699Cc;   
border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   
filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}		

</style>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>   
<tr>    
<TD width=1288 background="images/top.gif" height=10>
<STRONG>
<?php 
$modes=$_GET['mode'];
if($modes=='admin')
{
print "<a href='admin_data.php'>";
}
else if($modes=='teller')
{
print "<a href='teller_data.php'>";
}
else
{
print "<a href='cust_data.php'>";
}
?><u><font color="#0000FF" size="4"> </font>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#0000FF size=4>Home </FONT>
</u>
</STRONG>
</TD>    
</TR>       
<TR><TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>                        
<?php
if($modes=='admin')
{
echo "<form name=\"Form1\" method=\"post\" action=\"mini_st_data.php?mode=admin\">";
}
else 
if($modes=='teller')
{
echo "<form name=\"Form1\" method=\"post\" action=\"mini_st_data.php?mode=teller\">";
}
else
{
echo "<form name=\"Form1\" method=\"post\" action=\"mini_st_data.php?mode=cust\">";
}
?>          
<p>&nbsp;</p>          
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> <font face="Verdana, Arial, Helvetica, sans-serif" >
<font color="#0000FF"><b><?php if ($result ) 
{ 
echo $msg;
}
?>
</b>
</font></font></div>
</td>            
</tr>          
</table>                 
<TABLE width="65%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">         
<TBODY>              <TR>                
<TD class=sectionhead align=middle colSpan=2>
<div align="center">Select the account number to generate mini statement !</div></TD>              
</TR>              

<TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Account Number :</div>
</TD>                

<TD width="59%" align=left class=firstalt>
<select name="acc"  id="username2"   tabindex="1">
<?php   
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
print "<option>$row[0]</option>";
}
print "</select>";
?>                </TD>              
</TR>                                                                      
</TBODY>          
</TABLE>          
<div align="center">            
<p><input name="Submit" type="submit" class="admin_add_items" value="Mini Statement">&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./admin_data.php')" value="Cancel" ></div> </p>        
</form>           
</DIV>
</TD>    
</TR>  </TBODY>
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