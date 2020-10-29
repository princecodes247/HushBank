<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Admin Home</title>

</head>

<body>
<p align="center">
<img src="image/bank.jpg" width="1280" height="250" >
</p>
<div align="justify">
	<table border="1" width="90%" id="table1" height="186" align=center>
		<tr>
			<td colspan="5">
			<p align="center"><font color="#800000">&nbsp;<STRONG><FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>ADMINISTRATOR 
			ONLINE</FONT></STRONG></font></td>
		</tr>
		<tr>
			<td height="51" align="center" width="24%"><a href="admin_acc_view_general.php?mode=admin"><STRONG>
			<FONT face="Verdana, Arial, Helvetica, sans-serif" 
color=#800000 size=2>Account Types </FONT></STRONG>
			</td>
			<td height="51" align="center" width="20%">
	<a href="customer_accounts.php"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>User Accounts</FONT></B></STRONG></td>
			<td height="51" align="center" width="20%"><a href="crt.php?mode=admin"><font size="2"><STRONG><B>
	<FONT 
color=#800000 face="Verdana, Arial, Helvetica, sans-serif">Password Setting</FONT></B></STRONG></font></a><font color="#800000"><b>
	</b></font>
			</td>
			<td height="51" align="center" width="17%">
<a href="search.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Search</FONT></B></STRONG></font></td>
			<td width="16%" height="51" align="center">
<a href="tran.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Transaction 
			Manager</FONT></B></STRONG></font></td>
		</tr>
		<tr>
			<td height="42" align="center" width="24%">
<a href="mini_st.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>&nbsp;Mini 
			Statement </FONT></B></STRONG></font>
			</td>
			<td height="42" align="center" width="20%">
<a href="loan3.php?mode=admin">
<font size="2"><STRONG><B>
			<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Loan  </FONT></B></STRONG></font>
			</td>
			<td height="42" align="center" width="20%">
<a href="money_tran_admin.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Found 
			Transaction</FONT></B></STRONG></font></td>
			<td height="42" align="center" width="17%">
<a href="complaint_admin.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Compose</FONT></B></STRONG></font></td>
			<td width="16%" height="42" align="center"><a href="inbox_admin.php?mode=admin">
<font size="2"><STRONG><B>
	<FONT 
face="Verdana, Arial, Helvetica, sans-serif" color=#800000 size=2>Inbox </FONT></B></STRONG></font>
			</td>
		</tr>
		<tr>
			<td colspan="5">
<p align="center"><a href="logout.php" ><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>Log Out</FONT></STRONG></td>
		</tr>
	</table>
</div>
</body>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>