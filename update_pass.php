<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Create Users</title>
<?php include 'db_connect.php'; 
//Connect mysql database;  
$cust=mysql_query("select custid from customer Order by custid");   

$cust1=mysql_query("select user_password from login");

if(isset($_POST['Submit'])) ///forsubmit data           
{		     
$custid=ucwords($_POST['custid']); 			 
$oldpass=$_POST['oldpass']; 			 
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$authtype=ucwords($_POST['authtype']);
$qns=ucwords($_POST['questions']);
$ans=ucwords($_POST['answer']);

$oldpassword1=mysql_query("select user_password from login where user_name='".$custid."'");  
while($row1= mysql_fetch_array($oldpassword1))
{
$oldpassword=$row1[0];
}

$question1=mysql_query("select question from login where user_name='".$custid."' AND user_password='".$oldpass."'");  
while($row2 = mysql_fetch_array($question1))
{
$question=$row2[0];
}

$type=mysql_query("select user_type from login where user_name='".$custid."' AND user_password='".$oldpass."' AND question='".$qns."' AND ans='".$ans."'");  
while($row = mysql_fetch_array($type))
{
$type1=$row[0];
}

if ($oldpassword!=$oldpass)
{
echo "Wrong Old Password...";
}
elseif ($qns!=$question)
{
echo "Please select the secrete question...";
}
elseif ($pass!=$cpass)
{
echo "Passwords not matching...";
}
elseif($qns==" ")
{
echo "Please select the question...";
}
elseif($ans==" ")
{
echo "Answer Not Must Be Empty...";
}
elseif ($type1!=$authtype)
{
echo "Wrong User Type...";
}
else 
{ 
//$pass=md5("$pass"); 
$result = mysql_query("update login set user_password='".$pass."' where user_name='".$custid."' AND user_password='".$oldpass."' AND user_type='".$authtype."' AND question='".$qns."' AND ans='".$ans."'");                 
//$result = mysql_query("update login set user_password='".$pass."' where user_name='".$custid."' AND user_password='".$oldpass."' AND user_type='".$authtype."'");
//$db_close=mysql_close();			 

if($result )			    
{		
echo "Added To The Database...";
echo "<p>Click <a href='crt_users.php'> here </a> to add another";
exit(0); //echo "Added To The Database";	
}			 
else			  
{			
echo "Not Added To The Database...";
echo "<p>Click <a href='crt_users.php'> here </a> to go back";
exit(0);			  
} 		}}

//  }////	////  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

<!--body 
{
background-color: #eeeeee;
}

.firstalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #e7ebef
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #d6dbde
}

.sectionhead
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #efefef 1px solid; 
FONT-WEIGHT: bold;  BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #ffffff; 
BORDER-BOTTOM: #efefef 1px solid; BACKGROUND-COLOR: #858fbf
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #151535; BORDER-BOTTOM: #808a98 1px solid; 
LETTER-SPACING: -1px
}	

input.admin_add_items
{  
color:#055; font-family:'trebuchet ms',helvetica,sans-serif;   
font-size:84%;   
font-weight:bolder;   background-color:#fed;    
width :10%;   
border:1px solid;   
border-top-color:#7699Cc;   border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   
filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}
		
.style1 
{	font-family: "Courier New", Courier, mono;	
font-weight: bold;
}

.style2 
{
font-family: "Courier New", Courier, mono
}

</style>

</head><body >
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
</STRONG>
<STRONG>
<a href='crt_users.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Create User </FONT>
</STRONG>
<STRONG>


<a href='update_pass.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#aaeeff size=2>| Update User </FONT>
</STRONG>
<STRONG>
<a href='delete_acc.php?mode=admin'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Delete User </FONT>
</STRONG>
</TD>

</TR>  
  	    
<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190> <DIV align=right>
<form name="Form1" method="post" action="" onSubmit="return Blank_TextField_Validator()">          
<p>&nbsp;</p>          

<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> 
<font face="Verdana, Arial, Helvetica, sans-serif" ><font color="#0000FF"><b></b></font></font></div>
</td>            
</tr>          
</table>   
      <TABLE width="65%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">            
<TBODY>              
<TR>                
<TD class=sectionhead align=middle colSpan=2><div align="center">Enter the details below!</div>
</TD>              </TR>              

<TR>                

<TD class=firstalt align=middle width="41%">
<div align="left" class="style1">Id :</div>
</TD>

<TD class=secondalt align=left><select  name="custid" AUTOCOMPLETE="ON" tabindex="1" >	
<?  
while($custid = mysql_fetch_array($cust, MYSQL_BOTH))
{
print "<option>$custid[0]</option>";
}
print "</select>";
?>
</TD>             
<TR>                
<TD class=secondalt align=middle>

<div align="left" class="style2"><B>Old Password :</B><BR>                
</div>
</TD>                
<TD class=secondalt align=left>
<input name="oldpass" type="password" maxlength="40" size="40" AUTOCOMPLETE="OFF" tabindex="2" >
</TD>              
</TR>  
<TR>                
<TD class=firstalt align=middle>
<div align="left" class="style1"><B>Secrete question :</B><BR></div>
</TD> 
               <TD class=firstalt align=left>
<select tabindex=3  name="questions" AUTOCOMPLETE="ON" tabindex="4" >
<option value=" ">Please select any question</option>

<option value="What is you meet your spouse ?">What is you meet your spouse ?</option>
<option value="What was the name of your first school ?">What was the name of your first school ?</option>
<option value="What was your childhood hero ?">What was your childhood hero ?</option>
<option value="What is your fevorite pastime ?">What is your fevorite pastime ?</option>
<option value="What is your fevorite sports team ?">What is your fevorite sports team ?</option>
<option value="What is your fathers middle name ?">What is your fathers middle name ?</option>
<option value="What was your high school mascot ?">What was your high school mascot ?</option>
<option value="What make was your first Car or Bike ?">What make was your first Car or Bike ?</option>
<option value="What is your Pets name ?">What is your Pets name ?</option>
</select>
</TD> 
             </TR>        
                            
<TR>                
<TD class=secondalt align=middle width="41%">
<div align="left" class="style1">Answer :</div>
</TD>                
<TD width="59%" align=left class=secondalt>
<input name="answer" type="text" maxlength="40" size="40" tabindex="3">                
</TD>             
</TR>

<TD class=firstalt align=middle>
<div align="left" class="style2"><B>New Password :</B><BR>                
</div>
</TD>                
<TD class=firstalt align=left>
<input name="pass" type="password" maxlength="40" size="40" AUTOCOMPLETE="OFF" tabindex="2" >
</TD>              
</TR>  

<TR>                
<TD class=secondalt align=middle width="41%">
<div align="left" class="style1">Confirm Password :</div>
</TD>                

<TD width="59%" align=left class=secondalt>
<input name="cpass" type="password" maxlength="40" size="40" tabindex="3">                
</TD>             
</TR>

<TR>                
<TD class=firstalt align=middle>
<div align="left" class="style2"><B>Authentication Type:</B><BR></div>
</TD> 
               <TD class=firstalt align=left>
<select name="authtype" tabindex=3  AUTOCOMPLETE="ON" tabindex="4" >
<option value=" ">Select</option>
<option Value="Teller">Teller</option>
<option value="Customer">Customer</option>
</select></TD> 
             </TR>                                        
</TBODY>          
</TABLE>          
<div align="center"><p><input name="Submit" type="submit" class="admin_add_items" value="Update">&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./crt.php?mode=admin')" value="Cancel" ></div>      
</form>           </DIV>
</TD>    
</TR>  
</TBODY>
</TABLE>
</body>
</html>
<?php
}
else
{
echo "Please click here to login " . "<a href=index.php>Login Page</a>";
}
?>