<?php
session_start();


if(isset($_SESSION['username']))
{
?>
<?php
include 'db_connect.php'; 

$cust1=$_SESSION['username'];
$loanid1=mysql_query("select * from loan_accept where cust_id=$cust1");



$loanid2=mysql_query("select count(*) from loan_accept where cust_id=$cust1");
while($loanid3 = mysql_fetch_array($loanid2,MYSQL_BOTH))
{
$find=$loanid3[1];
}

if($find=='0')
{
echo "Loan is not find";
}








if(isset($_POST['submit'])) ///forsubmit data           
{

$s=mysql_query("select MAx(status) from loan_paid where cust_id='$cust1'");
while($aa = mysql_fetch_array($s, MYSQL_BOTH))
{
$m=$aa[0];
}

$del=mysql_query("select * from loan_paid where cust_id='$cust1' and status='$m' and balance=0",$link) or die("Database Error");
while($fini = mysql_fetch_array($del, MYSQL_BOTH))
{
$finish=$fini[6];
}

echo $finish;
if($finish=='0')
{
mysql_query("delete from loan_paid where cust_id='$cust1'",$link) or die("Database Error");
mysql_query("UPDATE loan SET status='Finished' where custid=$cust1");
mysql_query("delete from loan_accept where cust_id='$cust1'",$link) or die("Database Error");
echo "Loan has been completed...";

}
else
{




$amt=mysql_query("select amount from loan_accept where cust_id=$cust1");
while($amt1=mysql_fetch_array($amt, MYSQL_BOTH))
{
$amount=$amt1[0];
}

$instamount=0;
$dueamt=mysql_query("select inst_amount from loan_paid where cust_id=$cust1");
while($instamt1=mysql_fetch_array($instamt, MYSQL_BOTH))
{
$instamount=$instamount+$instamt1[0];
}



/*

$stat=mysql_query("select MAx(status) from loan_paid where cust_id=$cust1");
while($a1 = mysql_fetch_array($stat, MYSQL_BOTH))
{
$indate=$a1[0];
}

$indate=mysql_query("select insta_date from loan_paid where cust_id='$_SESSION[username]' and status='$indate'");
while($b = mysql_fetch_array($indate, MYSQL_BOTH))
{
$ind=$b[0];
}
echo $ind;

*/

$inamount=mysql_query("select monthly_inst from loan_accept where cust_id='$_SESSION[username]'");
while($c= mysql_fetch_array($inamount, MYSQL_BOTH))
{
$inamt=$c[0];
}


$stat=mysql_query("select MAx(status) from loan_paid where cust_id=$cust1");
while($a1 = mysql_fetch_array($stat, MYSQL_BOTH))
{
$maxstatus=$a1[0];
}



while($loanid2 = mysql_fetch_array($loanid1,MYSQL_BOTH))
{
$loanid=$loanid2[1];
}


$date3=date("Y-m-d");
$monthly1=$_POST[$monthly];
$installamount=$inamt;
$balance=$amount-$instamount;


$valid=mysql_query("select balance from customer where custid='$cust1'");
while($res = mysql_fetch_array($valid, MYSQL_BOTH))
{
$updateamount1=$res[0];
}
$updateamount=$updateamount1-$installamount;

mysql_query("UPDATE customer SET balance='$updateamount' where custid='$cust1'");

mysql_query("update loan_paid set pay_date='".$date3."',due_amount='".$monthly1."',inst_amount='".$installamount."' where cust_id='".$cust1."' AND status='".$maxstatus."' AND loan_id='".$loanid."'");




$d1=mysql_query("select insta_date from loan_paid where status=$status");
while($d2 = mysql_fetch_array($d1,MYSQL_BOTH))
{
$date1=$d2[0];
}









$sta=mysql_query("select MAx(status) from loan_paid where cust_id=$cust1");
while($a = mysql_fetch_array($sta, MYSQL_BOTH))
{
if($a[0] == null)
{
$stat="1";
}
else
{
$stat=$a[0]+1;
}
}








$a1=mysql_query("select balance from loan_paid where cust_id=$cust1 and status='$maxstatus'");
while($a2=mysql_fetch_array($a1, MYSQL_BOTH))
{
$bal=$a2[0];
}

$bal=$bal-$installamount;




$mondate=mktime(0,0,0,date("m"),date("d")+30,date("Y"));
$d=date("Y-m-d",$mondate);

mysql_query("Insert into loan_paid(cust_id,loan_id,balance,insta_date,status) values('$_SESSION[username]','$loanid','$bal','$d','$stat')") or die("Database Error");                 
//mysql_query("UPDATE loan_paid SET insta_date='$d' where cust_id='$cust1' and status='$maxstatus'");
echo "Record is submitted...";	


if($date1>$date3)
{

mysql_query("UPDATE loan_paid SET due_amount='10' where cust_id='$cust1' and status='$maxstatus'");
}


}
}
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

<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
  <TBODY>
 <TR>
<TD width=1288 background="images/top.gif"  height=10><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" size=5><center>Loan Payment</center> </FONT></STRONG></TD>
 </TR>

 <TR>
<TD width=738 background="images/top_2.gif"  height=9><div align="justify"><a href="loan2.php">
	<b><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#000000 size=5>Home</FONT><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#000000 size=2> </FONT>
	<font color="#000000">
</STRONG></font></b></TABLE>




<form action="loan_payment.php" method="post">

<?php 
while($loanid2 = mysql_fetch_array($loanid1,MYSQL_BOTH))
{
$loan1=$loanid2[1];
$type1=$loanid2[2];
}







?>
<table width="454">
<tr><td width="197"><b>loan Id </b> </td>
<td>
<?php echo $loan1; ?></td></tr>

<tr><td width="197"><b>Loan Type</b></td><td><?php echo $type1; ?> </td></tr>
<?php

$max2=mysql_query("select max(status) from loan_paid where cust_id=$cust1");
while($max3=mysql_fetch_array($max2,MYSQL_BOTH))
{
$status=$max3[0];
}


$d1=mysql_query("select insta_date from loan_paid where status=$status");
while($d2 = mysql_fetch_array($d1,MYSQL_BOTH))
{
$date1=$d2[0];
}




?>


<tr><td width="197"><b>Installment Date</b></td><td><?php echo $date1; ?></td></tr>

<?php




$monthly1=mysql_query("select monthly_inst from loan_accept where cust_id=$cust1");
while($monthly2=mysql_fetch_array($monthly1, MYSQL_BOTH))
{
$monthly=$monthly2[0];
}





?>
<tr><td width="197"><b>Amount</b></td><td><?php echo $monthly; ?></td></tr>
</table>
<br>
<br>

<input name="submit" type="submit" class="admin_add_items" value="Send" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
 <input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./loan2.php')" value="Cancel" >
<br> 






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