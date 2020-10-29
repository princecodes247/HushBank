<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Admin Home</title>

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
</head>
<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0 height="160">

 <TR>
<TD width=1288 background="images/top.gif"  height=10><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" size=6><center>EMI</center> </FONT></STRONG></TD>
 </TR>
 <TR>
<TD width=738 background="4.gif"  height=134><div align="justify"><a href="emi.php?mode=admin"><STRONG>
	<FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>EMI </FONT></STRONG>
</TABLE>
<?php
if(isset($_POST['compute'])) 
{
$amount=ucwords($_POST['loan_amount']); 
$interst=ucwords($_POST['interst']);

$payment=ucwords($_POST['payment']);

$int=$amount*$interst/100;
$int1=$int*$payment;

$total=$amount+$int1;

$monthly=$total/$payment;
     

 ?>
 <div align="center">
 <table border="1" width="67%">
		<tr>
			<td width="340"><b>&nbsp;Amount</b></td>
			<td>

<b>

<?php echo " <center> $amount</center><br>";?></b></td>
		</tr>
		<tr>
			<td width="340"><b>&nbsp;Interest  </b></td>
			<td><b>&nbsp; <?php echo " <center>$interst </center><br>"; ?></b></td>
		</tr>
		<tr>
			<td width="340"><b>&nbsp;Payment </b></td>
			<td><b>&nbsp; <?php 
echo" <center>$payment </center><br>"; ?></b></td>
		</tr>
		<tr>
			<td width="340"><b>&nbsp;Total Amount  </b> </td>
			<td><b>&nbsp; <?php echo "<center>$total </center><br>";
 ?></b></td>
		</tr>
		<tr>
			<td width="340"><b>&nbsp;Montly </b></td>
			<td><b>&nbsp; <?php echo"<center>$monthly</center>"; ?></b></td>
		</tr>
	</table>
</div>

<?php
}

?>

</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>