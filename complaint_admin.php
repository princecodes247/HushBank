<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
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

.style6 {
color: #FFFFFF
}
</style>

<?php
 include 'db_connect.php'; 

$cust=mysql_query("select user_name from login"); 

if(isset($_POST['submit'])) 
{
$to=ucwords($_POST['to']); 
$from=$_SESSION['username'];
$subject=ucwords($_POST['subject']);
$complaint=ucwords($_POST['complaint']);
$comp_date=strtotime("now");
//$com_date= $dates[year]."-".$dates[mon]."-".$dates[mday];
                                                                              
if ($subject=="")
{
echo "Subject Not Must Be Empty...";
}
elseif($complaint=="")
{
echo "Complaint Not Must Be Empty...";
}

else 
{ 


$slno=mysql_query("select max(slno) from complaint");
while($a = mysql_fetch_array($slno, MYSQL_BOTH))
{
if($a[0] == null)
{
$msgno=1;
}
else
{
$msgno=$a[0]+1;
}
}





if(mysql_query("Insert into complaint(slno,comp_to,comp_from,subject,complaint) values('".$msgno."','".$to."','".$from."','".$subject."','".$complaint."')"))
{
mysql_query("UPDATE complaint SET comp_date= NOW() where slno='$msgno'");
echo "Message Sent...";
}
else
{
echo "Message Not Sent...";
}
$db_close=mysql_close();			 
}
}
?>
<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
</STRONG></table>
</p><center><table border=0>
<form action="" method="post"><br><br><br><br>
<p align=center><tr><td><font size=4>To &#160;&#160;&#160;&#160;&#160;&#160;&#160; : </font></td><td>&#160;&#160;&#160;<select  name="to" AUTOCOMPLETE="ON" tabindex="1" >	

<?php 
while($custid = mysql_fetch_array($cust, MYSQL_BOTH))
{
print "<option>$custid[0]</option>";
}
print "</select>";
?></td></tr></tr></p>
<p align=center><tr><td><font size=4>From &#160;&#160;&#160;&#160;:</font></td><td>&#160;&#160;&#160;<font size=4><?php echo $_SESSION['username']; ?></font></td></tr>	
</p>
<p align=center><tr><td><font size=4>Subject &#160;: </font></td><td>&#160;&#160;&#160;<input type="text" name="subject"></td></tr></table></center> <br></p>
<p align=center>
<font size=4>Message</font> : <br><br>	<textarea name="complaint"  rows=10 cols=30></textarea></p>
<p align=center><input type="submit" name="submit" value=Send class=admin_add_items>   &nbsp; &nbsp;&nbsp;       <input type="reset" name="reset" value=Clear class=admin_add_items> </p>
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