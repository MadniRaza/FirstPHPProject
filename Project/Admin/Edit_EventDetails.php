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

	if(isset($_GET['E_IDFE']))
		{
			$E_IDFE=$_GET['E_IDFE'];
					$DS=$xDB->SELECTDATA("select * from tblevents where	 e_id='$E_IDFE'");

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
			}
		}
	else { echo '<script language="javascript">';
  echo 'alert("No Result Found")';  //not showing an alert box.
  echo '</script>';}
// Editing Event Details
 if(isset($_POST['btnEdit_EventDetails'])) 
		{
		$E_IDFE_=$_POST['txtE_IDFE_'];
		$E_Name=$_POST['txtE_Name'];
		$E_Date=$_POST['txtE_Date'];
		$E_CName=$_POST['cmbE_CName'];
		$E_Desc=$_POST['txtE_Desc'];
			//Retreving Selected Event Category ID

		
			$DS2=$xDB->SELECTDATA("select EC_Id from tbleventsCategory where EC_Name='$E_CName'");
	$xRow1=mysql_fetch_array($DS2);
	$E_CID=$xRow1[0];

		//		Updating event details
		$xDB->DMLCOMMANDS("update tblevents set E_Name='$E_Name', E_Date='$E_Date',E_Desc='$E_Desc',EC_ID='$E_CID' where e_id='$E_IDFE_'");
		
		
			$I_FN=$_FILES['E_Img']['name'];

		$I_FT=$_FILES['E_Img']['type'];
		$I_TN=$_FILES['E_Img']['tmp_name'];

					$EXT=substr($I_FT,6,strlen($I_FT));
					$LOC="$E_IDFE_"."."."jpeg";
					move_uploaded_file($I_TN,"../Images/E_Img/$LOC");	

 echo '<script language="javascript">';
  echo 'alert("Event Details Has Been Edited Successfully")';  //not showing an alert box.
  echo '</script>';
		
		
		
		
		
		

		

			}
		
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Event Details</title>

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

 if(document.form1.txtE_Name.value=="")
  {
    alert("Plese Enter Event name");
	document.form1.txtE_Name.focus();
	return false;
  }
  else  if(document.form1.txtE_Date.value=="")
  {
    alert("Please Enter Event Date");
	document.form1.txtE_Date.focus();
	return false;
  }
 
else  if(document.form1.txtE_Desc.value=="")
  {
    alert("Please Enter Event Description");
	document.form1.txtE_Desc.focus();
	return false;
  }
 
else  if(document.form1.E_Img.value=="")
  {
    alert("Plese upload Event Image");
	document.form1.E_Img.focus();
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
<div class="content">
<div class="form" align="center">
<h1>Edit Event Details</h1>
<form action="Edit_EventDetails.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();">

<table border="1" cellpadding="5" cellspacing="5" class="table1">
<tr>
    	<td><label>Event ID:</label></td>
        <td><input type='text'  name="txtE_IDFE_" class="field_message"  readonly value='<?php echo $xROW[0]; ?>'></td>
	</tr>
	<tr>
    	<td><label>Event Name:</label></td>
        <td><input type="text" name="txtE_Name" class="required field_message" pattern="[A-Za-z ]{3,50}" value='<?php echo $xROW[1]; ?>'></td>
	</tr>
	<tr>
    	<td><label>Event date:</label></td>
        <td><input type="text" name="txtE_Date" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}" class="required field_message" value='<?php echo $xROW[2]; ?>'></td>
	</tr>
    <tr>
    	<td><label>Event Description:</label></td>
        <td><textarea rows="4" name="txtE_Desc" class="required field_message"  ><?php echo $xROW[3]; ?></textarea></td>
    </tr>
    <tr>
   <td><label>Event Cateogory:</label></td>
        <td><select name="cmbE_CName" class="sel">
        <?php
		$DS3=$xDB->SELECTDATA("select EC_Name from tblEventscategory");		

		for($i=0;$i<mysql_num_rows($DS3);$i++)
		{
			$xRow=mysql_fetch_array($DS3);
			echo "<option> $xRow[0]</option>";
		}
		?>
        </select></td></tr>
        <tr>
        	<td>Event Image</td>
            <td><input type="file" name="E_Img" accept="image/png, image/gif, image/jpeg"><img src='../Images/E_Img/<?php echo $xROW[5]; ?>.jpeg' width=50 height=50></td>
            </tr>
    <tr>
        <td colspan="2" align="right"><span class="button b5"><input type="submit" value="Edit" name="btnEdit_EventDetails"></span></td>
	</tr>
</table>
</form>
</div>
</div><div class="clear"></div>

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