<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Accounts</title>
<?php      
 include 'db_connect.php';       
$result = mysql_query("Select * from loan_type order by loan_amount",$link) or die("Database Error");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body 
{	
background-color: #eeeeee;    
SCROLLBAR-ARROW-COLOR:#666699; SCROLLBAR-BASE-COLOR: #3958A6;
}

.man_auth th
{
background-color:#5368a6;
color: #000000;
}

.man_auth td
{
background-color: #7699Cc;
}

.man_auth
{ 	
background-color: #9DACDF;	
border-top-color: #000033;	
border-top-width: 1px;	border-right-width: 1px;	
border-bottom-width: 1px;	
border-left-width: 1px;	
border-top-style: double;	border-right-style: double;	
border-bottom-style: double;	
border-left-style: double;	
border-right-color: #000033;	border-bottom-color: #000033;	
border-left-color: #000033;	
height: auto;	
width: 80%;	
margin-top: 1px;	margin-right: 1px;	
margin-bottom: 1px;	
margin-left: 1px;	
padding-top: 1px;	
padding-right: 1px;	
padding-bottom: 1px;	padding-left: 1px;	
text-indent: 2px;	
font-family: Verdana, Arial, Helvetica, sans-serif;	
font-size: 12px;
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

.style6 
{
color: #FFFFFF
}
</style>
</head>

<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<TR>      
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif"  color=#ffffff size=2>Home </FONT>
</STRONG></TD>    
</TR>  
  
<TR>      
<TD width=738 background="images/top_2.gif"  height=9>
<div align="justify"><STRONG><a href="admin_add_loan.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif"  color=#ffffff size=2>Add New Loan Type 
</FONT></STRONG>
<FONT  face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2><strong>| </strong></FONT>
<a href="admin_updt_loan.php">
<font size="2">
<STRONG><B>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff>
<FONT       color=#ffffff>Update Loant Details</FONT>
</FONT></B></STRONG></font></a><font size="2">
<STRONG><B><a href="admin_del_loan.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff> </FONT>
<FONT  face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Delete loan Details </FONT>
</B></STRONG></font>    
</TR>    
<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>                
<p>&nbsp;</p>       
<div align="center">         
<p>&nbsp;</p> <p>&nbsp;</p>       
 <table width="75%" border="0" cellpadding="2" cellspacing="1" class="man_auth">           
<tr>             
<th width="90">
<span class="style6">Loan Type </span></th>     
<th width="120"> <span class="style6">Loan Duration </span></th>             
<th width="120"><span class="style6">Loan Amount</span>
</th>                        
</tr>    
       
<tr>
<?php 	             
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
?>
</a>
</div>
</td>             

<td><div align="left">    
<?php 
echo $row[0];
?>
</a>
</div>
</td>   

<td><div align="left">    
<?php 
echo $row[1];
?>
</a>
</div>
</td>          
   
<td>
<div align="left">
<?php 
echo $row[2];
?>
</div>
</td>             
</td>           
</tr>           

<?php 
}
?>         
</table action="">  
<br><br>
<form>
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./loan3.php?mode=admin')" value="<< Back" >
</form>
<p>&nbsp;</p>       
<p>&nbsp;</p>         <p>&nbsp;</p>        
<p> </p>             
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        <p>&nbsp;</p>      
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