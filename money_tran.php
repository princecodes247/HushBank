<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?php
include 'db_connect.php'; 
$cust=mysql_query("select user_name from login where user_name!='".$_SESSION['username']."' AND user_name!='admin' order by user_name");
if(isset($_POST['submit']))
{
$from=$_SESSION['username'];
$to=ucwords($_POST['to']);
$ablance=$_POST['abalance'];
$tbalance=$_POST['tbalance'];
$damount=$_POST['damount'];

if($damount>$abalance)
{
echo "Insufficient amount...";
exit(0);
}
else
{
mysql_query("update customer set balance=$tbalance-$damount where custid=$_SESSION[username]");
mysql_query("update customer set balance=$tbalance+$damount where custid='$to'");
mysql_query("update interest set old_bal=old_bal+$damount where acc_num='$to'");
mysql_query("update interest set old_bal=old_bal-$damount where acc_num=$_SESSION[username]");
$result =mysql_query("Insert into found_tran(deb_acct_no,cre_acct_no,balance,deb_amount) values('".$from."','".$to."','".$tbalance."','".$damount."')")or die("Database Error");
echo "Record is submitted...";
}
}
?>
<html>
<head>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<a href='cust_data.php'>
<STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#000000 size=2>Home </FONT>
</STRONG></table>

</head>
<body>
<form action="money_tran.php" method=post><br><br>

<p align=center>From:
<?php 
$f=$_SESSION[username]; 
echo $f;
?>
</p>

<p align=center>To:<select  name="to" AUTOCOMPLETE="ON" tabindex="1" ></p>	
<option>   </option>
<?php 
while($custid = mysql_fetch_array($cust, MYSQL_BOTH))
{
print "<option>".$custid[0]."</option>";
}
print "</select>";


$bal1=mysql_query("select balance,acc_type from customer where custid=$_SESSION[username]");
while($b = mysql_fetch_array($bal1, MYSQL_BOTH))
{
$bal=$b[0];
$acc=$b[1];
}

$min1=mysql_query("select minbalance from accounts where acc_type='$acc'");
while($a = mysql_fetch_array($min1, MYSQL_BOTH))
{
$min=$a[0];

}

$available=$bal-$min;



?>

<p align=center>Avalible Balance:<input type="text" name="abalance" value=<?php echo $available; ?>></p>
<p align=center>Total Balance:<input type="text" name="tbalance" value=<?php echo $bal; ?>></p>
<p align=center>Debit Amount:<input type="text" name="damount"></p>
<p align=center><input type="submit" name="submit" value="Send"> </p>

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