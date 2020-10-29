<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Transactions</title>
<?php       
include 'db_connect.php';
//Connect mysql database$customerid=$_GET['custid'];      $today= date("Ymd H:i:s"); 
//get todays date	  
$result ="";
$tran=mysql_query("select max(tranid) from transactions");
$acc=mysql_query("select acc_number from customer");	    

if(isset($_POST['Submit'])) 
///forsubmit data           
{		$tranid=ucwords($_POST['tranid']); 			
 $trantype=ucwords($_POST['trantype']);
$tranmethod=ucwords($_POST['tranmethod']);
$date=ucwords($_POST['date']);		
$acc_num=ucwords($_POST['acc_num']);			 
$amount=ucwords($_POST['amount']);			
$remarks=ucwords($_POST['remarks']);			 			 			

if(!eregi("^[0-9]+$", stripslashes(trim($amount))))  
//Accept Numeric only
{					            
echo "Enter Valid Data for Amount!";				               
exit(0);					  	
}			    			 			
else 
{
$forward=true;
$valid=mysql_query("select balance from customer where custid=$customerid");
$valid2=mysql_query("select balance from customer where acc_number=$acc_num");
while($res = mysql_fetch_array($valid, MYSQL_BOTH))
{
if($amount>$res[0])
{
echo "Amount insufficient!";
$forward=false;
}
else
{
$forward=true;
$updateamount1=$res[0]-$amount;
}
}

while($res1=mysql_fetch_array($valid2,MYSQL_BOTH))
{
$updateamount2=$amount+$res1[0];
}

if($forward==true)
{
$result=mysql_query("update customer set balance=$updateamount1 where custid=$customerid");
$result1=mysql_query("update customer set balance=$updateamount2 where acc_number=$acc_num");
$result2 = mysql_query("Insert into transactions(tranid,trantype,tranmethod,date,acc_num,amount,remarks,custid)  values($tranid,'".$trantype."','".$tranmethod."','".$date."',$acc_num,$amount,'".$remarks."','".$customerid."')");
$db_close=mysql_close();			 

if ($result2)			    
{
$dmode=$_GET['custid'];				
echo "Transaction completed successfully";
echo "<p>Click <a href='cust_tran.php?custid=$dmode'> here </a> for another transaction";
exit(0);					   
//echo "Added To The Database";				 }			 
else			  
{			      
echo "Transaction failure";
echo "<p>Click <a href='cust_tran.php?custid=$dmode'> here </a> to go back";
exit(0);			  
} 			}	 
//}}////			 
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
BORDER-LEFT: #e5e5e5 1px solid; COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #e7ebef
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #000000; BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #d6dbde
}

.sectionhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #efefef 1px solid; 
FONT-WEIGHT: bold;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #ffffff; 
BORDER-BOTTOM: #efefef 1px solid; BACKGROUND-COLOR: #858fbf
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #151535; 
BORDER-BOTTOM: #808a98 1px solid; LETTER-SPACING: -1px
}	

input.admin_add_items
{  
color:#055;   
font-family:'trebuchet ms',helvetica,sans-serif;   
font-size:84%;   font-weight:bolder;   
background-color:#fed;    
width :10%;   
border:1px solid;   
border-top-color:#7699Cc;   
border-left-color:#7699Cc;   border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   
filter:progid:DXImageTransform.Microsoft.Gradient (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
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
{  
alert("Customer Id Cannot be blank!.");       
Form1.custid.focus();	return (false);
}  		

if (Form1.first_name.value == ""  )    
{  
alert("First Name Cannot be blank!.");       Form1.first_name.focus();	   
return (false);
} 
	
if (Form1.last_name.value == ""  )    
{  
alert("Last Name Cannot be blank!.");       Form1.last_name.focus();	   
return (false);
} 
		
if (Form1.email.value == ""  )    
{  
alert("Email Address Cannot be blank!.");       
Form1.email.focus();	  
return (false);
}		

if (Form1.sex.value == ""  )    
{  
alert("Sex Cannot be blank!.");       
Form1.sex.focus();	   
return (false);
}		

if (Form1.contact_number.value == ""  )    
{  
alert("Contact Number Cannot be blank!.");       
Form1.contact_number.focus();	  
return (false); 
}	   	   								
if(document.Form1.address.value == 0)	
{	
alert("\Address cannot be blank!!\ ");	document.Form1.address.focus();		
return false;
}		
var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";        
for (var i = 0; i < document.Form1.first_name.value.length; i++) 
{                
if(iChars.indexOf(document.first_name.value.charAt(i)) != -1) 
{                
alert ("Enter Valid First Name ");                
return false;        
}           }													
var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";        
for (var i = 0; i < document.Form1.last_name.value.length; i++) 
{                
if (iChars.indexOf(document.Form1.last_name.value.charAt(i)) != -1) 
{                
alert ("Enter Valid Last Name");                
return false;        
} }			   	
var nonums = /^[0-9]*$/;

if (nonums.test(document.Form1.email.value)) 
{     
alert("Enter vlaid Email  Address");	 
Form1.email.focus();    
return false;
}	

var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";        
for (var i = 0; i <document.Form1.custid.value.length; i++) 
{                
if (iChars.indexOf(document.Form1.custid.value.charAt(i)) != -1) 
{                
alert ("Customer ID Type has special characters. \nThese are not allowed.\n");                
return false;        
}                
}								
// If text_name is not null continue processingreturn (true);
}
</script>
<body onLoad="focus(); Form1.first_name.focus()">
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<?php 
print "<a href='cust_data.php?custid=$customerid'>";
?>

<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT></STRONG>
</TD>    
</TR>           

<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>     
 <DIV align=right>      
<form name="Form1" method="post" action="" onSubmit="return Blank_TextField_Validator()">          
<p>&nbsp;</p>         
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> 
<font face="Verdana, Arial, Helvetica, sans-serif" >
<font color="#0000FF"><b></b></font></font></div>
</td>            
</tr>          
</table>                 

<TABLE width="65%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">            
<TBODY>             
 <TR>            
<TD class=sectionhead align=middle colSpan=2><div align="center">Transaction Manager</div>
</TD>             
</TR>             

<TR>    
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Transaction ID :</div>
</TD>

<?php         
while($tid = mysql_fetch_array($tran, MYSQL_BOTH))
{
if($tid[0] == null)$tmax="9000";
else
$tmax=$tid[0]+1;	
}

print "<TD width=\"59%\" align=left class=firstalt>
<input"; print " name=\"tranid\" type=\"text\" "; 
print " value=$tmax";print " maxlength=\"10\" size=\"10\" tabindex=\"1\"></TD></TR>";?>              

<TR>                
<TD class=secondalt align=middle><div align="left" class="style2">
<B>Transaction Type:</B><BR>                </div>
</TD>                

<TD class=secondalt align=left>
<select name="trantype"  AUTOCOMPLETE="ON" tabindex="2" >
<option>Transfer</option>
</select>
</TD>              
</TR>  

<TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Transaction Method :</div>
</TD>                

<TD width="59%" align=left class=firstalt>
<select name="tranmethod"   tabindex="1">
<option>Online</option>
</select>                
</TD>       </TR>

<TR>                
<TD class=secondalt align=middle><div align="left" class="style2"><B>Date(yyyy-mm-dd)</B><BR></div>
</TD>                

<TD class=secondalt align=left><input name="date" size=10>
</TD>             
 </TR>                        

<TR>                
<TD class=secondalt align=middle><div align="left" class="style2"><B>Account Number :</B><BR>                </div>
</TD>                

<TD class=secondalt align=left>
<select name="acc_num" AUTOCOMPLETE="ON" tabindex="2" >
<?php 
while($accnum = mysql_fetch_array($acc, MYSQL_BOTH))
{
print "<option>$accnum[0]</option>";
}
print "</select>";
?>
</TD>              
</TR>              
<TR>                
<TD class=firstalt align=middle><div align="left" class="style2"><B>Amount :</B></div>
</TD>                

<TD align=left class=firstalt>
<input name="amount" type="text" maxlength="20" size="20" tabindex="1">                
</TD>              
</TR>

<TR>             
<TD class=secondalt align=middle width="41%"><div align="left" class="style1">Remarks :</div>
</TD>

<TD width="59%" align=left class=secondalt>
<input name="acc_number" type="text"  id="acc_number" maxlength="20" size="20" tabindex="1">
</td>
</tr>            
</TBODY>          
</TABLE>          
<div align="center">           
 <p> 
<input name="Submit" type="submit" class="admin_add_items" value="Submit"></p></div>        

</form>           
</DIV>
</TD>    
</TR>  </TBODY>
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