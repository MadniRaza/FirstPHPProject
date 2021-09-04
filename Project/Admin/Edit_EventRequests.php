<?php
include "../ConnectDB.inc"; // including Database Connection File
$xDB=new ConnectDB(); // Making object of database Connection File
			// What if user click on Add Employee Button

	if(isset($_GET['ER_IDFA']))
		{
			$ER_IDFA=$_GET['ER_IDFA'];
					$DS=$xDB->SELECTDATA("select * from tbleventrequests where er_id='$ER_IDFE'");

		}

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

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
		<div class="col_c">
			<!-- Logo -->
			<a href="theme-9-fonts-1-fixtop-0-index.html">
				<img src="../../../115.167.77.38/Rqae5eb53b-c103-49e4-a363-9cb05f81161d/ID4BC95DE5A27D015/RV200000/AVSkyController_3.1.2.49749/Br200/CL0-global/EI60554952/Ht240/IP139.190.240.217_2075/IQ100/MO15/MT0/NIkhi-opt-01.wi-tribe/file.b.delaye" width="373" height="116" alt="Hotel Inn" id="logo"/>
				<span id="logo_shine"><img src="img/shine.png" width="100" height="116" alt="" /></span>
			</a>
			<!-- /Logo -->
		</div>
	</div>
	<!-- /Top Line -->
	
	<!-- Menu -->
	<div class="menuline">
		<div class="fixw">
        			<ul class="menu">
	
				<li>
					<a href="theme-9-fonts-1-fixtop-0-page-secondary-full.html">Home<span>blue Pumpkin</span></a>
				</li>
				<li>
					<a href="#">Employee<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-list.html">Add New Employee</a></li>
						<li>
							<a href="#">View Employee Details</a>
							<ul>
								<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-grid-3c.html">View By ID</a></li>
								<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-grid-4c.html">View All</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Event<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-list.html">Add New Event</a></li>
              		<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-list.html">Add Event Category</a></li>
						<li>
							<a href="#">View Events Details/Add Event Winner</a>
							<ul>
								<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-grid-3c.html">View By Event Category</a></li>
								<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-grid-4c.html">View By Event Date</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Event Winner<span>View/Delete</span></a>
					<ul>
						<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-list.html">View By Event Category</a></li>
              		<li><a href="theme-9-fonts-1-fixtop-0-page-rooms-list.html">View By Event Date</a></li>
					</ul>
				</li>
                
				<li>
					<a href="#">Paritipants Requests<span>Accept/Deny Requests</span></a>
				</li>
				<li>
					<a href="theme-9-fonts-1-fixtop-0-page-contacts.html">Contacts<span>contact us</span></a>
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
<form action="Edit_EventRequests.php" method="post">

<table border="1" cellpadding="5" cellspacing="5" class="table1">
<tr>
    	<td><label>Request ID:</label></td>
        <td><input type='text'  name="txtER_IDFE_" class="required field_message" readonly value='<?php echo $xROW[0]; ?>'></td>
	</tr>
	<tr>
    	<td><label>Employee ID:</label></td>
        <td><input type="text" name="txtEmp_ID" value='<?php echo $xROW[1]; ?>' class="required field_message"></td>
	</tr>
	<tr>
    	<td><label>Event ID:</label></td>
        <td><input type="text" name="txtE_ID" value='<?php echo $xROW[2]; ?>' class="required field_message"> </td>
	</tr>
        <tr>
              	<td><label>Select Choice</label></td>
        <td><input type="radio" name="rdoRequests" value="Accepted" >Accept
    <input type="radio" name="rdoRequests" value="Denied">Denied
             <input type="radio" name="rdoRequests" value="Pending">Pending</td>

            </tr>
    <tr>
        <td colspan="2" align="right"><span class="button b5"><input type="submit" value="Submit" name="btnEdit_EventRequests"></span></td>
	</tr>
</table>
</form>
</div>
</div><div class="clear"></div>

<div class="footer">
	<div class="fixw">
		<div class="three-fourth">
			<!-- Social -->
			<div class="socials google">
				<script type="text/javascript" src="../../../apis.google.com/js/plusone.js"></script><g:plusone></g:plusone>
			</div>
			<div class="socials twitter">
				<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="../../../platform.twitter.com/widgets.js"></script>
			</div>
			<div class="socials facebook">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "../../../connect.facebook.net/en_US/all.js#appId=128173410603675&xfbml=1"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
			</div>
			<div class="clear"></div>
			<!-- /Social -->
			
			<!-- Footer menu -->			
			<ul class="footermenu">
				<li><a href="#">Hotels</a></li>
				<li><a href="#">Rooms</a></li>
				<li><a href="#">Restaurant</a></li>
				<li><a href="#">Special offers</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contacts</a></li>
			</ul>
			<!-- /Footer menu -->
			<div class="clear" style="height:10px"></div>
			<!-- Copyright, address -->
			&copy; Hotel, 1234 West Lorem Road Chicago, IL 60631, United States, Phone: (773) 123-4567
			<!-- /Copyright, address -->
		</div>
		<div class="one-fourth last" style="text-align:right">
			<!-- Footer logo -->
			<a href="theme-1-fonts-1-fixtop-1-index.html"><img src="../../../115.167.77.38/Rqae5eb53b-c103-49e4-a363-9cb05f81161d/ID4BC95DE5A27D015/RV200000/AVSkyController_3.1.2.49749/Br200/CL0-global/EI60554952/Ht240/IP139.190.240.217_2075/IQ100/MO15/MT0/NIkhi-opt-01.wi-tribe/file.b.delaye" width="186" height="58" alt="Hotel Lorem"/></a>
			<!-- /Footer logo -->
			<div class="clear" style="height:10px"></div>
			<!-- Social -->
			Follow us:<a href="#" class="follow_icon twitter"></a><a href="#" class="follow_icon facebook"></a><a href="#" class="follow_icon rss"></a>
			<!-- /Social -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- /Footer -->

</body>

<!-- Mirrored from olevmedia.com/themes/hotel-html/theme-9-fonts-1-fixtop-0-page-contacts.htm by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Dec 2014 18:58:18 GMT -->
</html>