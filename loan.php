

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

.firstalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #FFFFFF; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #5555fF;
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #55ACfF
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




<?php include 'db_connect.php'; 
//Connect mysql database;  



?>




<body>

  


<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>

 <TR>
<TD width=1288 background="images/top.gif"  height=10><STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif" size=2><center>Loan Request</center> </FONT></STRONG></TD>
 </TR>
 
<TR>
<TD width=738 background="images/top_2.gif"  height=9><div align="justify"><a href="loan2.php"><STRONG>
	<FONT face="Verdana, Arial, Helvetica, sans-serif" 
color=#000000 size=2>Home </FONT></STRONG></td></tr>
</TABLE>
<form name="Form1" method="post" action="loan_request1.php">
 <table width="50%" border="0" cellpadding="2" cellspacing="1">
<tr>

<td class="firstalt ">

<span class="style6"> 
Loan Type : </span> </td>
<td class="secondalt">
<select name="loantype" onchange='onindexchange()'>
<?php 
$cust1=mysql_query("select loan_type from loan_type"); 

while($type = mysql_fetch_array($cust1))
{
print "<option>".$type[0]."</option>";
}
?>
<option>Other</option>
</select> </td>
<br><td>
<input name="submit" type="submit" value="Send">  
 <input name="cancel" type="submit" value=Cancel></td>
</form>
</body>
</html>
<?php
