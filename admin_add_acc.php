<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<html>
<head>
<title>Add New Accounts...</title>

<?php       

include 'db_connect.php'; //Connect mysql database
   
if(isset($_POST['Submit'])) //forsubmit data           
{		     
$acc_type=ucwords($_POST['acc_type']); 			
$minbalance=ucwords($_POST['minbalance']);						 			

if (!eregi ("^[a-zA-Z ]+$", stripslashes(trim($acc_type)))) //Accept characters only			    
{				  
echo "Enter Valid Data for Account Type!";				  
exit(0);				 
}			
else 
{			       
if (!eregi ("^[0-9 ]+$", stripslashes(trim($minbalance))))  //Accept Numbers only				      
{					    
echo "Enter Valid Data for Last Name!...";
echo "<p>Click<a href='admin_add_acc.php'>here </a> to go back";			exit(0);					  					  
}				 			
else 
{  
$result = mysql_query("Insert into accounts  values('".$acc_type."','".$minbalance."')");                    
 $db_close=mysql_close();			 
if ($result )		
{	
echo "Added To The Database...";
echo "<p>Click <a href='admin_add_acc.php'> here </a> to add another";
exit(0);	//echo "Added To The Database";				 
}			
else			  
{			      
$msg= "Not Added To The Database...";
echo "<p>Click <a href='admin_add_acc.php'> here </a> to go back";	
exit(0);			  
} 					
}		     
}
}
	 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #e7ebef
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #e5e5e5 1px solid; 
BORDER-LEFT: #e5e5e5 1px solid; COLOR: #000000; 
BORDER-BOTTOM: #808a98 1px solid; 
BACKGROUND-COLOR: #d6dbde
}

.sectionhead 
{
BORDER-RIGHT: #808a98 1px solid; 
BORDER-TOP: #efefef 1px solid; 
FONT-WEIGHT: bold;  
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #ffffff; BORDER-BOTTOM: #efefef 1px solid; 
BACKGROUND-COLOR: #858fbf
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; BORDER-TOP: #e5e5e5 1px solid; 
FONT-WEIGHT: bold; 
BORDER-LEFT: #e5e5e5 1px solid; 
COLOR: #151535; BORDER-BOTTOM: #808a98 1px solid; 
LETTER-SPACING: -1px
}	

input.admin_add_items
{  
color:#055;   
font-family:'trebuchetms',helvetica,sans-serif;   
font-size:84%;   
font-weight:bolder;   
background-color:#fed;    
width :10%;   
border:1px solid;   border-top-color:#7699Cc;   
border-left-color:#7699Cc;   
border-right-color:#7699Cd;   
border-bottom-color:#7699Cc;   filter:progid:DXImageTransform.Microsoft.Gradient   (GradientType=0,StartColorStr='#ffffffff',EndColorStr='#7699Cc');  
}	
	
.style1 
{	
font-family: "Courier New", Courier, mono;	
font-weight: bold;
}

.style2 
{
font-family: "Courier New", Courier,mono
}

</style>
</head>
<body >
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  
<TBODY>    
<TR>      
<TD width=1288 background="images/top.gif"  height=10>
<STRONG><a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT></a>
</STRONG>
</TD>   </TR>       

<TR>      
<TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>      
<DIV align=right>                       
<form name="Form1" method="post" action="" onSubmit="return Blank_TextField_Validator()">          <p>&nbsp;</p>          
<table width="426" border="0" align="center">            
<tr>              
<td width="420"><div align="center"> <font face="Verdana, Arial, Helvetica, sans-serif" >
<font color="#0000FF"><b></b></font></font></div>
</td>            
</tr>          
</table>                 
<TABLE width="65%" height="30%" border=3 align=center cellPadding=3 cellSpacing=0 class=rt id="rt">            
<TBODY>              <TR>                
<TD class=sectionhead align=middle colSpan=2><div align="center">Enter The Account Details Below  !</div>
</TD>        
</TR>              
<TR>                
<TD class=firstalt align=middle width="41%"><div align="left" class="style1">Account Type:</div>
</TD>
<TD class=secondalt align=left><input name="acc_type" type="text"   maxlength="40" size="40" AUTOCOMPLETE="OFF" tabindex="2" >
</TD>              

<TR>               
<TD class=secondalt align=middle><div align="left" class="style2"><B>Minimum Balance :</B><BR>                </div>
</TD>                
<TD class=secondalt align=left><input name="minbalance" type="text"   maxlength="40" size="40" AUTOCOMPLETE="OFF" tabindex="2" >
</TD>              
</TR>                                          
</TBODY>          
</TABLE>          
<div align="center">            
<p>              
<input name="Submit" type="submit" class="admin_add_items" value="Add">&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./admin_acc_view_general.php')" value="Cancel" ></div>        
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