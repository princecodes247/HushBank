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

 $result = mysql_query("Select * from loan where status='pending'",$link) or die("Database Error");

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
<form  action="\loan_accept.php" mode="post">
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
</STRONG>


</TR>  
 <TR>
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>
<DIV align=right>  
  <p>&nbsp;</p>
 <div align="center">
<p>&nbsp;</p>


 <table width="75%" border="0" cellpadding="2" cellspacing="1" class="man_auth">
<tr>
 <th width="50"><span class="style6">Customer Id</span></th>
 <th width="50"><span class="style6">Name </span></th>
 <th width="60"><span class="style6">Loan Type</span></th>
 <th width="60"><span class="style6">Loan Amount</span></th>
 <th width="5"><span class="style6">Duration </span></th>
 <th width="10"><span class="style6">Address</span></th>
<th width="50"><span class="style6">Profession </span></th>
<th width="50"><span class="style6">Income </span></th>
 <th width="50"><span class="style6">Telephone </span></th>
 <th width="50"><span class="style6">Email Id </span></th>
 <th width="50"><span class="style6">Request Date</span></th>
<th width="50" colspan="2"><span class="style6"> </span></th>
</tr>

<?php
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
?>
<tr>
<td><div align="left">
<?php 
echo $row['custid'];
?>
</div>
</td>

 <td><div align="left">
<?php echo $row['name'];
?>
</div></td>
 
<td><div align="left">
<?php echo $row['loan_type'];
?></div></td>


 <td><div align="left">
<?php echo $row['loan_amount'];
?></div></td>

 <td><div align="left">
<?php echo $row['duration'];
?></div></td>

 <td><div align="left">
<?php echo $row['address'];
?></div></td>

 <td><div align="left">
<?php echo $row['profession'];
?></div></td>

 <td><div align="left">
<?php echo $row['income'];
?></div></td>

<td>
<div align="left">
<?php 
echo $row['tele'];
?></div></td>

 <td><div align="left">
<?php 
echo $row['email'];
?>
</div></td>

<td><div align="left">
<?php 
echo $row['requestdate'];
?>
</div></td>

 <td><div align="center">
<a href="loan_accept.php?accept=<?php echo $row['custid']; ?>" >Accept</a>

<?php
/*
<input type="button" name=<?php echo $row['custid']; ?>  value="Accept" onClick="location.replace('loan_accept.php')"></div>
*/
?>
</td>

<td>
<?php
/*
<input type="button" name="reject" value="Reject"></div>
</div>
*/
?>
<a href="loan_accept.php?reject=<?php echo $row['custid']; ?>" >Reject</a>
</td>
<?php
}
?>
</tr>
</table>
<br><br>
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./admin_data.php')" value="<< Back" ></div> 
</TD></TR>
</TBODY>
</TABLE>
</form>
</body>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>