<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>


<form action="" method=post>
<p align=center>Coustomer id:<input type="text" name="Coustomer"> <br><br></p>
<p align=center>Loan Id:<input type="text" name="loan_id"> <br><br></p>
<p align=center>Loan Type:<input type="text" name="type"> <br><br></p>
<p align=center>Amount:<input type="text" name="amount"> <br><br></p>
<p align=center>Duration:<input type="text" name="duration"> <br><br></p>
<p align=center>Start Date:<input type="text" name="sdate"> <br><br></p>
<p align=center>Monthly Instalment:<input type="text" name="minst"> <br><br></p>
<p align=center><input type="submit" name="submit" value="submit">         <input type="submit" name="cancel" value="cancel"></p>
</form>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>