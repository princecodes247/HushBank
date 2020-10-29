<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Accounts</title>
<?php      
 include 'db_connect.php';       
$result = mysql_query("select * from complaint where comp_from='Administrator'",$link) or die("Database Error");

$i=1;
$count=0;
$count1=mysql_query("select * from complaint where comp_to='Administrator'") or die("Database Error");
while($row = mysql_fetch_array($count1, MYSQL_BOTH))
{
$count=$count+1;
}


if(isset($_POST['delete'])) ///forsubmit data           
{
//$count=mysql_query("select count(*) from complaint where comp_to='Administrator'") or die("Database Error");
if(isset($_POST['check'])) ///forsubmit data           
{
mysql_query("delete from comp_from where slno='".$_POST['check']."'") or die("Database Error");
}
}



if(isset($_POST['deleteall'])) ///forsubmit data           
{
mysql_query("delete from complaint where comp_to='Administrator'") or die("Database Error");
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--body 
{	
background-color: #eeeeee;    
SCROLLBAR-ARROW-COLOR:#666699; SCROLLBAR-BASE-COLOR: #3958A6;
}

.man_auth th
{
background-color:#5368a6;
color: #000000
}

.man_auth td
{
background-color: #7699Cc;
color : #aaeeee
}

.man_auth
{ 	
background-color: #9DACDF;	
border-top-color: #000033;	
border-top-width: 1px;	border-right-width: 1px;	
border-bottom-width: 1px;	
border-left-width: 1px;	
border-top-style: double;	border-right-style: double;	
border-bottom-style: double;	
border-left-style: double;	
border-right-color: #000033;	border-bottom-color: #000033;	
border-left-color: #000033;	
height: auto;	
width: 80%;	
margin-top: 1px;	margin-right: 1px;	
margin-bottom: 1px;	
margin-left: 1px;	
padding-top: 1px;	
padding-right: 1px;	
padding-bottom: 1px;	padding-left: 1px;	
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
width :10%;   border:1px solid;   
border-top-color:#7699Cc;   
border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}

.style6 
{
color: #FFFFFF
}
</style>
</head>

<body>


<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<TR>      
<TD width=1288 background="images/top.gif"  height=10>
<a href='admin_data.php'>
<STRONG>
<FONT face="Verdana, Arial, Helvetica, sans-serif"  color=#000000 size=2>Home </FONT>
</STRONG></TD>    
</TR>  
  
<TR>      
<TD width=738 bgColor=#e5e5e5 height=9>
<br>
<?php 
if($_SESSION['username'])
{
}
else
{
?>
<form action="custdata.php" method="post">
<?php
}
?>
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" value="<< Back" >&#160;&#160;&#160;
</form>
<input name="delete" type="submit" class="admin_add_items" value="Delete" >&#160;&#160;&#160;

<input name="deleteall" type="submit" class="admin_add_items" id="deleteall" value="Delete All" >&#160;&#160;&#160;

</TR>    
<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=1000 bgColor=#e5e5e5 height=190>      
<DIV align=right>                
      
<div align="center">         







<table border=0>
<tr><td colspan=2 bgColor=#e5e5e5><font align="center" size=5 color=red>Inbox</font></td></tr>      
</table><br>
 <table width="90%" border="0" cellpadding="2" cellspacing="1" class="man_auth">   
 <tr> 
<th width="5"><span class="style6"></span>            
<th width="20"><span class="style6">From</span></th>             
<th width="150"><span class="style6">Subject</span>
<th width="420"><span class="style6">Message</span>
<th width="180"><span class="style6">Date</span> 
</tr>    
  
<tr>
<?php 	    
       $result = mysql_query("select * from complaint where comp_to='$_SESSION[username]'",$link) or die("Database Error");
while($row = mysql_fetch_array($result, MYSQL_BOTH))
{
?>
</a>
</div>
</td>             

<td width="2" height="2">   <div align="center"> 



<input name="check[]" type="checkbox" value="<?php echo $row[0]; ?>" >



</div>
</td> 


<td><div align="left">    
<?php 
echo $row[2];
?>
</div>
</td>   
          
<td>
<div align="left">
<?php 
echo $row[3];
?>
</div>
</td>   

<td>
<div align="left">
<?php 
echo $row[4];
?>
</div>
</td> 
          
<td>
<div align="left">
<?php 
echo $row[5];
?>
</div>
</td>  

</tr>           
<?php 
}


?>      
   
</table>  
<br><br>

<p>&nbsp;</p>       
<p>&nbsp;</p>         <p>&nbsp;</p>        
<p> </p>             
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        
<p>&nbsp;</p>        <p>&nbsp;</p>      
</DIV>
</TD>    
</TR>  
</TBODY>
</TABLE>
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