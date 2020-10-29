
<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Create Users</title>

<?php 
include 'db_connect.php';

 $result = mysql_query("Select * from customer order by custid",$link) or die("Database Error");


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

<!--

body {
background-color: #eeeeee;
 SCROLLBAR-ARROW-COLOR:#666699; SCROLLBAR-BASE-COLOR: #3958A6;
}
.man_auth th{
background-color:#5368a6;
color: #000000;

}
.man_auth td{
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
filter:progid:DXImageTransform.Microsoft.Gradient
(GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');
  }
.style6 {color: #FFFFFF}
</style>

</head><body >
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
&nbsp;</TD>

</TR>  
 <TR>
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>
<DIV align=right>  
  <table border="1" width="176%" id="table1">
	<tr>
		<td colspan="3">
		<p align="center">
<a href='admin_data.php?mode=admin'>
<STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" size=5>Home</FONT><FONT face="Verdana, Arial, Helvetica, sans-serif" size=2> </FONT>
</STRONG>
		</td>
	</tr>
	<tr>
		<td align="center">
<STRONG>
<a href='add_data.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Create 
		Customer </FONT>
</STRONG></td>
		<td align="center">
<STRONG>
<a href='update_cust.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Update 
		Customer</FONT></STRONG></td>
		<td align="center">
<STRONG>
<a href='admin_cust_del.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>&nbsp;Delete 
		Customer</FONT><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2> </FONT>
</STRONG>
		</td>
	</tr>
	</table>
 <div align="center">
<p>&nbsp;</p>


 <table width="91%" border="0" cellpadding="2" cellspacing="1" class="man_auth">
<tr>
 <th width="152"><span class="style6">Customer Id </span></th>
 <th width="82"><span class="style6">First Name</span></th>
 <th width="38"><span class="style6">Last Name </span></th>
 <th width="30"><span class="style6">Sex </span></th>
 <th width="55"><span class="style6">Email </span></th>
<th width="51"><span class="style6">Open date </span></th>
 <th width="116"><span class="style6">Account Number </span></th>
 <th width="206"><span class="style6">Balance </span></th>

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
?></a></div></td>
 <td><div align="left">

<?php echo $row['first_name'];
?></div></td>
 <td><?php echo $row['last_name'];
?></a></div></td>


 <td><div align="left">

<?php echo $row['sex'];
?></a></div></td>
 <td><div align="left">
<?php echo $row['email'];
?></a></div></td>
 <td><div align="left">

<?php echo $row['opendate'];
?></a></div></td>
 <td><div align="left">

<?php echo $row['acc_number'];
?></a></div></td>
 <td><div align="left">
<?php echo $row['balance'];
?>




</td>
</tr>
<?php }?>
</table>
<br><br>
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./admin_data.php')" value="<< Back" ></div> 
</TD></TR>
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