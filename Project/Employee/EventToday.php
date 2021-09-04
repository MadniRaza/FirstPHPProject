<?php
error_reporting(0);
include "../ConnectDB.inc";
$xDB=new ConnectDB();
session_start();
	if($_SESSION['Emp_ID'] == "" || $_SESSION['Emp_Name'] == "")
	{	echo "<meta http-equiv='Refresh'; Content='0; URL=../Index.php';>";	exit;}
	else
	{
		$Emp_ID = $_SESSION['Emp_ID'];
		$Emp_Name = $_SESSION['Emp_Name'];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blue Pumpkin</title>

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
				<img src="../Images/logo.jpeg" width="373" height="116" alt="Blue Pumpkin" id="logo"/>
				<span id="logo_shine"><img src="../img/shine.png" width="100" height="116" alt="" /></span>
			</a>
			<!-- /Logo -->		</div>
        	<div class="col_r" align="right">
			<!-- Date -->
			Welcome <?php echo "$Emp_Name &nbsp; <br><a href='../MyProfile.php'>My Profile</a> | <a href='../Index.php'>Log Out</a>  "  ?>
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
					<a href="Home.php">Home<span>Web's Home</span></a>
				</li>
     				<li>
					<a href="View_EventsByEC.php">Categorized Events<span>View Events by Event's Category</span></a>
				</li>
                <li>
					<a href="View_EventsByED.php">Datewise Events<span>View Events by Event's Date</span></a>
				</li>
                <li>
					<a href="View_EventWinner.php">Event Winners<span>Event Winners Details</span></a>
				</li>
                <li>
					<a href="MyProfile.php">&nbsp;My Profile<span>My Info/View Sent Requests </span></a>
				</li>


		</div>
	</div>
	<!-- /Menu -->
</div>
<!-- /Fixed header -->





<div class="content">
<div class="fixw">
<div class="one-third" style="margin-left:100px;">
<h2>Today's Events</h2>
<?php
	$S_Date=getdate();
	$S_Month=$S_Date['mon'];
	$S_Day=$S_Date['mday'];
	$S_Year=date('y');
	$Server_Date=$S_Day."-".$S_Month."-".$S_Year;

	$DS3=$xDB->SELECTDATA("select e.e_id,e.e_name,e.e_date,e.e_desc,emp.emp_id,emp.emp_name,er.er_id,er.emp_id,er.e_id,er.er_status from tblevents e, tblemployees emp, tbleventrequests er where e.e_id=er.e_id and emp.emp_id=er.emp_id and er.er_status='accepted' and e.e_date='$Server_Date'");
	if(mysql_num_rows($DS3)>0)
	{
	for($l=0;$l<mysql_num_rows($DS3);$l++)
	{
			$xROW3 = mysql_fetch_array($DS3);

echo "<div class='notice'";


echo "Event Name: $xROW3[1] <br>Event Date: $xROW3[2]
 Event Description: $xROW3[3]";
echo "		</div>";
	}
	}
	else {
echo "<div class='notice'>";


echo "No Events";
echo "		</div>";


echo "		</div>";

	}
?>




</div>
<div class="one-third" style="margin-left:50px;">
<?php
	$Month=$S_Date['month'];
	$S_Month=$S_Date['mon'];
echo "	<h2>Up Coming Events Of $Month </h2>";
	
	

	$DS4=$xDB->SELECTDATA("select e.e_id,e.e_name,e.e_date,e.e_desc,emp.emp_id,emp.emp_name,er.er_id,er.emp_id,er.e_id,er.er_status from tblevents e, tblemployees emp, tbleventrequests er where e.e_id=er.e_id and emp.emp_id=er.emp_id and  month(e.e_date)='$S_Month' and e.e_date > '$Server_Date' ");
	if(mysql_num_rows($DS4)>0)
	{
	for($l=0;$l<mysql_num_rows($DS4);$l++)
	{
			$xROW3 = mysql_fetch_array($DS4);

echo "<div class='notice'>";


echo "Event Name: $xROW3[1]  <br> Event Date:$xROW3[2] <br>
Request Status=$xROW3[9] ";
echo "		</div>";
	}
	}
	else {
echo "<div class='notice'>";


echo "No More Events In Current Month";
echo "		</div>";




	}
?>




</div>


</div></div>

<div class="clear"></div>
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