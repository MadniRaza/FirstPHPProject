<?php
error_reporting(0);
include "../ConnectDB.inc";
$xDB=new ConnectDB();
	session_start();
	if($_SESSION['A_ID'] == "" || $_SESSION['A_LoginName'] == "")
	{	echo "<meta http-equiv='Refresh'; Content='0; URL=../Index.php';>";	exit;}
	else
	{
		$A_ID = $_SESSION['A_ID'];
		$A_LoginName = $_SESSION['A_LoginName'];
	}
?>


<?php


			// What if user click on Add Employee Button

	if(isset($_GET['Emp_IDFE']))
		{
			
			
			
			$Emp_IDFE=$_GET['Emp_IDFE'];
					$DS=$xDB->SELECTDATA("select * from tblemployees where 			 emp_id='$Emp_IDFE'");

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
			}
		
			
			
		}
		else { echo '<script language="javascript">';
  echo 'alert("No Result Found")';  //not showing an alert box.
  echo '</script>';}
// Editin Employee Details
 if(isset($_POST['btnEdit_EmpDetails'])) 
		{
		$Emp_IDFE_=$_POST['txtEmp_IDFE_'];
		$Emp_Name=$_POST['txtEmp_Name'];
		$Emp_Email=$_POST['txtEmp_Email'];
		$Emp_CNo=$_POST['txtEmp_CNo'];
		$Emp_Address=$_POST['txtEmp_Address'];
		$Emp_LoginName=$_POST['txtEmp_LoginName'];
		$Emp_LoginPass=$_POST['txtEmp_LoginPass'];
		$Emp_Jdate=$_POST['txtEmp_JDate'];
		echo " $Emp_IDFE_ | $Emp_Address | $Emp_CNo | $Emp_Email | $Emp_FName | $Emp_Jdate | $Emp_LName | $Emp_LoginName  |$Emp_LoginPass";
		
		
		//==============Retreiving Image Details==============//
		$I_FN=$_FILES['Emp_Img']['name'];
		$I_FT=$_FILES['Emp_Img']['type'];
		$I_TN=$_FILES['Emp_Img']['tmp_name'];

		//Updating Employee Details in  Database 
		$xDB->DMLCOMMANDS("update tblemployees set Emp_Name='$Emp_Name',Emp_Email='$Emp_Email',Emp_CellNo='$Emp_CNo',Emp_Address='$Emp_Address',Emp_Loginname='$Emp_LoginName',Emp_LoginPass='$Emp_LoginPass' where emp_id='$Emp_IDFE_' ");
					
		// Saving New Image in to Directory
		
					$EXT=substr($I_FT,6,strlen($I_FT));
					$LOC="$Emp_IDFE_".".".".jpeg";
					move_uploaded_file($I_TN,"../Images/Emp_Img/$LOC");	
		
		 echo '<script language="javascript">';
  echo 'alert("Profile Edited SuccessFully")'; 
  echo '</script>';

		
		}
		
		




 ?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Employee Details | Blue Pumpkin</title>

	<!-- css stylesheets -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- main file -->
		<link media="screen"  href="../css/colorbox/colorbox.css" rel="stylesheet" />
		<link type="text/css" href="../css/pepper-grinder/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<link rel="stylesheet" href="../js/cusel/css/cusel.css" type="text/css" />
		<link rel="stylesheet" href="../css/theme-9.css" type="text/css" media="all" /> <!-- theme file -->
		<link rel="stylesheet" href="../css/fonts-1.css" type="text/css" media="all" /> <!-- fonts file -->
	<!-- /css stylesheets -->
	
	<!-- js  files -->
		<script type="text/javascript" src="../js/libraries.js"></script> <!-- number used libaries in one file -->
		<script type="text/javascript" src="../js/cusel/cusel-min-2.4.1.js"></script> <!-- customize selects -->
		<script type="text/javascript" src="../js/custom.js"></script> <!-- custom scripts -->
	<!-- /js  files -->
  <script language="javascript">
    function check()
{

 if(document.form1.txtEmp_Name.value=="")
  {
    alert("Plese Enter Employee's Name");
	document.form1.txtEmp_Name.focus();
	return false;
  }
 
else if(document.form1.txtEmp_Email.value=="")
  {
    alert("Plese Enter Employee's Email");
	document.form1.txtEmp_Email.focus();
	return false;
  } 
else  if(document.form1.txtEmp_Address.value=="")
  {
    alert("Plese Enter Employee's Address");
	document.form1.txtEmp_Address.focus();
	return false;
  }

else  if(document.form1.Emp_Img.value=="")
  {
    alert("Plese Upload Employee's Image");
	document.form1.Emp_Img.focus();
	return false;
  }
    else  if(document.form1.txtEmp_CNo.value=="")
  {
    alert("Plese Enter Employee's Cell No");
	document.form1.txtEmp_CNo.focus();
	return false;
  }

else  if(document.form1.txtEmp_LoginName.value=="")
  {
    alert("Plese Enter Employee's Login Name");
	document.form1.txtEmp_LoginName.focus();
	return false;
  }
  else  if(document.form1.txtEmp_JDate.value=="")
  {
    alert("Plese Enter Employee's Joining Date");
	document.form1.txtEmp_JDate.focus();
	return false;
  }

else  if(document.form1.txtEmp_LoginPass.value=="")
  {
    alert("Plese Enter Employee's Login Password");
	document.form1.txtEmp_LoginPass.focus();
	return false;
  }
  else {
  return true;}
  }
</script>
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
			<a href="theme-9-fonts-1-fixtop-0-index.html">
				<img src="../Images/logo.jpeg" width="373" height="116" alt="Hotel Inn" id="logo"/>
				<span id="logo_shine"><img src="../img/shine.png" width="100" height="116" alt="" /></span>
			</a>
			<!-- /Logo -->
		</div>
        	<div class="col_r" align="right">
			<!-- Date -->
			Welcome <?php echo "$A_LoginName &nbsp; | &nbsp; <a href='../Index.php'>Log Out</a>"  ?>
			<!-- /Date -->
			<div class="clear" style="height:15px"></div>
            </div>
        
	</div>
	<!-- /Top Line -->
	
	<!-- Menu -->
	<div class="menuline">
		<div class="fixw">
        			<ul class="menu">
	
				<li>
					<a href="#">Home<span>blue Pumpkin</span></a>
				</li>
				<li>
					<a href="#">Employee<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="Add_Emp.php">Add New Employee</a></li>
						<li>
							<a href="#">View Employee Details</a>
							<ul>
								<li><a href="View_EmpByID.php">View By ID</a></li>
								<li><a href="View_EmpDetails.php">View All</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Event<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="Add_Event.php">Add New Event/Event Category</a></li>
						<li>
							<a href="#">View Events Details/Add Event Winner</a>
							<ul>
								<li><a href="View_EventsByEC.php">View By Event Category</a></li>
								<li><a href="View_EventsByED.php">View By Event Date</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Event Winner<span>View/Edit/Delete</span></a>
					<ul>
						<li><a href="View_EventWinnerByEC.php">View By Event Category</a></li>
              		<li><a href="View_EventWinnerByED.php">View By Event Date</a></li>
					</ul>
				</li>
                
				<li>
					<a href="View_EventRequests.php">Paritipants Requests<span>Accept/Deny Requests</span></a>
				</li>
				<li>
					<a href="Faqs.php">FAQ's<span>FAQ's</span></a>
				</li>
			</ul>

		</div>
	</div>
	<!-- /Menu -->
</div>
<!-- /Fixed header -->

<div class="content" style="height:360px;">

<h1 align="center">Edit Employee's Profile</h1>
<form action="Edit_EmpDetails.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();">

<table  class="table1" align="center">
	<tr>
    	<td><label>Employee ID:</label></td>
        <td><input type='text'  name="txtEmp_IDFE_" readonly value='<?php echo $xROW[0]; ?>' class="required halfsize field_name"></td>
	</tr>
	<tr>
    	<td><label>Employee  Name:</label></td>
        <td><input type="text" name="txtEmp_Name" pattern="[A-Za-z ]{3,20}" value='<?php echo $xROW[1]; ?>' class="required field_name"></td>
    	<td><label>Email:</label></td>
        <td><input type="email" name="txtEmp_Email" value='<?php echo $xROW[2]; ?>' class="required field_email"></td>
        </tr>
        <Tr>
            	<td><label>Address:</label></td>
        <td><textarea rows="2" cols="15" class="required field_message"  name='txtEmp_Address'><?php echo $xROW[4]; ?></textarea></td>
    	<td><label>Image</label>
      <?php		echo "<td><img src='../Images/Emp_Img/$xROW[5].jpeg' height=50 width=50>"; ?>
    	
        <input type="file" name="Emp_Img" value='<?php echo $xROW[5]; ?>' accept="image/png, image/gif, image/jpeg">
         </td>

    	
        </Tr>
        <tr>
            <td><label>Cell No:</label></td>
        <td><input type="text" name="txtEmp_CNo" pattern="[0-9-()]{11,20}" value='<?php echo $xROW[3]; ?>' class="required field_phone"></td>
    	<td><label>Login Name</label></td>
        <td><input type="text" class="required field_name" name="txtEmp_LoginName" pattern="[A-Za-z0-9]{3,10}" value='<?php echo $xROW[6]; ?>'></td>

         </tr>
    
    <tr>
    	<td><label>Joining Date</label></td>
        <td><input type="text" name="txtEmp_JDate" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}"  value='<?php echo $xROW[8]; ?>' class="required field_message"></td>
                    	<td><label>Password</label></td>
        <td><input type="text" name="txtEmp_LoginPass"  class="required field_name" pattern="[A-Za-z0-9]{3,10}" value='<?php echo $xROW[7]; ?>' ></td>

        </tr>
        <tr>
                <td colspan="4" align="right"><span class="button b1"><input type="submit" value="Edit" name="btnEdit_EmpDetails"></span></td>


	</tr>
</table>
</form>
</div><div class="clear"></div>
<!-- Footer -->

<!-- Footer -->
<div class="footer">
	<div class="fixw">
		<div class="three-fourth">
			<!-- Social -->
			
			<!-- Footer menu -->			
			<ul class="footermenu">
		
				<li><a href="Faqs.php">FAQ's</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
							</ul>
			<!-- /Footer menu -->
			<div class="clear" style="height:10px"></div>
			<!-- Copyright, address -->
			 &copy; Blue Pumpkin, 2015. 
			<!-- /Copyright, address -->
		</div>
		<div class="one-fourth last" style="text-align:right">
			<!-- Footer logo -->
			<a href="" height="58" /></a>
			<!-- /Footer logo -->
			<div class="clear" style="height:10px"></div>
			<!-- Social -->
			Follow us:<a href="http://www.twitter.com/mmr9226" class="follow_icon twitter"></a><a href="http://www.facebook.com/mmr9226" class="follow_icon facebook"></a><br>

			<!-- /Social -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- /Footer -->

<!-- Website Developed By Muhammad Madni Raza, FB/Twitter/Gmail/Hotmail @mmr9226 --></body>


</html>