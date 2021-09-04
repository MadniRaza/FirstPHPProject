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

	if(isset($_GET['E_IDTAW']))
		{
			$E_IDTAW=$_GET['E_IDTAW'];
					$DS=$xDB->SELECTDATA("select * from tblevents where	 e_id='$E_IDTAW'");
					
					if(mysql_num_rows($DS)>0)
			{
			

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
			}
		}
		else	
			{		 echo '<script language="javascript">';
  echo 'alert("No Results Found")';  //not showing an alert box.
  echo '</script>';}
		}
// Editing Event Details
 if(isset($_POST['btnAdd_EventWinnerDetails'])) 
		{
		
		$E_IDTAW_=$_POST['txtE_IDTAW'];
		$Emp_ID=$_POST['txtEmp_ID'];
		$EW_Desc=$_POST['txtEW_Desc'];


		$DS1=$xDB->SELECTDATA("select * from tbleventwinnerdetails where e_id='$E_IDTAW' and emp_id='$Emp_ID'");
		if(mysql_num_rows($DS1)>0)
		{
			 echo '<script language="javascript">';
  echo 'alert("This Employee has already been added as a winner of this Event")';  //not showing an alert box.
  echo '</script>';
			
			}
		
		else
{
						$DS2=$xDB->SELECTDATA("insert into tbleventwinnerdetails values ('','$Emp_ID','$EW_Desc','$E_IDTAW_')");
		

			 echo '<script language="javascript">';
  echo 'alert("Event Winner Added Successfully")';  //not showing an alert box.
  echo '</script>';
}
			}
			
		
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add event Winner Details | Blue Pumpkin</title>

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
    <script>
        function check()
{

 if(document.form1.txtEmp_ID.value=="")
  {
    alert("Please Enter Winner ID");
	document.form1.txtEmp_ID.focus();
	return false;
  }
 
else if(document.form1.txtEW_Desc.value=="")
  {
    alert("Please Enter Description");
	document.form1.txtEW_Desc.focus();
	return false;
  } 
else  
  {
	return true;
  }}

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

<div class="content" style="height:350px;">
<div class="form" align="center">
<h1>Add Event Event Winner Details</h1>
<form action="Add_EventWinnerDetails.php" method="post" enctype="multipart/form-data" onSubmit="return check();" name="form1">

<table border="1" cellpadding="5" cellspacing="5" class="table1">
<tr>
    	<td><label>Event ID:</label></td>
        <td><input type='text'  name="txtE_IDTAW" class="field_message" readonly value='<?php echo $xROW[0]; ?>'></td>
	</tr>
	<tr>
    	<td><label>Employee ID:</label></td>
        <td><input type="text" name="txtEmp_ID" class="field_message" pattern="[0-9]{1,4}" > </td>
	</tr>
    	<tr>
    	<td><label>Description</label></td>
        <td><textarea rows="5" name="txtEW_Desc" class="field_message" required></textarea></td>
	</tr>


    <tr>
        <td colspan="2" align="right"><span class="button b5"><input type="submit" value="Add Winner" name="btnAdd_EventWinnerDetails"></span></td>
	</tr>
</table>
</form>
</div></div><div class="clear"></div>


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