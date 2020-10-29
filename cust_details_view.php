<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Customer Details</title>

<?php 	     
include 'db_connect.php'; 	  
$result ="";
$customerid=$_GET['custid'];
$result= mysql_query("select * from customer where custid='$customerid'");	    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
width :10%;   border:1px solid;   
border-top-color:#7699Cc;   
border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
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

<body>

<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>

<?php
print "<a href='cust_data.php?custid=$customerid'>";
?>

<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
</STRONG>
</TD>    
</TR>       

<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>                       
<form name="Form1" method="post" action="updt_delet_data.php" onSubmit="return Blank_TextField_Validator()">          <p>&nbsp;</p>          
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> <font face="Verdana, Arial, Helvetica, sans-serif" >
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
<TD class=sectionhead align=middle colSpan=2>
<div align="center">Your Details  !</div>
</TD>              
</TR>              

<TR>                
<TD class=firstalt align=middle width="41%">
<div align="left" class="style1">Customer Id :</div>
</TD>

<?php  
while($row = mysql_fetch_array($result,MYSQL_BOTH))
{
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[0]</TD>";
print " </TR><TR><TD class=secondalt align=middle><div align=\"left\"";
print " class=\"style2\"><B>First Name :</B><BR></div></TD>";
print " <TD width=\"59%\"align=left class=firstalt>"; 
print " $row[1]</TD></TR><TR>";
print "<TD class=firstalt align=middle width=\"41%\"><div align=\"left\"";
print " class=\"style1\">Last Name :</div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[2] </TD>";
print " </TR><TR><TD class=secondalt align=middle><div align=\"left\""; 
print " class=\"style2\"><B>Address</B><BR></div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[3] </TD></TR><TR>";print "<TD class=firstalt align=middle><div align=\"left\"";
print " class=\"style2\">";
print " <B>E- mail :</B></div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[4] </TD></TR><TR>";
print "<TD class=secondalt align=middle><div align=\"left\"";print " class=\"style2\">";
print "<B>Sex :</B><BR></div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[5] </TD></TR><TR>";
print "<TD class=firstalt align=middle><div align=\"left\""; print " class=\"style2\"><B>Contact Number :</B></div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[6] </TD><TR>";
print "<TD class=firstalt align=middle width=\"41%\"><div align=\"left\""; print " class=\"style1\">Account Number :</div></TD>";
print "<TD width=\"59%\"align=left class=firstalt>"; 
print " $row[7] </TD>";
}
?>              
</TR>                                        
</TBODY>          
</TABLE>                    
</div>        
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