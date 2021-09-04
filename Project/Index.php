<?php
error_reporting(0);
include "ConnectDB.inc";
$xDB=new ConnectDB();
session_start();
$_SESSION['A_ID']="";
$_SESSION['A_LoginName']="";
$_SESSION['Emp_ID']="";
$_SESSION['Emp_Name']="";
if(isset($_POST['btnA_Login']))
{
	$A_LoginName = $_POST['txtA_LoginName'];
	$A_LoginPass = $_POST['txtA_LoginPass'];
//	$DS=$xDB->SELECTDATA("Select A_ID, A_LoginName,A_LoginPass from tbladmin Where A_loginname='".mysql_real_escape_string($A_LoginName)."' and A_LoginPass='".mysql_real_escape_string($A_LoginPass)."'");
		$DS=$xDB->SELECTDATA("Select A_ID, A_LoginName,A_LoginPass from tbladmin Where A_loginname='$A_LoginName' and A_LoginPass='$A_LoginPass'");

		  
	if(mysql_num_rows($DS) > 0)
	{
		$xROW = mysql_fetch_array($DS);
		$_SESSION['A_ID']   = $xROW[0];
		$_SESSION['A_LoginName'] = $xROW[1];
		 echo '<script language="javascript">';
  echo 'alert("Login Success")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=Admin/Home.php';>";

		
	}
	else
	{
 echo '<script language="javascript">';
  echo 'alert("Please Enter Correct UserName and Password")';  //not showing an alert box.
  echo '</script>';
	 }
}
else if(isset($_POST['btnEmp_Login']))
{
	$Emp_LoginName = $_POST['txtEmp_LoginName'];
	$Emp_LoginPass = $_POST['txtEmp_LoginPass'];
	
	
//	$DS1=$xDB->SELECTDATA("Select Emp_ID, Emp_LoginName,Emp_LoginPass,Emp_Name from tblEmployees Where Emp_loginname='".mysql_real_escape_string($Emp_LoginName)."' and Emp_LoginPass='".mysql_real_escape_string($Emp_LoginPass)."'");
	$DS1=$xDB->SELECTDATA("Select Emp_ID, Emp_LoginName,Emp_LoginPass,Emp_Name from tblEmployees Where Emp_loginname='$Emp_LoginName' and Emp_LoginPass='$Emp_LoginPass'");

		  
	if(mysql_num_rows($DS1) > 0)
	{
		$xROW1 = mysql_fetch_array($DS1);
		$_SESSION['Emp_ID']   = $xROW1[0];
		$_SESSION['Emp_Name'] = $xROW1[3];
 echo '<script language="javascript">';
  echo 'alert("Login success!")';  //not showing an alert box.
  echo '</script>';
		echo "<meta http-equiv='Refresh'; Content='0; URL=Employee/Home.php';>";
		
	}
	else
	{
		 echo '<script language="javascript">';
  echo 'alert("Please Enter Correct UserName and Password")';  //not showing an alert box.
  echo '</script>';


	 }
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Blue Pumpkin</title>

	<!-- css stylesheets -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- main file -->
		<link media="screen"  href="css/colorbox/colorbox.css" rel="stylesheet" />
		<link type="text/css" href="css/pepper-grinder/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<link rel="stylesheet" href="js/cusel/css/cusel.css" type="text/css" />
		<link rel="stylesheet" href="css/theme-9.css" type="text/css" media="all" /> <!-- theme file -->
		<link rel="stylesheet" href="css/fonts-1.css" type="text/css" media="all" /> <!-- fonts file -->
	<!-- /css stylesheets -->
	
	<!-- js  files -->
		<script type="text/javascript" src="js/libraries.js"></script> <!-- number used libaries in one file -->
		<script type="text/javascript" src="js/cusel/cusel-min-2.4.1.js"></script> <!-- customize selects -->
		<script type="text/javascript" src="js/custom.js"></script> <!-- custom scripts -->
	<!-- /js  files -->
</head>
<body>
<!-- Fixed header -->
<div>
	<!-- Top Line -->
	<div class="topline fixw">
            	<div class="col_l" >
			<!-- Date -->

			<!-- /Date -->
			<div class="clear" style="height:15px"></div>
            </div>

		<div class="col_c">
			<!-- Logo -->
			<a href="#">
				<img src="Images/logo.jpeg" width="200" height="80" alt="Hotel Inn" id="logo"/>
				<span id="logo_shine"><img src="img/shine.png" width="100" height="116" alt="" /></span>
			</a>
			<!-- /Logo -->
		</div>
        	<div class="col_r" align="right">
			<!-- Date -->
			
			<!-- /Date -->
			<div class="clear" style="height:15px"></div>
            </div>
        
	</div>
	<!-- /Top Line -->
</div>
<!-- /Fixed header -->

<div class="content" style="height:430px;">
	<div class="fixw">
		<div class="one-half" style="margin-left:350px;" >

	        <div class="form">
            		<h2 >Admin Login</h2>
  						<form action="Index.php" method="POST">
                            <table class="table1">
                            	<tr>
                                <td>User Name:</td>
                                	<td><input type="text" class="required halfsize field_name" placeholder="User Name" name="txtA_LoginName" /></td>
                                </tr>
                                	<tr>
                                                                    <td>Password:</td>
                                	<td><input type="password" class="required field_message" style="width:110px;" placeholder="Password" name="txtA_LoginPass" /></td>
                                </tr>
                                	
                                <tr>

                                <Td colspan="2" align="right"><span class="button b5"><input type="submit" value="Login"  name="btnA_Login"></span>  </td>
      
                                </tr>
                                        </table>    
                    	</form>
			</div>
       </div>
		<div class="one-half" style="margin-left:350px;">
				<h2>Employee Login</h2>
                                <div class="form">
						<form action="Index.php" method="POST">

                                            <table class="table1">
                            	<tr>
                                                                <td>User Name:</td>
                                	<td><input type="text" class="required halfsize field_name" placeholder="User Name" name="txtEmp_LoginName" /></td>
                                </tr>
                                	<tr>
                                                                    <td>Password:</td>
                                	<td><input type="password" class="required field_message" style="width:110px;" placeholder="Password" name="txtEmp_LoginPass" /></td>
                                </tr>
                                <tr>
                                <Td colspan="2" align="right"><span class="button b5"><input type="submit" value="Login"  name="btnEmp_Login"></span></td>
      
                                </tr>
                                        </table>    
                                        </form>

</div></div>
		</div>
</div><div class="clear"></div>   

<!--     
<div class="mainmiddle short">
	
	<div class="fixw banners">
    <?php
/*	
	$DS2=$xDB->SELECTDATA("select EW.EW_ID,EW.Emp_ID,EW.E_ID,EMp.emp_id,emp.emp_name,ew_desc from tbleventwinnerdetails EW, tblemployees emp where ew.emp_id=emp.emp_id  order by ew_id desc limit 1 ");

	
	
	for($k=0;$k<mysql_num_rows($DS2);$k++)
	{
			$xROW2 = mysql_fetch_array($DS2);

echo "		<a class='banner' href='theme-9-fonts-1-fixtop-0-page-prices.html'>";
		echo "	<span class='photo'><img height=70 width=100  src='Images/Emp_Img/$xROW2[1].jpeg' /></span>";
echo "			<span class='r'>";
		echo "		<span class='name'>$xROW2[4]</span>";
echo "				<span class='text'>Event Winner<br>$xROW2[5] </span>";
		echo "	</span>";
echo "		</a>";
	}
	
	$DS3=$xDB->SELECTDATA("select EW_ID,Emp_ID,E_ID from tbleventwinnerdetails order by ew_id desc limit 1 ");
	for($l=0;$l<mysql_num_rows($DS3);$l++)
	{
			$xROW3 = mysql_fetch_array($DS3);
	
echo "		<a class='banner last' href='theme-9-fonts-1-fixtop-0-page-news-item.html'>";
		echo "	<span class='photo'><img height=70 width=100  src='Images/logo.jpeg' /></span>";
echo "			<span class='r'>";
		echo "		<span class='name'>UpComing Events</span>";
echo "				<span class='text'>Just win by Logging into our Website</span>";
		echo "	</span>";
echo "		</a>";
	}

	





	*/
?>	</div>


        
        </div>

-->
<!-- Footer -->

<div class="footer">
	<div class="fixw">
		<div class="three-fourth" align="center" style="margin-left:120px;">
			<!-- Social -->
			
			<!-- Footer menu -->			
			<!-- /Footer menu -->
			<div class="clear" style="height:10px"></div>
			<!-- Copyright, address -->
			 &copy; Blue Pumpkin, 2015. Developed By:<b> MUHAMMAD MADNI RAZA</b>
			<!-- /Copyright, address -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- /Footer -->

<!-- Website Developed By Muhammad Madni Raza, FB/Twitter/Gmail/Hotmail @mmr9226 --></body>


</html>