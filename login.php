<?php
session_start();
?>


<?php 

include 'db_connect.php';	  
$result=" ";
$_SESSION[tp] =$type;
if (isset($_POST['Submit']))
{

	$username = $_POST['username'];
	$password = $_POST['password'];	
	$result = mysql_query("Select * From login where user_name='$username'",$link);
	$count=mysql_num_rows($result);
	if ($count==0)
	{
		$msg="Username Does Not Exists...";
	}
	else
	{
		while($row = mysql_fetch_array($result, MYSQL_BOTH))
		{
          	$usr_pwd=$row['user_password'];
	  		$type=$row['user_type'];
	       		if($usr_pwd!=$password ) 
			{
				$msg="Incorrect Password...";
		                  }			
			else
			{
			
				if($type=='Customer')
				{
					$_SESSION['username']=$username;
					include "cust_data.php";
					exit(0);
				
				}
				
				else
				{
					
					$_SESSION['username']="Administrator";
					include "admin_data.php";
					exit(0);

				}
			} 							   
		}
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">



.firstalt 
{
BORDER-RIGHT: #808a98 1px solid; BORDER-TOP: #e5e5e5 1px solid;  BORDER-LEFT: #e5e5e5 1px solid; COLOR: #000000; BORDER-BOTTOM: #808a98 1px solid; BACKGROUND-COLOR: #e7ebef
}

.secondalt 
{
BORDER-RIGHT: #808a98 1px solid; BORDER-TOP: #e5e5e5 1px solid; BORDER-LEFT: #e5e5e5 1px solid; COLOR: #000000; BORDER-BOTTOM: #808a98 1px solid; BACKGROUND-COLOR: #d6dbde
}

.sectionhead 
{
BORDER-RIGHT: #808a98 1px solid; BORDER-TOP: #efefef 1px solid; FONT-WEIGHT: bold;  BORDER-LEFT: #e5e5e5 1px solid; COLOR: #ffffff; BORDER-BOTTOM: #efefef 1px solid; BACKGROUND-COLOR: #858fbf
}

.style15 
{
	font-family: Verdana;
	font-size: 14px;
	color: #0033CC;
}

.tblhead 
{
BORDER-RIGHT: #808a98 1px solid; BORDER-TOP: #e5e5e5 1px solid; FONT-WEIGHT: bold; BORDER-LEFT: #e5e5e5 1px solid; COLOR: #151535; BORDER-BOTTOM: #808a98 1px solid; LETTER-SPACING: -1px
}

.style16 
{
	font-size: 14px;
	font-weight: bold;
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

</style>
</head>

<body>
<p align="center">
<img src="image/bank.jpg" width="1086" height="157" > </p>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
<TBODY>
<TR>
<TD width=1288 height=10><STRONG><FONT face="Verdana, Arial, Helvetica, sans-serif" 
       size=2><a href="index.php"><font size="2"><STRONG><B><FONT face="Verdana, Arial, 	Helvetica, sans-serif" ><FONT 
      >Home</FONT></FONT></B></STRONG></font></a></FONT></STRONG></TD>
</TR>
<TR>
<TD  width=738 height=190>      <DIV align=right>        
<form name="form1" method="POST" action="">
       
          <br>
          <table width="288" border="0" align="center">
            <tr>
              <td width="256"><b><font color=red><?php if ($result) { echo $msg;}?></b></font></td>
            </tr>
          </table>
          <br>
          <TABLE width="45%" height="30%" border=4 align=center cellPadding=5 cellSpacing=0 t id="rt">
            <TR>
              <TD class=tblhead align=middle colSpan=2><div align="center" class="style15"> Login </div></TD>
            </TR>
            <TBODY>
              <TR>
                <TD class=sectionhead align=middle colSpan=2><div align="center">Enter your username and password below!</div></TD>
              </TR>
              <TR>
                <TD class=firstalt align=middle width="33%"><span class="style16">Username :</span></TD>
                <TD width="67%" align=left class=firstalt>
				<input name="username" type="text"  id="username"  maxlength="20" size="34" tabindex="1">
                </TD>
              </TR>
              <TR>
                <TD class=secondalt align=middle><span class="style16">Password :</span><BR>
                </TD>
                <TD class=secondalt align=left>
				<input name="password" type="password"  id="password2"  maxlength="20" size="34" AUTOCOMPLETE="OFF" tabindex="2" ></TD>
              </TR></TBODY></TABLE>
<p align=center><font color=red><b>Forgotten Password ? </b> <a href='forgotten.php'>
<b>Click here..</b>.</a></font></p>
          <p align="center">
        <input name="Submit" type="submit" class="admin_add_items" value="Submit">
</p>
          <p align="center">&nbsp;              </p>
        </form>
    
        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
      </DIV></TD>
    </TR>
</TBODY>
</TABLE>

</body>
</html>
