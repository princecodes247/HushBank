<html>
<head>
<title>Create Users</title>
<?php include 'db_connect.php'; 
//Connect mysql database;  

if(isset($_POST['Submit'])) ///forsubmit data           
{		     
$custid=$_POST['custid']; 			 
$authtype=ucwords($_POST['authtype']);			             
$qns=ucwords($_POST['questions']);
$ans=ucwords($_POST['answer']);

$custid_result1=mysql_query("select user_name from login where user_name='".$custid."'");  
while($row1= mysql_fetch_array($custid_result1))
{
$custid_result=$row1[user_name];
}

$question1=mysql_query("select question from login where user_name='".$custid."' ");  
while($row2 = mysql_fetch_array($question1))
{
$question=$row2[0];
}

$answer1=mysql_query("select ans from login where user_name='".$custid."' and question='".$qns."'");  
while($row2 = mysql_fetch_array($answer1))
{
$answer=$row2[0];
}

$type=mysql_query("select user_type from login where user_name='".$custid."' and question='".$qns."' AND ans='".$ans."'");  
while($row = mysql_fetch_array($type))
{
$type1=$row[0];
}

if ($custid_result!=$custid)
{
echo "Invalid User ID, Please try again...";
}
elseif ($qns!=$question)
{
echo "Please select the valid question...";
}
elseif ($answer!=$ans)
{
echo "Invalid Answer, Please try again...";
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
$result = mysql_query("select user_password from login where user_name='".$custid."' and user_type='".$authtype."' AND question='".$qns."' AND ans='".$ans."'"); 
 while($result1 = mysql_fetch_array($result))
{
$password1=$result1[0];
}

$db_close=mysql_close();			 

if($result )			    
{		
echo "<font size=4 color=red><b>Your Current Id &#160;&#160;: </font><font size=5 color=pink>".$custid."</font><br><br>";
echo "<font size=4 color=red>Your Password is  : </font><font size=5 color=pink>".$password1."<br></b></font>";
echo "<p>Click <a href='login.php'> here </a> to add another";
exit(0); //echo "Added To The Database";	
}			 
else			  
{			
echo "Not Maching...";
echo "<p>Click <a href='login.php'> here </a> to go back";
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

</head><body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>  <TBODY>   
<tr>    
<TD width=1288 background="images/top.gif"  height=10>
<STRONG>
<a href='admin_data.php'>
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>Home </FONT>
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

<TD class=secondalt align=left><input type="text" name="custid">
</TD>             


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
<input name="answer" type="password" maxlength="40" size="39" tabindex="3">                
</TD>             
</TR>
<TR>                
<TD class=secondalt align=middle>
<div align="left" class="style2"><B>Authentication Type:</B><BR></div>
</TD> 
               <TD class=secondalt align=left>
<select name="authtype" tabindex=3  AUTOCOMPLETE="ON" tabindex="4" >
<option>Customer</option>
</select></TD> 
             </TR>                                        
</TBODY>          
</TABLE>          
<div align="center"><p><input name="Submit" type="submit" class="admin_add_items" value="Display">&#160;&#160;&#160;&#160;          
<input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="location.replace('./login.php')" value="Cancel" ></div>        
</form>           </DIV>
</TD>    
</TR>  
            
</TR>  
</TBODY>
</TABLE>
</body>
</html>
