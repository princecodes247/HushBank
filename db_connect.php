<?php 

$link = mysql_connect("localhost", "root", "technology")

        or die("Could not connect");

$db = mysql_select_db("bankingdb", $link)
		or die("Could not select database");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>WELCOME TO ONLINE BANKING LOGIN PAGE</title>
</head>
<body>
</body>
</html>
