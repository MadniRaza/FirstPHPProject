<?php
error_reporting(0);
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
include "../ConnectDB.inc"; // including Database Connection File
$xDB=new ConnectDB(); // Making object of database Connection File
			// What if user click on Add Employee Button3
	if(isset($_POST['btnAdd_Emp'])) 
		{

		$Emp_Name=$_POST['txtEmp_Name'];
		$Emp_Email=$_POST['txtEmp_Email'];
		$Emp_CNo=$_POST['txtEmp_CNo'];
		$Emp_Address=$_POST['txtEmp_Address'];
		$Emp_LoginName=$_POST['txtEmp_LoginName'];
		$Emp_LoginPass=$_POST['txtEmp_LoginPass'];
		$Emp_Jdate=$_POST['txtEmp_JDate'];
//		echo "$A_Address | $A_CNo | $A_Email | $A_FName | $A_Jdate | $A_LName | $A_LoginName  |$A_LoginPass";
		
		
		//==============Retreiving Image Details==============//
		$I_FN=$_FILES['Emp_Img']['name'];
		$I_FS=$_FILES['Emp_Img']['size']/1024;
		$I_FT=$_FILES['Emp_Img']['type'];
		$I_TN=$_FILES['Emp_Img']['tmp_name'];

		//Inserting Admin Details in to Database without Picture
		$xDB->DMLCOMMANDS("insert into tblemployees(Emp_ID,Emp_Name,Emp_Email,Emp_CellNo,Emp_Address,Emp_LoginName,Emp_LoginPass,Emp_JDate) values('','$Emp_Name','$Emp_Email','$Emp_CNo','$Emp_Address','$Emp_LoginName','$Emp_LoginPass','$Emp_Jdate'); ");
			//Updating Data to Give Picture id To user
	$DS=$xDB->SELECTDATA("select Emp_id from tblemployees order by Emp_id desc");
	$xRow=mysql_fetch_array($DS);
	$Emp_ID=$xRow[0];
	$xDB->DMLCOMMANDS("update tblemployees set Emp_img=".$Emp_ID." where Emp_id=".$Emp_ID."");			
		// Saving Image in to Directory
					$EXT=substr($I_FT,6,strlen($I_FT));
					$LOC="$Emp_ID"."."."jpeg";
					move_uploaded_file($I_TN,"../Images/Emp_Img/$LOC");	
			
			
			
		 echo '<script language="javascript">';
  echo 'alert("Profile Created SuccessFully")'; 
  echo '</script>';

		}
		
		
		




 ?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Employee's profile | Blue Pumpkin</title>

	<!-- css stylesheets -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- main file -->
		<link media="screen"  href="../css/colorbox/colorbox.css" rel="stylesheet" />
		<link type="text/css" href="../css/pepper-grinder/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<link rel="stylesheet" href="../js/cusel/css/cusel.css" type="text/css" />
		<link rel="stylesheet" href="../css/theme-9.css" type="text/css" media="all" /> <!-- theme file -->
		<link rel="stylesheet" href="../css/fonts-1.css" type="text/css" media="all" /> <!-- fonts file -->
	<!-- /css stylesheets -->
	<style type="text/css">

	
	</style>
	<!-- js  files -->
		<script type="text/javascript" src="../js/libraries.js"></script> <!-- number used libaries in one file -->
		<script type="text/javascript" src="../js/cusel/cusel-min-2.4.1.js"></script> <!-- customize selects -->
		<script type="text/javascript" src="../js/custom.js"></script> <!-- custom scripts -->
	<!-- /js  files -->
    
    <!--Validation-->
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
					<a href="Home.php">Home<span>blue Pumpkin</span></a>
				</li>
				<li>
					<a href="#">Employee<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="#">Add New Employee</a></li>
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

<div class="content" style="height:340px;">

		

	<div class="form">
 <h1 align="center">Create Employee's Profile</h1>
<form enctype="multipart/form-data"  method="post" action="Add_Emp.php" name="form1" onSubmit="return check();" >
<table  class="table1" align="center">
	<tr>
    	<td><label class="lblStyle">Employee Full Name:</label></td>
        <td><input type="text" name="txtEmp_Name" class="required field_name" pattern="[A-Za-z ]{3,20}" ></td>
        <td><label>Email:</label></td>
        <td><input type="email" name="txtEmp_Email" class="required halfsize field_email" ></td>
	</tr>
   	<tr>
    <td><label>Address:</label></td>
    <td><textarea rows="2" cols="15" name="txtEmp_Address" class="required field_message" ></textarea></td>
   	<td><label>Image</label></td>
     <td><input type="file" name="Emp_Img" accept="image/png, image/gif, image/jpeg" /></td>

        </tr>
<tr>

    	

    	<td><label>Cell No:</label></td>
        <td><input type="text" name="txtEmp_CNo" class="required  field_phone" pattern="[0-9-()]{11,20}" ></td>
       	<td><label>Login Name</label></td>
        <td><input type="text" name="txtEmp_LoginName" class="required halfsize field_name" pattern="[A-Za-z0-9]{3,10}"></td>
</tr>
   <tr>
    	<td><label>Joining Date</label></td>
        <td><input type="text" placeholder="Format (dd-mm-yy)" name="txtEmp_JDate" class="required one-half field_name" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}"></td>    
    	<td><label>Password</label></td>
        <td><input type="password" name="txtEmp_LoginPass" class="required halfsize field_name" pattern="[A-Za-z0-9]{3,10}"></td>
	</tr>
    
    <tr>

        <td colspan="4" align="right"><span class="button b5"><input type="submit" value="Create" name="btnAdd_Emp"  ></span></td>
	</tr>
</table>



</form>
</div></div>
<div class="clear"></div>
<!-- Footer -->
<hr>
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