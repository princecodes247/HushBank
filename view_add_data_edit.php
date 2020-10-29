<?php
session_start();

if(isset($_SESSION['username']))
{
?>
<?php 
      include 'db_connect.php';

       $user_index=$_GET['user_index']; 
       $result = mysql_query("Select * from users where user_index='$user_index'",$link) or die("Database Error");
                 


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
	width: 99%;
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
.style6 {
	color: #FFFFFF;
	font-size: 14px;
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
       <div align="center"><form name="form1" method="post" action="temp.php">
         <p>&nbsp;</p>
         <table width="98%" border="0" cellpadding="2" cellspacing="1" class="man_auth">
           <tr>
             <th colspan="2"><span class="style6">Edit Added Users Information </span></th>
             </tr>
           <tr><?php  while ( $user = mysql_fetch_array( $result ))
	                {                            
	                  $user_f_name=$user['u_first_name'];
					  $user_l_name=$user['u_last_name'];
					  $user_email=$user['u_email'];
					  $user_country=$user['u_country'];
					  
$user_age=$user['u_age'];
					  $user_rate=$user['u_rate'];
					  $user_comments=$user['u_comments'];

					  
					  
	                 }
?>
             <td width="19%"><div align="left">User First Name : </div></td>
             <td width="81%"><div align="left">
               <input name="user_f_name" type="text" value="<?php echo $user_f_name ;?>" size="40" maxlength="38">
             </div></td>
           </tr>
           <tr>
             <td><div align="left">User Last Name : </div></td>
             <td><div align="left">
               <input name="last_name" type="text" id="last_name3" size="37" maxlength="35" value="<?php echo $user_l_name;?>">
             </div></td>
           </tr>
           <tr>
             <td> <div align="left">Email Address : </div></td>
             <td><div align="left">
               <input name="email" type="text" id="email3" size="30" maxlength="30" value="<?php echo $user_email;?>">
             </div></td>
           </tr>
           <tr>
             <td><div align="left">Country : </div></td>
             <td><div align="left">
               <input name="country" type="text" id="country3" size="37" maxlength="35" value="<?php echo $user_country;?>">
             </div></td>
           </tr>
           <tr>
             <td><div align="left">Age : </div></td>
             <td><div align="left">
               <input name="country2" type="text" id="country4" size="37" maxlength="35" value="<?php echo $user_age;?>">               
             </div></td>
           </tr>
           <tr>
             <td><div align="left">Rating : </div></td>
             <td><div align="left">
               <input name="country22" type="text" id="country22" size="37" maxlength="35" value="<?php echo $user_rate;?>">               
             </div></td>
           </tr>
           <tr>
             <td><div align="left">Comments : </div></td>
             <td><div align="left">
               <input name="comments" type="text" id="comments" value="<?php echo $user_comments; ?>" size="80" maxlength="80">
             </div></td>
           </tr>
         </table>
         <p>
           <input type="hidden" name="hdd_user_index" value="<?php print($user_index);?>">
</p>
         <p>
           <input name="Submit2" type="button" class="admin_add_items" id="Submit2" onClick="history.back()" value="Back" >
           <input name="Submit" type="submit" class="admin_add_items" value="Submit">
         </p>
        </form>
        <p>&nbsp;</p>
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
