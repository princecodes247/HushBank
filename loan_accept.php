<?php
session_start();

if(isset($_SESSION['username']))
{

include 'db_connect.php'; 
if(isset($_GET['accept']))
{

$result2=mysql_query("select * from loan where custid=$_GET[accept]");

$date=date('d-m-Y');


include 'db_connect.php'; 



if(isset($_POST['Submit']))
{	
$customerid=$_POST['custid'];
$loan_id=$_POST['loan_id'];
$type=$_POST['type'];
$amount=$_POST['amount'];
$duration=$_POST['duration'];
$date1=date("Y-m-d");
$minst=$_POST['minst'];



$info="Your Loan can be Sanctioned...";
mysql_query("insert into rejected_information values('".$customerid."','".$info."')") or die("Database Error");

$valid=mysql_query("select balance from customer where custid=$customerid") or die("Database Error");
while($res = mysql_fetch_array($valid, MYSQL_BOTH))
{
$updateamount1=$res[0];
}
$updateamount=$updateamount1+$amount;


mysql_query("UPDATE customer SET balance='$updateamount' where custid='$customerid'");
mysql_query("insert into loan_accept values('".$customerid."','".$loan_id."','".$type."','".$amount."','".$duration."','".$date1."','".$minst."')") or die("Database Error");


$mondate=mktime(0,0,0,date("m"),date("d")+30,date("Y"));
$d=date("Y-m-d",$mondate);


mysql_query("insert into loan_paid(cust_id,loan_id,insta_date,balance,status) values('".$customerid."','".$loan_id."','".$date1."','".$amount."','1')"); 
mysql_query("UPDATE loan_paid SET  insta_date='$d' where cust_id='$customerid'");
mysql_query("UPDATE loan SET status='Accept' where custid=$customerid ");



echo $customerid." Loan can be sanctioned...";
echo "<br><br>Please <a href=loan_request.php>click here </a> to Back";
exit(0);
}
?>

<html>

<html>
<head>
<title>Update Customer Details</title>
<?php       
include 'db_connect.php'; //Connect mysql database	  
$result ="";
$customerid=$HTTP_POST_VARS["custid"];
$result= mysql_query("select * from customer ");	   
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
font-family:'trebuchet ms',helvetica,sans-serif;   font-size:84%;   
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


<body>
<form action="" method="post">

<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>
<tr>

<TD width=1288 background="images/top.gif"  height=10><STRONG><a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </a></FONT>
</STRONG><td></tr>
<table>
<?php

$tran=mysql_query("select max(loan_id) from loan_accept");
while($a = mysql_fetch_array($tran, MYSQL_BOTH))
{
if($a[0] == null)
{
$maxaccnum="20000";
}
else
{
$maxaccnum=$a[0]+1;
}
}






while($result1=mysql_fetch_array($result2,MYSQL_BOTH))
{
print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Loan id:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=loan_id type=\"text\"";
print " value=$maxaccnum tabindex=\"1\"></TD></TR>";

print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Customer id:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=custid type=\"text\"";
print " value=$result1[0] tabindex=\"1\"></TD></TR>";

print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Loan type:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=type type=\"text\"";
print " value=$result1[1] tabindex=\"1\"></TD></TR>";


print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Amount:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=amount type=\"text\"";
print " value=$result1[2] tabindex=\"1\"></TD></TR>";

print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Duration:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=duration type=\"text\"";
print " value=$result1[3] tabindex=\"1\"></TD></TR>";

print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Start Date:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print "  type=\"text\"";
print " value=$date tabindex=\"1\"></TD></TR>";


$monthly=$result1[2]/$result1[3];

print " <TR><TD  align=middle><div align=\"left\"";
print " class=\"style2\"><B>Monthly Instalment:</B><BR></div></TD>";
print " <TD width=\"59%\"align=left ><input"; 
print " name=minst type=\"text\"";
print " value=$monthly tabindex=\"1\"></TD></TR>";

print " <TR><TD colspan=\"2\"><input name=Submit type=submit value=submit>";
print " <input type=submit name=cancel value=cancel onClick=location.replace('./loan_request.php')></td></tr>";

}

?>
</table>
</TBODY>
</TABLE>
</form>
</body>
</html>
<?php
}
else
{ 
$customerid=$_GET[reject];
$info="Your Loan cannot be Sanctioned...";
mysql_query("insert into rejected_information values('".$customerid."','".$info."')") or die("Database Error");
mysql_query("UPDATE loan SET status='Reject' where custid=$customerid ");
echo $customerid." Loan cannot be sanctioned...";
echo "<br><br>Please <a href=loan_request.php>click here </a> to Back";
exit(0);
}
}
else
{
echo "Please click here to " . "<a href=index.php>Login Page</a>";
}
?>