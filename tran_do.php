<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Transactions...</title>

<?php       
include 'db_connect.php'; //Connect mysql database      
$today= date("Ymd H:i:s"); //get todays date	  
$result ="";

$acc=mysql_query("select acc_number from customer");	   
if(isset($_POST['Submit'])) ///forsubmit data           
{		     
$tid=$_POST['tranid'];	 
$trantype=ucwords($_POST['trantype']);
$tranmethod=ucwords($_POST['tranmethod']);
$date=date("Y-m-d");
$chequenum=$_POST['chequenum'];			 
$acc_num=ucwords($_POST['acc_num']);			 
$amount=ucwords($_POST['amount']);			 
$remarks=ucwords($_POST['remarks']);			 			 			


$a1=mysql_query("select * from interest where acc_num=$acc_num");
while($a2 = mysql_fetch_array($a1, MYSQL_BOTH))
{
$date3=$a2[1];
$oldbalance=$a2[2];
}


if(!eregi ("^[0-9]+$", stripslashes(trim($amount))))  //Accept Numeric only
{ 
echo "Enter Valid Data for Amount!";exit(0);					  			           
}
			    			 				 			
else 
{
$forward=true;
if($trantype=="Withdrawal")
{ 
$valid=mysql_query("select balance from customer where acc_number=$acc_num");

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
$updateamount=$res[0]-$amount;
}

}
}

else
{
$cid=mysql_query("select custid from customer where acc_number=$acc_num");
while($result = mysql_fetch_array($cid, MYSQL_BOTH))
{
$customerid=$result[0];
}
$custid=$customerid;

$valid=mysql_query("select balance from customer where acc_number=$acc_num");
while($res = mysql_fetch_array($valid, MYSQL_BOTH))
{
$updateamount=$amount+$res[0];
$result1 = mysql_query("Insert into transactions values('".$tid."','".$trantype."','".$tranmethod."','".$date."','".$chequenum."','".$acc_num."','".$amount."','".$updateamount."','".$remarks."','".$custid."')");
mysql_query("update customer set balance=$updateamount where acc_number=$acc_num");

if($date>=$date3)
{
$bal=$oldbalance*(7/100);
$bal1=$bal+$updateamount;

$mondate=mktime(0,0,0,date("m"),date("d"),date("Y")+1);
$d=date("Y-m-d",$mondate);

mysql_query("update interest set date='$d',interest='$bal',tot_bal='$bal1' where acc_num=$acc_num");
mysql_query("update customer set balance='$bal1' where acc_number=$acc_num");
}

mysql_query("update interest set old_bal=$updateamount where acc_num=$acc_num");
$db_close=mysql_close();
}
if ($result1 )			    
{
$dmode=$_GET['mode'];				  
echo "Transaction completed successfully";echo $oldbalance;echo $custid;	
echo "<p>Click <a href='tran.php?mode=$dmode'> here </a> for another transaction";exit(0);				 
}			 
else			  
{			      
echo "Transaction failure";
echo "<p>Click <a href='tran_do.php?mode=$dmode'> here </a> to go back";			  
} 
exit(0);
}








if($forward==true)
{
$cid=mysql_query("select custid from customer where acc_number=$acc_num");
while($result = mysql_fetch_array($cid, MYSQL_BOTH))
{
$customerid=$result[0];
}
$custid=$customerid;


$result=mysql_query("update customer set balance=$updateamount where acc_number=$acc_num");

if($date>=$date3)
{
$bal=$oldbalance*(7/100);
$bal1=$bal+$updateamount;

$mondate=mktime(0,0,0,date("m"),date("d"),date("Y")+1);
$d=date("Y-m-d",$mondate);

mysql_query("update interest set date='$d',interest='$bal',tot_bal='$bal1' where acc_num=$acc_num");
mysql_query("update customer set balance='$bal1' where acc_number=$acc_num");
}

mysql_query("update interest set old_bal=$updateamount where acc_num=$acc_num");
$result1 = mysql_query("Insert into transactions values('".$tid."','".$trantype."','".$tranmethod."','".$date."','".$chequenum."','".$acc_num."','".$amount."','".$updateamount."','".$remarks."','".$custid."')");

$db_close=mysql_close();			 
if ($result1 )			    
{
$dmode=$_GET['mode'];				  
echo "Transaction completed successfully";
echo "<p>Click <a href='tran.php?mode=$dmode'> here </a> for another transaction";exit(0);				 
}			 
else			  
{			      
echo "Transaction failure";
echo "<p>Click <a href='tran_do.php?mode=$dmode'> here </a> to go back";			  
} 									  
}	 //  		   		     
}


}

	 
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
 COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; BACKGROUND-COLOR: #e7ebef
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
border-left-color:#7699Cc; border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   
filter:progid:DXImageTransform.Microsoft.Gradient (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc'); 
}		

.style1 
{	
font-family: "Courier New", Courier, mono;	font-weight: bold;
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
if(Form1.tranmethod.options[Form1.tranmethod.selectedIndex].text=="Cheque")
{
if (Form1.chequenum.value == ""  )    
{  
alert("Cannot empty Chaeque Number!.");       
Form1.chequenum.focus();	   return (false);
} 
}

if(Form1.trantype.options[Form1.trantype.selectedIndex].text=="Select")
{
if (Form1.trantype.value == "Select"  )    
{  
alert("Please select the Trasaction Type...");       
Form1.trantype.focus();	   return (false);
} 
}

if(Form1.tranmethod.options[Form1.tranmethod.selectedIndex].text=="Select")
{
if (Form1.tranmethod.value == "Select"  )    
{  
alert("Please select the Trasaction Method...");       
Form1.tranmethod.focus();	   return (false);
} 
}

if(Form1.acc_num.options[Form1.acc_num.selectedIndex].text=="Select")
{
if (Form1.acc_num.value == "Select"  )    
{  
alert("Please select the account number...");       
Form1.acc_num.focus();	   return (false);
} 
}
}
function onindexchange()
{
if(Form1.tranmethod.options[Form1.tranmethod.selectedIndex].text=="Cheque")
{
Form1.chequenum.disabled=false;
var iChars = "~!@#$%^&*()+=-[]\\\';,./{}|\":<>?";        
for (var i = 0; i < document.Form1.chequenum.value.length; i++) 
{                
if (iChars.indexOf(document.Form1.chequenum.value.charAt(i)) != -1) 
{                
alert("Cheque Number Type has special characters. \nThese are not allowed.\n");                
return false;        
}
}
}
else
{
Form1.chequenum.disabled=true;
}
}

</script>
<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<font color="#0000FF">&nbsp;</font><a href="admin_data.php"><FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>Home </FONT></a>

</STRONG>
</TD>    
</TR>       
<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>                       
<form name="Form1" method="post" action="tran_do.php" onSubmit="return Blank_TextField_Validator()">          
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
<TR>                <TD class=sectionhead align=middle colSpan=2><div align="center">Transaction Manager</div>
</TD>              
</TR>
              <TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Transaction ID :</div>
</TD>
<?php
$tran=mysql_query("select max(tranid) from transactions");

while($tid = mysql_fetch_array($tran, MYSQL_BOTH))
{
if($tid[0] == null)
{
$tmax="9000";
}
else
{
$tmax=$tid[0]+1;
}
}
//print "<td class=firstalt><b><font size=4>";
//print $tmax;
print "<TD width=\"59%\" align=left class=firstalt><input"; 
print " name=\"tranid\" type=\"text\" tabindex=\"1\" "; 
print " value=$tmax";
//print $tmax;
print " maxlength=\"10\" size=\"10\" tabindex=\"1\">";
print "</font></b></TD></TR>";
?>              
<TR>                
<TD class=secondalt align=middle><div align="left" class="style2"><B>Transaction Type:</B><BR>                </div>
</TD>                
<TD class=secondalt align=left>
<select name="trantype" tabindex="2" AUTOCOMPLETE="ON" tabindex="2" >
<option value="Select">Select</option>
<option>Deposit</option>
<option>Withdrawal</option>
</select>
</TD>              
</TR>  

<TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Transaction Method :</div>
</TD>       
         
<TD width="59%" align=left class=firstalt>
<select name="tranmethod"   tabindex="3" onclick='onindexchange()' >
<option value="Select">Select</option>
<option value="Cash">Cash</option>
<option value="Cheque">Cheque</option>
</select>       
     </TD>              
</TR>

<TR>                
<TD class=secondalt align=middle><div align="left" class="style2"><B>Date(yyyy-mm-dd)</B><BR>                </div>
</TD>                
<TD class=secondalt align=left>

<font size=4>
<?php
$date=date("Y-m-d");
echo $date; 












?>
</font>





</TD>              
</TR>  


            
<TR>                
<TD class=firstalt align=middle><div align="left" class="style2"><B>Cheque Number :</B></div>
</TD>                
<TD align=left class=firstalt><input name="chequenum" type="text"  maxlength="40" size="40" tabindex="5">                
</TD>              
</TR>              
<TR>                
<TD class=secondalt align=middle><div align="left" class="style2"><B>Account Number :</B><BR>                </div>
</TD>                
<TD class=secondalt align=left><select name="acc_num" AUTOCOMPLETE="ON" tabindex="6" >
<option value="Select">Select</option>
<?php 
while($accnum = mysql_fetch_array($acc, MYSQL_BOTH))
{
print "<option>$accnum[0]</option>";
}

print "</select>";?>
</TD>              
</TR>              
<TR>     
          
<TD class=firstalt align=middle><div align="left" class="style2"><B>Amount :</B></div>
</TD>                
<TD align=left class=firstalt><input name="amount" type="text" maxlength="20" size="20" tabindex="7">                
</TD>              
</TR>
<TR>         <TD class=secondalt align=middle width="41%"><div align="left" class="style1">Remarks :</div>
</TD>
<TD width="59%" align=left class=secondalt><input name="remarks" type="text"  id="acc_number" maxlength="20" size="20" tabindex="8">
</td>
</tr>            
</TBODY>          
</TABLE>          <div align="center">            <p>              
<input name="Submit" type="submit" class="admin_add_items" value="Transact" onclick=onindexchange()> </p>          </div>        
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./tran.php')" value="Cancel" ></div> </p>
</form>           </DIV>
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