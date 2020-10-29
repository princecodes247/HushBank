<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Transactions</title>
<?php       
include 'db_connect.php';
$dates=getdate();
$curdate= $dates[year]."-".$dates[mon]."-".$dates[mday];////print $curdate;


if(isset($_POST['Submit'])) ///forsubmit data           
{
$curdate=$_POST['date'];
}       

$result = mysql_query("Select * from transactions where date = \"$curdate\"",$link) or die("Database Error");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body 
{	
background-color=#eeeeee;    
SCROLLBAR-ARROW-COLOR:#666699; SCROLLBAR-BASE-COLOR: #3958A6;
}

.man_auth th
{
background-color:#5368a6;
color: #000000;
}

.man_auth 
td
{
background-color: #7699Cc; 
}

.man_auth
{ 	
background-color: #9DACDF;	
border-top-color: #000033;	
border-top-width: 1px;	
border-right-width: 1px;	
border-bottom-width: 1px;	
border-left-width: 1px;	
border-top-style: double;	
border-right-style: double;	
border-bottom-style: double;	
border-left-style: double;	
border-right-color: #000033;	
border-bottom-color: #000033;	
border-left-color: #000033;	
height: auto;	
width: 80%;	
margin-top: 1px;	
margin-right: 1px;	
margin-bottom: 1px;	
margin-left: 1px;	
padding-top: 1px;	
padding-right: 1px;	
padding-bottom: 1px;	
padding-left: 1px;	
text-indent: 2px;	
font-family: Verdana, Arial, Helvetica, sans-serif;	font-size: 12px;
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

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #d6dbde
}

.style2 
{
font-family: "Courier New", Courier, mono
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

.style6 
{
color: #FFFFFF
}
</style>
</head>
<body>       

<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0 >  
<TBODY>    
<tr >    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
//<?
//$modes=$_GET['mode'];
//if($modes=='admin')
//{
//print "<a href='admin_data.php'>";
//}
//else 
//if($modes=='teller')
//{
//print "<a href='teller_data.php'>";
//}
//else
//{
//print "<a href='cust_data.php'>";
//}
//?>
<a href="teller_data.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT></a>
</STRONG>
</TD>    
</TR>   
<TR>      
<TD width=738 background="images/top_2.gif"  height=9>
<div align="justify">
<?php
$modes=$_GET['mode'];
if($modes=='admin')
{
print "<a href='tran_do_teller.php?mode=admin'>";
}
else if($modes=='teller')
{
print "<a href='tran_do_teller.php?mode=teller'>";
}
else
{
print "<a href='tran_do_teller.php?mode=cust'>";
}
?>
<font size="2">
<STRONG>
<B>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff>Do Transaction
<FONT color=#ffffff>
</FONT>
</B>
</STRONG>
</a>    
</TR>    














<TR >

<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 height=190 width=150 background="images/3_1.jpg">      
<DIV align=right>                       
<form name="Form1" method="post" action="">          
<p>&nbsp;</p>          
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> 
<font face="Verdana, Arial, Helvetica, sans-serif" >
<font color="#0000FF">
<b></b>
</font></font>
</div>
</td>       
</tr>          
</table>       

<TABLE width="30%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt" >            
<TBODY >
<TR>               
<TD class=sectionhead align=middle colSpan=2>
<div align="center" class="style2"><B>Date(yyyy-mm-dd)</B></div>
</TD>                

<TD class=secondalt align=center>
<?php
print "<input name=\"date\" value=$curdate size=20>";
?>

</TD  >            
</TR>
</tbody>
</table>    
<div align="center">            
<p>              
<input name="Submit" type="submit" class="admin_add_items" value="Fetch">
</p>          
</div>       
<DIV align="center">                
<p>&nbsp;</p>       
<div align="center">                 
<table width="75%" border="0" cellpadding="2" cellspacing="1" class="man_auth" >           
<tr>             
<th width="50">
<span class="style6">Transaction Id </span>
</th>             
<th width="60"><span class="style6">Transaction Type</span></th>             
<th width="60"><span class="style6">Transaction Method </span></th>             
<th width="10"><span class="style6">Date </span></th> 
<th width="5"><span class="style6">Cheque number </span></th> 
<th width="50"><span class="style6">Account Number </span></th> 
<th width="50"><span class="style6">Amount </span></th> 
<th width="50"><span class="style6">Remarks </span></th>           
</tr>           

<tr>
<?php 	              
while($row = mysql_fetch_array($result, MYSQL_BOTH)){?></a></div>
</td>             
<td>
<div align="left">             
<?php 
echo $row[0];
?>
</a></div></td>             
<td><div align="left">
<?php 
echo $row[1];
?>
</div>
</td>             
<td>
<?php 
echo $row[2];
?>
</a>
</div>
</td>             
<td>
<div align="left">
<?php 
echo $row[3];
?>
</a>
</div>
</td>             
<td>
<div align="left">
<?php 
echo $row[4];
?></a>
</div>
</td>             
<td>
<div align="left">
<?php 
echo $row[5];
?>
</a>
</div>
</td>             
<td>
<div align="left">
<?php 
echo $row[6];
?>
</a>
</div>
</td>             
<td>
<div align="left">
<?php 
echo $row[8];
?></td>           
</tr>           
<?php 
}
?>         
</table>         
<p>&nbsp;</p>         
<p>&nbsp;</p>        <p>          
         
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./teller_data.php')" value="Cancel" ></div> </p>      
 </p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>      
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