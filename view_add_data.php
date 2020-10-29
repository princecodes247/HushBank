<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?php 
      include 'db_connect.php';

       $result = mysql_query("Select * from users order by  date desc",$link) or die("Database Error");


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to My Website</title>
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
.man_auth{ 
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
	width: 50%;
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

.tellerr_bar{color: #0066CC;
	background-color: #0000CC;
	border-top-color: #0000CC;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: double;
	border-right-style: double;
	border-bottom-style: double;
	border-left-style: double;
	border-right-color: #0000CC;
	border-bottom-color: #0000CC;
	border-left-color: #0000CC;
	height: 1%;
	width: 99%;
	margin-top: -1px;
	margin-right: 1px;
	margin-bottom: 1px;
	margin-left: -5px;
	padding-top: 1px;
	padding-right: 1px;
	padding-bottom: 1px;
	padding-left: 1px;
	text-indent: 2px;	
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-color: #333366;	
	}
	-->
	
	input.admin_add_items
{  color:#055;
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
.style4 {color: #FFFFFF; font-weight: bold; }
.style5 {
	font-size: 14px;
	font-weight: bold;
}
</style>

</head>

<body>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
  <TBODY>
    <TR>
      <TD width=1288 background="images/top.gif"  height=10><STRONG><FONT face="Verdana, Arial, Helvetica, sans-serif" 
      color=#ffffff size=2>Member Login </FONT></STRONG></TD>
    </TR>
    <TR>
      <TD width=738 background="images/top_2.gif"  height=9><div align="justify"><STRONG><FONT face="Verdana, Arial, Helvetica, sans-serif" 
      color=#ffffff size=2>Home</FONT></STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2><strong>| </strong></FONT><a href="add_data.php"><font size="2"><STRONG><B><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff><FONT 
      color=#ffffff>Sign Up</FONT></FONT></B></STRONG></font></a><font size="2"><STRONG><B><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff> </FONT><FONT 
      face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>|View My Address Book </FONT></B></STRONG></font></div></TD>
    </TR>
    <TR>
      <TD style="BORDER-BOTTOM: #e5e5e5 5px solid" width=738 bgColor=#e5e5e5 height=190>
      <DIV align=right>        
        <p>&nbsp;</p>
       <div align="center">
        <table width="60%" border="0" align="center" class="man_auth">
          <tr>
            <td width="310"><span class="style5">View MY Address Book</span></td>
            </tr>
          <tr><?php 	 while($row = mysql_fetch_array($result, MYSQL_BOTH)){
?>
            <td height="20" colspan="3"><div align="left"><span class="style4">First Name :</span> <?php echo $row['u_first_name'];?></div></td>
            </tr>
          <tr>
            <td><div align="left"><span class="style4">Last Name : </span><?php echo $row['u_last_name'];?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">E - mail : </span><?php echo $row['u_email'];?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Country : </span><?php echo $row['u_country'];?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Age : </span><?php echo $row['u_age'];?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Rate :</span><?php echo $row['u_rate'];?></div></td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4"> Date :</span>                  <?php $Date=$row['date'];
	      echo (substr($Date,6,2)).'-';
		echo (substr($Date,4,2)).'-';
		echo (substr($Date,0,4)); ?>
            </div></td>
          </tr>
          <tr>
            <th>&nbsp;</th>
          </tr>
          <?php  }?>
        </table>
        <p>&nbsp;</p>
        <p>
          <input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick= "javascript:history.back();" value="Back" >
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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
