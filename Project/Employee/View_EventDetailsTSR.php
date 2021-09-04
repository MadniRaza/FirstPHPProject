<?php

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


<?php


			// What if user click on Add Employee Button
/*	if(isset($_GET['E_IDTSR']))
		{
			
		}
*/
	if(isset($_GET['E_IDTSR']))
		{
			$E_IDTSR=$_GET['E_IDTSR'];
			$EC_Name=$_GET['EC_Name'];
					$DS=$xDB->SELECTDATA("select * from tblevents where	 e_id='$E_IDTSR'");
					

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
			}
		}
// Editing Event Details
 if(isset($_POST['btnView_EventDetailsTSR'])) 
		{
		$EIDTSR_=$_POST['txtE_IDTSR_'];

		
			//Retreving Selected Event Category ID
			echo "$E_IDFE_ | $E_Name |$E_Date |$E_CName";
		
		$Date=date('d-m-y');
		
		echo "$Date";
				$DS2=$xDB->SELECTDATA("select * from tbleventrequests where e_id='$EIDTSR_' and emp_id='$Emp_ID'");
		if(mysql_num_rows($DS2)>0)
		{
echo '<script language="javascript">';
  echo 'alert("You have already participated for this event ")';  
  echo '</script>';
			
		}
		else
{
		
		$xDB->DMLCOMMANDS("insert into tbleventrequests values('','$Emp_ID','$EIDTSR_','$Date','pending')");
		echo '<script language="javascript">';
  echo 'alert("Request Has been Sent Successfully ")';  
  echo '</script>';


}
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

<div class="form">
<form action="View_EventDetailsTSR.php" method="post" enctype="multipart/form-data">		
		<h1>Event Details</h1>
		<div class="one-third">
			<div class="sidephotos">
<?php echo"<a href='../Admin/Resize_E_Img.php?E_IDTVP=$xROW[5]' rel='colorbox'><img src='../Images/E_Img/$xROW[5].jpeg' class='border'  width='294' height='196' />"; ?></a>
			</div>
		</div>
		<div class="two-third last">

			<div class="one-third">
				<ul class="list1">
					<li><input type='text'  name="txtE_IDTSR_" readonly value='<?php echo $xROW[0]; ?>'></li>
					<li><input type="text" name="txtE_Name" value='<?php echo $xROW[1]; ?>'>.</li>
					<li><input type="text" name="txtE_Date" value='<?php echo $xROW[2]; ?>'></li>
					<li><input type="text" value='<?php echo $EC_Name; ?>'></li>
				</ul>
			</div>
			<div class="one-third last">
            <p>
            <?php echo  $xROW[3]; ?>
            
            </p>
			</div>
			<div class="clear" style="height:17px"></div>
			<div class="brace"></div>
			<div class="one-third">
				<span class="button b4"><input type="submit" value="Participate" name="btnView_EventDetailsTSR"></span>&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;<a href="ContactUs.php" class="button b9">Contact us</a>
			</div>


		</div>
        
        </form>
        </div>
		<div class="clear"></div>

	</div>
    
</div><div class="clear"></div>


<!-- Footer -->

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