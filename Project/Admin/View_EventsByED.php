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
 	if(isset($_GET['E_IDFD']))
		{
			$E_IDFD=$_GET['E_IDFD'];
			$xDB->DMLCOMMANDS("delete from tblevents where e_id='$E_IDFD'");
		 echo '<script language="javascript">';
  echo 'alert("Event Deleted Successfully")';  //not showing an alert box.
  echo '</script>';

		}
		
	if(isset($_GET['btnView_EventsByED']))
		{
			$E_Date1=$_GET['txtE_Date'];
			echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByED.php?E_Date1=$E_Date1';>";
			
			
			
			
			
			
			
			
			
		}
		

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Events By Event Date</title>

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

 if(document.form1.txtE_Date.value=="")
  {
    alert("Plese Enter Event Date to Search");
	document.form1.txtE_Date.focus();
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
								<li><a href="#">View By Event Date</a></li>
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

<h1>View Events By Date</h1>

<!--View EMployee Details By Their ID-->
<form method="GET" action="View_EventsByED.php" name="form1" onSubmit="return check();">
<table border="1" cellpadding="5" cellspacing="5" class="table1">
	<tr>
    	<td><label>Date:</label></td>
        <td><input type="text" name="txtE_Date" class="required field_message" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}"></td>
	</tr>
    <tr>
        <td colspan="2" align="right"><span class="button b1"><input type="submit" value="View" name="btnView_EventsByED"></span></td>
	</tr>
</table>



</form>
</div>

<!--Displaying Employee Details by Employee ID-->
<div class="fixw">
			<blockquote class="huge">
            Pages: 
            <?php
			
		if(isset($_GET['E_Date1']))
		{
			$E_Date2=$_GET['E_Date1'];
			$DS2=$xDB->SELECTDATA("select * from tblevents where e_date='$E_Date2'");
			
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventsByED.php?E_IDFV=$a&E_Date1=$E_Date2'>&nbsp;$a</a>";

}
		}
		?>

			</blockquote>










<?php	
			
	if(isset($_GET['E_IDFV']))
		{ 
			$E_IDFV=$_GET['E_IDFV']; 
			$E_Date3 = $_GET['E_Date1'];
			$DS=$xDB->SELECTDATA("Select EC.EC_ID, EC.EC_Name, E.E_ID, E.E_Name, E.E_Date, E.E_Img, E.EC_ID,E.E_Desc from tbleventscategory EC, tblevents E Where E.EC_ID = EC.EC_ID and e_date='$E_Date3' limit $E_IDFV,5");

			
			for($i=0;$i<mysql_num_rows($DS); $i++)
			{
				$xROW1=mysql_fetch_array($DS);
						$Month=date('M',strtotime($xROW1[4]));
		$Day=date('d',strtotime($xROW1[4]));

		echo "<div class='posts-month'>$Month</div>";
		
		echo "<div class='post-item'>";
		echo "<div class='day'>$Day</div>";
		echo "<div class='date'>$xROW1[4]</div>";
		
		echo"<div class='text'>";
		echo "<a href='../Admin/Resize_E_Img.php?E_IDTVP=$xROW1[5]' rel='colorbox'><img src='../Images/E_Img/$xROW1[6].jpeg' height=50 width=50 class='border left' /></a>";
		
			echo"<h2><a href='#'>$xROW1[3]</a></h2>";
			echo "<p>$xROW1[7] <br> </p>";
echo"<div class='post-tags'>";
			echo "<a href='View_EventsByED.php?E_IDFD=$xROW1[2]'>Delete Event</a>&nbsp; &nbsp;<a  href='Edit_EventDetails.php?E_IDFE=$xROW1[2]'>View</a>&nbsp;&nbsp;<a  href='Add_EventWinnerDetails.php?E_IDTAW=$xROW1[2]'>Add Winner</a></h2>";

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