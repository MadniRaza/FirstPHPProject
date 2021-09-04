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
	
	
        		if(isset($_GET['btnView_EventsByEC']))
		{
			$E_CName = $_GET['cmbE_CName'];
	echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByEC.php?E_CName=$E_CName';>";

}	
?>



<?php
 	if(isset($_GET['E_IDFD']))
		{
			$E_IDFD=$_GET['E_IDFD'];
			$xDB->DMLCOMMANDS("delete from tblevents where e_id='$E_IDFD'");

		 echo '<script language="javascript">';
  echo 'alert("Event Deleted Successfully")';  //not showing an alert box.
  echo '</script>';
		}
?>

 
 


	






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Events By Event Category | Blue Pumpkin</title>

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
								<li><a href="#">View By Event Category</a></li>
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


<div class="content" style="height:1050px;">


<div class="form" align="center">
<form method="GET" action="View_EventsByEC.php" enctype="multipart/form-data" >
<table border="1" cellpadding="5" cellspacing="5" class="table1">
	<tr>
    	<td><label >Event Cateogory:</label></td>
        <td><select name="cmbE_CName" class="sel">
        <?php
		$DS=$xDB->SELECTDATA("select EC_Name from tblEventscategory");		

		for($i=0;$i<mysql_num_rows($DS);$i++)
		{
			$xRow=mysql_fetch_array($DS);
			echo "<option> $xRow[0]</option>";
		}
		?>
</select>        </td>
	</tr>
    <tr>
        <td colspan="2" align="right"><span class="button b1"><input type="submit" value="View" name="btnView_EventsByEC"></span></td>
	</tr>
</table>
</form>
</Div>
<div class="fixw">
			<blockquote class="huge">
            Pages: 
            <?php
			
				if(isset($_GET['E_CName']))
	{
		$E_CName_=$_GET['E_CName'];

		$DS2=$xDB->SELECTDATA("select e.e_id,e.ec_id, ec.ec_id,ec.ec_name   from tblevents e, tbleventscategory ec where e.ec_id=ec.ec_id and ec.ec_name='$E_CName_'");
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventsByEC.php?E_IDFV=$a&E_CName=$E_CName_'>&nbsp;$a</a>";
}
		
		}

		?>

			</blockquote>



    <div class="one-third">
		
		</div>



    <?php
	if(isset($_GET['E_IDFV']))
		{ 
			$E_IDFV=$_GET['E_IDFV']; 
			$EC_Name = $_GET['E_CName'];
			$DS1=$xDB->SELECTDATA("Select EC.EC_ID, EC.EC_Name, E.E_ID, E.E_Name, E.E_Date, E.E_Desc,E.EC_ID, E.E_img from tbleventscategory EC, tblevents E Where E.EC_ID = EC.EC_ID and ec.ec_name='$EC_Name' Order by E.E_Date asc limit $E_IDFV, 5 ");
	

$xTROWS=mysql_num_rows($DS1);



for($j=0; $j<$xTROWS; $j++)
{
	$xROW1 = mysql_fetch_array($DS1);
		$Month=date('M',strtotime($xROW1[4]));
		$Day=date('D',strtotime($xROW1[4]));

		echo "<div class='posts-month'>$Month</div>";
		
		echo "<div class='post-item'>";
		echo "<div class='day'>$Day</div>";
		echo "<div class='date'>$xROW1[4]</div>";
		
		echo"<div class='text'>";
		echo "<a href='Resize_E_Img.php?E_IDTVP=$xROW1[7]' rel='colorbox'><img src='../Images/E_Img/$xROW1[7].jpeg' height=100 width=100 class='border left' /></a>";
		
			echo"<h2><a href='Edit_EventDetails.php?E_IDFE=$xROW1[2]'>$xROW1[3]</a></h2>";
			
			echo "<p>$xROW1[5] <br> </p>";


			echo "<a  href='View_EventsByEC.php?E_IDFD=$xROW1[2]'>Delete Event</a>&nbsp; &nbsp;<a  href='Edit_EventDetails.php?E_IDFE=$xROW1[2]'>View</a>&nbsp;&nbsp;<a  href='Add_EventWinnerDetails.php?E_IDTAW=$xROW1[2]'>Add Winner</a>";

echo"<div class='post-tags'>";

echo"				</div>";

			
			echo "</div>";
			echo "<div class='clear'></div>";
echo "		</div>";
		
		

}
		

	}
	
		

	?>

	</div>

</div>

    <div class="clear"></div>
<hr style="color:#900;">
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
			 &copy; Blue Pumpkin, 2015. Developed and Designed By:<b> MUHAMMAD MADNI RAZA</b>
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