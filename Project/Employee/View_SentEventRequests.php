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
	
	
	if(isset($_GET['ER_IDTDR']))
	{
	
	$ER_IDTDR=$_GET['ER_IDTDR'];
	$xDB->DMLCOMMANDS("delete from tbleventrequests where ER_ID='$ER_IDTDR' ");
 echo '<script language="javascript">';
  echo 'alert("Event Request Has been Deleted")';  //not showing an alert box.
  echo '</script>';
	echo "<meta http-equiv='Refresh'; Content='0; URL=View_SentEventRequests.php?Emp_IDTVR1=$Emp_ID';>";
	
	
	
	}
	
	if(isset($_GET['Emp_IDTVR']))
	{

	$Emp_IDTVR1=$_GET['Emp_IDTVR'];
	
	echo "$Emp_IDTVR";
	echo "<meta http-equiv='Refresh'; Content='0; URL=View_SentEventRequests.php?Emp_IDTVR1=$Emp_IDTVR1';>";
/*
				$DS2=$xDB->SELECTDATA("select ER.ER_ID,ER.ER_DATE,ER.ER_Status,ER.E_ID,ER.EMp_ID,E.E_ID,E.E_Date,E.E_Name from tbleventrequests ER,tblevents E where er.e_id=e.e_id and er.emp_id='$Emp_IDTVR' order by er.er_id desc ");
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo "<a href='View_SentEventRequests.php?ER_IDTVR=$a&Emp_IDTVR=$Emp_IDTVR'>&nbsp;$a</a>";
}	
*/

	}
		
	
		
		

			
			
		
		
		

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sent Requests | Blue Pumpkin</title>

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

<div class="content" style="height:1050px;">

	<div class="fixw">


    			<blockquote class="huge">
            Pages: <?php

if(isset($_GET['Emp_IDTVR1']))
	{

	$Emp_IDTVR2=$_GET['Emp_IDTVR1'];
	
	echo "$Emp_IDTVR";


			$DS2=$xDB->SELECTDATA("select ER.ER_ID,ER.ER_DATE,ER.ER_Status,ER.E_ID,ER.EMp_ID,E.E_ID,E.E_Date,E.E_Name from tbleventrequests ER,tblevents E where er.e_id=e.e_id and er.emp_id='$Emp_IDTVR2' order by er.er_id desc ");
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo "<a href='View_SentEventRequests.php?ER_IDTVR=$a&Emp_IDTVR1=$Emp_IDTVR2'>&nbsp;$a</a>";
}	


	}
?></blockquote>




		<h1>Sent Requests</h1>
		
  <?php              
                		if(isset($_GET['ER_IDTVR']))
		{ 
			$ER_IDTVR=$_GET['ER_IDTVR']; 
			$Emp_IDTVR_ =$_GET['Emp_IDTVR1'];
			$DS1=$xDB->SELECTDATA("select ER.ER_ID,ER.ER_DATE,ER.ER_Status,ER.E_ID,ER.EMp_ID,E.E_ID,E.E_Date,E.E_Name from tbleventrequests ER,tblevents E where er.e_id=e.e_id and er.emp_id='$Emp_IDTVR_' order by er.er_id desc limit $ER_IDTVR, 5 ");
	

$xTROWS=mysql_num_rows($DS1);


for($j=0; $j<$xTROWS; $j++)
{
	$xROW1 = mysql_fetch_array($DS1);
	
echo "			<div class='three-fourth'>";
echo "			<ul class='rooms'>";
echo "				<li>";

echo"	<div class='pic'><a href='../Admin/Resize_E_Img.php?E_IDTVP=$xROW1[4]' rel='colorbox'><img src='../Images/E_Img/$xROW1[4].jpeg' width=200 height=100></a></div>";
				echo "	<div class='desc'>";
					echo "	<h2>$xROW1[7] | $xROW1[6]</h2>";
			echo"			<p> Request Status:$xROW1[2] <br> Request Date:$xROW1[1]</p>";
echo"						<p>
							<a href='View_SentEventRequests.php?ER_IDTDR=$xROW1[0]' class='button b7' style='float:right'>Delete Request</a>
						</p>";
echo "					</div>";
echo "					<div class='clear'></div>";
echo "				</li>";
echo "			</ul>";
echo "		</div>";

}




		


}

	

?>
                
                
                
                
                
                
		
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