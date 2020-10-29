<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?php
session_start();
$_SESSION['username']=" ";
session_destroy();
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
?>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>