<?php
session_start();
if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Customer Home</title>
<?php       
include 'db_connect.php';
$cname=$_POST['username'];
 $cust1=$_SESSION['username'];
$result = mysql_query("Select * from customer where custid='$cust1'",$link) or die("Database Error");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body 
{	
background-color: #eeeeee;    
SCROLLBAR-ARROW-COLOR:#666699; 
SCROLLBAR-BASE-COLOR: #3958A6;
}

.man_auth 
th
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
width :10%;   
border:1px solid;   
border-top-color:#7699Cc;  
border-left-color:#7699Cc;   
border-right-color:#7699Cd;  
 border-bottom-color:#7699Cc;  
 filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc'); 
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
<STRONG><FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>
<?
$cust1=$_SESSION['username'];
$cust=mysql_query("select first_name,last_name from customer where custid='$cust1'");
while($res=mysql_fetch_array($cust))
{
$name=$res[0];
$lname=$res[1];
}
print "<center>".$name." ".$lname." ONLINE </center>";

?>
</FONT></STRONG>
</TD>    
</TR>    

<TR>      
<TD width=738 background="images/top_2.gif"  height=9><div align="justify">
 
<STRONG><B>
 
<font size="2"><font color="#7699CC">
<?
echo "<a href='money_tran.php?custid=$cname'>";
?>

</font><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#7699CC size=2>Money Transfer </FONT></font>
<font color="#7699CC"></a>
<?
echo "<a href='mini_st_data_cust.php?custid=$cname'>";
?>

</font>

<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#7699CC size=2>| Generate Mini Statement </FONT>
</B></STRONG><font color="#7699CC"></font>  
  
</font>  
  
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>
<STRONG><a href="loan2.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#7699CC size=2>| Loan</FONT><font color="#7699CC">
</B></font></a></STRONG> 
<STRONG><a href="complaint_customer.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#7699CC size=2>| Complaint</FONT><font color="#7699CC">
</B></font></a></STRONG></font> 

<STRONG><a href="inbox_cust.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#7699CC size=2>| Inbox</FONT><font color="#7699CC">
</B></font></a></STRONG><font color="#7699CC"></font> 
</font>
<TR>     
<TD width=1288 background="images/top.gif"  height=10><a href="logout.php" ><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" 
color=#5368A6 size=2><center>Log Out</center> </FONT></STRONG></TD>
</TR>      

<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>     
<p>&nbsp;</p>       
<div align="center">         
<p>&nbsp;</p>         

<table width="75%" border="0" cellpadding="2" cellspacing="1" class="man_auth">           
<tr>             
<th width="50"><span class="style6">Customer Id </span></th>             
<th width="60"><span class="style6">First Name</span></th>             
<th width="60"><span class="style6">Last Name </span></th>             
<th width="10"><span class="style6">Email </span></th> 
<th width="5"><span class="style6">Sex </span></th> 
<th width="50"><span class="style6">Account Number </span>
</th> <th width="50"><span class="style6">Balance </span></th>          
</tr>           
<tr>

<?php 	              
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
?>
</a></div></td>             
<td><div align="left">            

<?php 
echo $row['custid'];
?>

</a></div></td><td><div align="left">
<?php 
echo $row['first_name'];
?>
</div></td>             
<td>

<?php 
echo $row['last_name'];
?>

</a></div></td>             
<td><div align="left">

<?php 
echo $row['email'];
?>

</a></div></td>             
<td><div align="left">

<?php 
echo $row['sex'];
?>

</a></div></td>             
<td><div align="left">

<?php 
echo $row['acc_number'];
?>

</a></div></td>             
<td><div align="left">

<?php 
echo $row['balance'];
?>
</td>          
</tr>           

<?php 
}
?>      
  
 </table>        
 <p>&nbsp;</p>         
<p>&nbsp;</p>        
<p></p>       
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