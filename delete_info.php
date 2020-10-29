<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?php
mysql_query("delete * from rejected_information where cust_id=$_GET[del]") or die("Database Error");
?>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>