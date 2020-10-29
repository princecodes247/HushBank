
<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Customer Details Entry Form</title>

<?php 
include 'db_connect.php'; //Connect mysql database
$today= date("Ymd H:i:s"); //get todays date
$result ="";
$max=mysql_query("select max(custid),max(acc_number) from customer ");
$acc=mysql_query("select acc_type from accounts order by acc_type");

//$opendate= $dates[year]."-".$dates[mon]."-".$dates[mday];

if(isset($_POST['Submit'])) ///forsubmit data
{
$custid=ucwords($_POST['custid']); 
$first_name=ucwords($_POST['first_name']);
$last_name=ucwords($_POST['last_name']);
$address=ucwords($_POST['address']);
$email=$_POST['email'];
$sex=ucwords($_POST['sex']);

$opendate=ucwords($_POST['opendate']);

$contact_number=ucwords($_POST['contact_number']);
$acc_number=ucwords($_POST['acc_number']);
$acc_type=ucwords($_POST['acc_type']);

$bal=mysql_query("select minbalance from accounts where acc_type='$acc_type'");

while($row=mysql_fetch_array($bal,MYSQL_BOTH))
{
$balance=$row[0];
}
		
  // check an email address is possibly valid 
if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/",$email)) //validating email
{
echo "Invalid Email Address!";
exit(0);
}
else 
{  
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($first_name)))) //Accept characters only
{
echo "Enter Valid Data for First Name!";
exit(0);
}
else 
{
if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($last_name))))  //Accept characters only
{
echo "Enter Valid Data for Last Name!";
exit(0);
}
else  
{   
if(!eregi ("^[0-9]+$", stripslashes(trim($contact_number))))  //Accept Numeric only	                 
{
echo "Enter Valid Data for Contact Number!";
exit(0);
}
else 
{ 
$result = mysql_query("Insert into customer  values('".$custid."','".$first_name."',
			'".$last_name."','".$address."','".$email."','".$sex."','".$contact_number."','".$acc_number."','".$balance."','".$acc_type."','".$opendate."')");
                     
$db_close=mysql_close();
			 
if ($result )
{
$dmode=$_GET['mode'];
echo "Added to database";
echo "<p>Click <a href='add_data.php?mode=$dmode'> here </a> to add another";
exit(0);
}
else
{
echo "Not Added To The Database";
echo "<p>Click <a href='add_data.php?mode=$dmode'> here </a> to go back";
exit(0);
} 
}	 //  
}////
}/////
}
}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--

body 
{
background-color: #eeeeee;
}

.firstalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
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
FONT-WEIGHT: bold;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #ffffff; 
BORDER-BOTTOM: #efefef 1px solid; 
BACKGROUND-COLOR: #858fbf
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #151535; 
BORDER-BOTTOM: #808a98 1px solid; 
LETTER-SPACING: -1px
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
filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');
}		

.style1 
{
font-family: "Courier New", Courier, mono;
font-weight: bold;
}

.style2 
{
font-family: "Courier New", Courier, mono
}

</style>

</head>
<script language="JavaScript">


function Blank_TextField_Validator()
{ 	
if (Form1.custid.value == ""  )
{alert("Customer Id Cannot be blank!.");
       Form1.custid.focus();
	   return (false); }  	
	if (Form1.first_name.value == ""  )
    {  alert("First Name Cannot be blank!.");
       Form1.first_name.focus();
	   return (false);} 	
if (Form1.last_name.value == ""  )
    {  alert("Last Name Cannot be blank!.");
       Form1.last_name.focus();
	   return (false);} 	
	if (Form1.email.value == ""  )
    {  alert("Email Address Cannot be blank!.");
       Form1.email.focus();
	   return (false);}	
	if (Form1.sex.value == ""  )
    {  alert("Sex Cannot be blank!.");
       Form1.sex.focus();
	   return (false);}	
	if (Form1.contact_number.value == ""  )
    {  alert("Contact Number Cannot be blank!.");
       Form1.contact_number.focus();
	   return (false); }
	   
	   
			
	
	
		
	if(document.Form1.address.value == 0)
	{	alert("\Address cannot be blank!!\ ");
		document.Form1.address.focus();
		return false;}			
	
	var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
        for (var i = 0; i < document.Form1.first_name.value.length; i++) {
                if (iChars.indexOf(document.first_name.value.charAt(i)) != -1) {
                alert ("Enter Valid First Name ");
                return false;
        }
                }
				
				
				
	var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
        for (var i = 0; i < document.Form1.last_name.value.length; i++) {
                if (iChars.indexOf(document.Form1.last_name.value.charAt(i)) != -1) {
                alert ("Enter Valid Last Name");
                return false;
        }
                }			
   
	var nonums = /^[0-9]*$/;
if (nonums.test(document.Form1.email.value)) {
     alert("Enter vlaid Email  Address");
	 Form1.email.focus();
     return false;
}

	
var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
        for (var i = 0; i < document.Form1.custid.value.length; i++) {
                if (iChars.indexOf(document.Form1.custid.value.charAt(i)) != -1) {
                alert ("Customer ID Type has special characters. \nThese are not allowed.\n");
                return false;
        }
                }				
	
	
	
	
// If text_name is not null continue processing
return (true);

}



</script>

<body >
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
  <TBODY>
   <tr>
    <TD width=1288 background="images/top.gif"  height=10><STRONG>
<?
if($_GET['mode']=='admin')
{
print "<a href='admin_data.php'>";
}
else 
if($_GET['mode']=='teller')
{
print "<a href='teller_data.php'>";
}
else
{
print "<a href='cust_data.php'>";
}
?>
<FONT face="Verdana, Arial, Helvetica, sans-serif" 
      color=#ffffff size=2>Home </FONT></STRONG>


<STRONG>
<a href='add_data_teller.php?mode=teller'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#aaeeff size=2>| Create Customer </FONT>
</STRONG>
<STRONG>
<a href='update_cust_teller.php?mode=teller'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Update Customer </FONT>
</STRONG>


<STRONG>
<a href='cust_del_teller.php?mode=teller'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>| Delete Customer </FONT>
</STRONG>
</TD>
    </TR>
    
    <TR>
      <TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      <DIV align=right>        
       
        <form name="Form1" method="post" action="" onSubmit="return Blank_TextField_Validator()">
          <p>&nbsp;</p>
          <table width="426" border="0" align="center">
            <tr>
              <td width="420"><div align="center"> <font face="Verdana, Arial, Helvetica, sans-serif" ><font color="#0000FF"><b></b></font></font></div></td>
            </tr>
          </table>
       
          <TABLE width="65%" height="30%" 
border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">
            <TBODY>
              <TR>
                <TD class=sectionhead align=middle colSpan=2><div align="center">Enter The Customer Details Below  !</div></TD>
              </TR>
              <TR>
                <TD class=firstalt align=middle width="41%"><div align="left" class="style1">Customer Id :</div></TD>
<?         
while($cust = mysql_fetch_array($max, MYSQL_BOTH))
{
if($cust[1] == null)
$maxaccnum="600001";
else
$maxaccnum=$cust[1]+1;	
if($cust[0] == null)
$maxcustid="10001";
else	
$maxcustid=$cust[0]+1;
}
print "<TD width=\"59%\" align=left class=firstalt >";
print "<input name=\"custid\" type=\"text\"  id=\"username2\"";
print "value=$maxcustid maxlength=\"10\" size=\"10\" tabindex=\"1\" >";
print "</TD></TR>";
?>
              <TR>
                <TD class=secondalt align=middle><div align="left" class="style2"><B>First Name :</B><BR>
                </div></TD>
                <TD class=secondalt align=left><input name="first_name" type="text"  id="first_name"  maxlength="40" size="40" AUTOCOMPLETE="OFF" tabindex="1" ></TD>
              </TR>
  <TR>
                <TD class=firstalt align=middle width="41%"><div align="left" class="style1">Last Name :</div></TD>
                <TD width="59%" align=left class=firstalt><input name="last_name" type="text"  id="last_name"  maxlength="40" size="40" tabindex="2">
                </TD>
              </TR>
   <TR>
                <TD class=secondalt align=middle><div align="left" class="style2"><B>Address</B><BR>
                </div></TD>
                <TD class=secondalt align=left><textarea name="address" size=100 tabindex="3"></textarea></TD>
              </TR>
  
              <TR>
                <TD class=firstalt align=middle><div align="left" class="style2"><B>E- mail :</B></div></TD>
                <TD align=left class=firstalt><input name="email" type="text"  id="email"  maxlength="40" size="40" tabindex="4">
                </TD>
              </TR>
              <TR>
                <TD class=secondalt align=middle><div align="left" class="style2"><B>Sex :</B><BR>
                </div></TD>
                
<TD class=secondalt align=left><input name="sex" type="radio"  id="sex" value="Male" maxlength="6" size="20">Male
<input name="sex" type="radio"  id="sex"  maxlength="6" value="Female" size="20">Female</TD>
              </TR>
              <TR>
                <TD class=secondalt align=middle><div align="left" class="style2"><B>Open date :</B><BR>
                </div></TD>
              
                <TD class=secondalt align=left> 

<input name="opendate" type="text" value=<?php $dates=date("Y-m-d"); echo $dates ;  ?> 
maxlength="20" size="20" AUTOCOMPLETE="ON" tabindex="6" >


              
           </TD>
              </TR>
<TR>
                
<TD class=firstalt align=middle><div align="left" class="style2"><B>Contact Number :</B></div></TD>
                <TD align=left class=firstalt><input name="contact_number" type="text"  id="contact_number"  maxlength="15" size="20" tabindex="6">
                </TD>
              </TR>
<TR>
                <TD class=secondalt align=middle width="41%"><div align="left" class="style1">Account Number :</div></TD>
<?
print "<TD width=\"59%\" align=left class=secondalt><input"; 
print " name=\"acc_number\" tabindex=\"7\" type=\"text\"   "; 
print " value=$maxaccnum";
print " maxlength=\"20\" size=\"20\" tabindex=\"1\"></TD>";
?>
<TR>
                <TD class=firstalt align=middle width="41%"><div align="left" class="style1">Account Type :</div></TD>
<TD class=secondalt align=left><select name="acc_type" AUTOCOMPLETE="ON" tabindex="8" >
<?
  while($acctype = mysql_fetch_array($acc, MYSQL_BOTH))
{
print "<option>$acctype[0]</option>";
}
print "</select>";
?></TD>
              </TR>
              
              
            </TBODY>
          </TABLE>
          <div align="center">
            <p>
              <input name="Submit" type="submit" class="admin_add_items" value="Add">
&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./customer_accounts_teller.php')" value="Cancel" ></div> </p>
        </form>
   
        </DIV></TD>
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