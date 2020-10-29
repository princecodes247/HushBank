<?php
session_start();

if(isset($_SESSION['username']))
{ 
?>

<?php      
include 'db_connect.php';
$cname=$_POST['username'];


if(isset($_GET['del']))
{
$d=$_GET[del];
mysql_query("delete from rejected_information where cust_id='$d'") or die("Database Error");
}

?>





<html>
<head>
<title>Admin Home</title>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">


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

</head>

<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
  <TBODY>
 <TR>
<TD width=1288 background="images/top.gif"  height=10><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" 
color=#0000FF size=4><center><u>Loan Detail</u></center> </FONT></STRONG></TD>
 </TR>
 <TR>


<TD width=738 background="images/top_2.gif"  height=9><div align="justify">
<STRONG><a href="cust_data.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#FF00FF size=4>Home</FONT><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#FF00FF size=2> </FONT></a></STRONG>
</div>
<div align="justify">
<a href="emi.php?mode=admin">
<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff><STRONG>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#800080">EMI 
</font></STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800080 size=2><strong>| </strong></FONT>
</font><font size="2">
<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff><a href="loan.php?mode=admin"><STRONG><B>
<FONT 
color=#800080 face="Verdana, Arial, Helvetica, sans-serif">Loan Request</FONT></B></STRONG></a></font><FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800080> </font>

<STRONG><FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff><a href="loan_detail.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800080>|Loan Detail </FONT></a><a href="loan_paid.php">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#800080>|Loan Paid</FONT></a></font></STRONG></font><FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff><font size="2"><FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800080> </font>

<STRONG>
<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800080>

<?
echo "<a href='loan_payment.php?custid=$cname'>";
?>
|Loan Payment</a></font></STRONG></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#800080">
</font>
</td></tr>





</TABLE>
<br><br><br><br><br><br>














<?php

$result3 = mysql_query("Select * from rejected_information where cust_id=$_SESSION[username] ",$link) or die("Database Error");
while($result4=mysql_fetch_array($result3,MYSQL_BOTH))
{
$dis=$result4[1];
$custid1=$result4[0];
}

if($custid1<>"")
{
echo "<font color=red><h2>".$dis."&#160;&#160;&#160;&#160;  ";
?>
<a href="loan2.php?del=<?php echo $custid1; ?>" >Click here</a> to Ok.</h2></font>
<?php
}
?>

</body>
</html>


<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>