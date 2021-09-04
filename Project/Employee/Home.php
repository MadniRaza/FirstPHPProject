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
					<a href="#">Home<span>Web's Home</span></a>
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

<!-- Main Page Middle Line -->
<div class="mainmiddle">
	<!-- Photo row -->
    
    
    
    
    
	<div id="photorow">
    
    
    <?php 
	
$DS1=$xDB->SELECTDATA("select E_ID,E_Date from tblevents  order by E_Date asc limit 5");
	for($i=0;$i<mysql_num_rows($DS1);$i++)
		{
			$xROW1=mysql_Fetch_array($DS1);
			echo"<img src='../Images/E_Img/$xROW1[0].jpeg' width='360' height='270'  />			";							}
	
	
	
	?>
    
    

	</div>
	<!-- /Photo row -->
	
	<!-- Banners -->
	<div class="fixw banners">
    <?php
	
	$DS2=$xDB->SELECTDATA("select EW.EW_ID,EW.Emp_ID,EW.E_ID,EMp.emp_id,emp.emp_name,ew_desc from tbleventwinnerdetails EW, tblemployees emp where ew.emp_id=emp.emp_id  order by ew_id desc limit 1 ");

	
	
	for($k=0;$k<mysql_num_rows($DS2);$k++)
	{
			$xROW2 = mysql_fetch_array($DS2);

echo "		<a class='banner' href='theme-9-fonts-1-fixtop-0-page-prices.html'>";
		echo "	<span class='photo'><img height=70 width=100  src='../Images/Emp_Img/$xROW2[1].jpeg' /></span>";
echo "			<span class='r'>";
		echo "		<span class='name'>$xROW2[4]</span>";
echo "				<span class='text'> $xROW2[5] </span>";
		echo "	</span>";
echo "		</a>";
	}
	
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
	
echo "		<a class='banner last' href='EventToday.php'>";
		echo "	<span class='photo'><img height=70 width=100  src='../Images/E_Img/$xROW3[0].jpeg' /></span>";
echo "			<span class='r'>";
		echo "		<span class='name'>Today's Events</span>";
echo "				<span class='text'>Event Name: $xROW3[1] <br> Event Date: $xROW3[2] &nbsp; &nbsp;View More events.... </span>";
		echo "	</span>";
echo "		</a>";
	}
	}
	else {
		echo "		<a class='banner last' href='EventToday.php'>";
		echo "	<span class='photo'><img height=70 width=100  src='../Images/Logo.jpeg' /></span>";
echo "			<span class='r'>";
		echo "		<span class='name'>Today's Events</span>";
echo "				<span class='text'>No Event Today View More.... </span>";
		echo "	</span>";
echo "		</a>";

		}
	





	
?>	</div>
	<!-- /Banners -->
</div>
<!-- /Main Page Middle Line -->

<!-- Main Page 3 Columns -->
<div class="botline fixw">
<!--		<ul class="rooms style-grid">
			<li class="one-third">
				
				<div class="desc">-->
            
                <div class="one-third">
					<h2>About Us</h2>
					<p>We are the  marketing agent of an internet marketing company. We provides different services like dial up services and the broadband services.We provide a service that allows connectivity to the internet through a standard telephone line that is given by us. This service gives you a set of telephone numbers either national or local that allows you to dial into a network that feeds into the internet, also allows you to receive and send email, search the World Wide Web, participate in chat rooms and plenty of other features the web we offer.
s</p>
					<!--<p>
						<a href="theme-9-fonts-1-fixtop-0-page-room.html" class="button b6">More</a>
					</p>-->
				</div>
			
<!--			</li>
		</ul> -->

		

	<div class="one-third">
		<h2>FAQ's</h2>
		<ul class="list1">
			<li>How to participate in the events?</li>
			<li>what if am unable to send a request to participate?</li>
            <li>What i am unable to logging into the Site?</li>
			<li>How can i be intimated with the Upcoming Events?</li>
            
				<p align="right">
						<a href="Faqs.php" class="button b5">More</a>
					</p>

		</ul>
	</div>






<!--		<ul class="rooms style-grid">
			<li class="one-third">
				
				<div class="desc">-->
                <div class="one-third last">
					<h2>Would you like to participate for an Event?</h2>
					<p>We are organzing various events like meetings, games competitions etc. We distributes prizes to the event winner. Feel free to paritipate for an event and get an awesome Prize. </p>
					<p>
						<a href="View_EventsByEC.php" class="button b6">View Events</a>
					</p>
				</div>

<!--			</li>
		</ul> -->
		<div class="clear"></div> 
		

<!--
	<div class="one-third">
		<h2>About Us</h2>
		<ul class="list1">
			<li>Sed plu simplic e regulari quam plu.</li>
			<li>Occidental: in fact, asd Occidental.</li>
			<li>Dolor sit amet, consectetuer adipiscing elit, sed plu simplic.</li>
			<li>Fact, asd Occidental.A un Angleso it va grammatica del resultant.</li>
			<li>Consectetuer adipiscing elit, sed plu simplic.</li>
			<li>Lorem ipsum dolor sit amet!</li>
		</ul>
	</div>

	<div class="one-third">
		<h2>Events</h2>
		<ul class="list1">
			<li>It va esser tam simplict amet, consectetuer adipiscing elit, sed diam nonummy</li>
			<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</li>
			<li>A un Anglesotibh lorem ipsum dolor sit amet, cg elit, sed diam!</li>
			<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
		</ul>
	</div>

	<div class="one-third last">
		<h2>More about Events</h2>
		<p>Occidental: in fact, asd Occidental.A un Angleso it va grammatica del resultant. nibh Lorem ipsum dolor sit amet! Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam plu. ipsum dolor sit amet.</p>
		<p align="right">&mdash; Lorem, ipsum dolor &quot;sit amet&quot;</p>
		<div class="clear"></div>
	</div>-->
</div>
<!-- /Main Page 3 Columns -->

<div class="clear" style="height:28px"></div>
<div class="line"></div>

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