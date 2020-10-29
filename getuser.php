<?php 
session_start(); 
 $con=mysql_connect('localhost','root','q1w2e3r4/');
 if(!con) 
{ 
die('could not connect :' . mysql_error()); 
} 
mysql_select_db("goal123",$con); 
$sql="select loan_amount,duration from loan_type";
result1=mysql_query($sql);  
while($row1=mysql_fetch_array($result1)) 
{ 
$_SESSION['loanamount']=$row1['loan_amount'];
$_SESSION['duration']=$row1['duration']; 
}  

echo $_SESSION['duration'];
echo $_SESSION['loanamount'];
mysql_close($con); 
?> 