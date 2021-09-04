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


	if(isset($_GET['Emp_IDFD']))
			{
		
			$Emp_IDFD=$_GET['Emp_IDFD'];
			
			if(!empty($Emp_IDFD)){
			$xDB->DMLCOMMANDS("delete from tblemployees where emp_id='$Emp_IDFD'");
		echo "Employee Profile Has been Deleted";			
			}
			else
			{
		 echo '<script language="javascript">';
  echo 'alert("Please Enter Employee ID")';  //not showing an alert box.
  echo '</script>';
				
				}
		}


		
 ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Employee Details By ID | Blue Pumpkin</title>

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
	
 
	 if(document.form1.txtEmp_ID.value=="")
	 {
    alert("Plese Enter Employee's ID");
	document.form1.txtEmp_ID.focus();
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
						<li><a href="Add_Emp.php">Add New Employee</a></li>
						<li>
							<a href="#">View Employee Details</a>
							<ul>
//								<li><a href="#">View By ID</a></li>
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

<div class="content">

		




<!--View EMployee Details By Their ID-->
<div class="form" align="center">
<form method="GET" action="View_EmpByID.php" onSubmit="return check();" name="form1" >
<table border="1" cellpadding="5" cellspacing="5" class="table1" style="margin-left:100px;">
	<tr>
    	<td><label>Enter Employee ID:</label></td>
        <td><input type="text" placeholder="Employee ID" name="txtEmp_ID" class="required halfsize field_message" pattern="[0-9]{1,3}"></td>
	</tr>
    <tr>
        <td align="right" colspan="2"><span class="button b1"><input type="submit" value="View" name="btnView_Emp"></span></td>
	</tr>
</table>
</form>



</div>
<?php

try{

	if(isset($_GET['btnView_Emp']))  
		{
		$Emp_ID=$_GET['txtEmp_ID'];
		//==============Retreiving Image Details==============//
		$DS=$xDB->SELECTDATA("select * from tblemployees where emp_id='$Emp_ID'");
		
		if(mysql_num_rows($DS)>0)
		{

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
			}
		}
		else{
			
			 echo '<script language="javascript">';
  echo 'alert("No Result Found")';  //not showing an alert box.
  echo '</script>';
			
			 

		}
			
			
		}
		
}
catch(Exception $ex)
{
	echo ''.$ex->getMessage();
	
	}
		
?>		


	<div class="form" align="center">
<h1 style="margin-left:50px;">Employee Profile</h1>
<form enctype="multipart/form-data"   >
<table  class="table1" style="margin-left:100px;">
	<tr>
    	<td><label>Employee ID:</label></td>
        <td><input type='text' id="txtEmp_IDFE_" name="txtEmp_IDFE_" class="required halfsize field_name"  readonly value='<?php echo $xROW[0]; ?>' ></td>
	</tr>

	<tr>
    	<td><label>Employee  Name:</label></td>
        <td><input type="text" name="txtEmp_Name" class="required  field_name" value='<?php echo $xROW[1]; ?>' readonly> </td>



    	<td><label>Email:</label></td>
        <td><input type="email" name="txtEmp_Email" class="required field_email" value='<?php echo $xROW[2]; ?>' readonly></td></tr><tr>
    	<td><label>Cell No:</label></td>
        <td><input type="text" name="txtEmp_CNo" class="required  field_phone" value='<?php echo $xROW[3]; ?>' readonly></td>



    	<td><label>Address:</label></td>
        <td><textarea rows="2" cols="15" name="txtEmp_Address" class="required field_message" readonly><?php echo $xROW[4]; ?></textarea></td>
	
</tr>
<tr>

	
    	<td><label>Image</label></td>
        <td><?php echo "<a href='Resize_Emp_Img.php?Emp_IDTVP=$xROW[0]' rel='colorbox'><img src='../Images/Emp_Img/$xROW[5].jpeg' height=100 width=100></a>"; ?></td>

    
    	<td><label>Login Name</label></td>
        <td><input type="text" name="txtEmp_LoginName" class="required  field_name" value='<?php echo $xROW[6]; ?>' readonly> </td></tr><tr>
    	<td><label>Password</label></td>
        <td><input type="text" name="txtEmp_LoginPass" class="required  field_name" value='<?php echo $xROW[7]; ?>' readonly>
</td>        

    
    

    	<td colspan="1"><label>Joining Date</label></td>
        <td><input type="text"  name="txtEmp_JDate" class="required  field_name" value='<?php echo $xROW[8]; ?>' readonly></td>
</tr><tr>
        <td align="right" colspan="4"><?php	echo "<a class='button b7' href='View_EmpByID.php?Emp_IDFD=$xROW[0]'>Delete Profile</a>"; ?> 
        
        
                <?php 	echo "<a class='button b5' href='Edit_EmpDetails.php?Emp_IDFE=$xROW[0]'>Edit</a>"; ?> </span></td>

              
	</tr>
   
</table>
</form>
</div>

</div><div class="clear"></div>
<!--Displaying Employee Details by Employee ID-->

	
	
	



 

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