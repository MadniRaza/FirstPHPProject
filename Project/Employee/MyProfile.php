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
	
	

		//==============Retreiving Image Details==============//
		$DS=$xDB->SELECTDATA("select * from tblemployees where emp_id='$Emp_ID'");

		for($i=0;$i<mysql_num_rows($DS);$i++)
			{
			$xROW=mysql_fetch_array($DS);
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



	<div class="form">
    			<h1 align="center">My Profile</h1>
<form enctype="multipart/form-data"   >
<table  class="table1" align="center">
	<tr>
    	<td><label>Employee ID:</label></td>
        <td><input type='text'  name="txtEmp_IDFE_" class="required halfsize field_name"  readonly value='<?php echo $xROW[0]; ?>'></td>
	</tr>

	<tr>
    	<td><label>Employee  Name:</label></td>
        <td><input type="text" name="txtEmp_Name" class="required  field_name" value='<?php echo $xROW[1]; ?>'> </td>



    	<td><label>Email:</label></td>
        <td><input type="email" name="txtEmp_Email" class="required field_email" value='<?php echo $xROW[2]; ?>'></td></tr><tr>
    	<td><label>Cell No:</label></td>
        <td><input type="text" name="txtEmp_CNo" class="required  field_phone" value='<?php echo $xROW[3]; ?>'></td>



    	<td><label>Address:</label></td>
        <td><textarea rows="2" cols="15" name="txtEmp_Address" class="required field_message"><?php echo $xROW[4]; ?></textarea></td>
	
</tr>
<tr>

	
    	<td><label>Image</label></td>
        <td><img src='../Images/Emp_Img/<?php echo $xROW[5];?>.jpeg' height=100 width=100></td>

    
    	<td><label>Login Name</label></td>
        <td><input type="text" name="txtEmp_LoginName" class="required  field_name" value='<?php echo $xROW[6]; ?>'> </td></tr><tr>
    	<td><label>Password</label></td>
        <td><input type="text" name="txtEmp_LoginPass" class="required  field_name" value='<?php echo $xROW[7]; ?>'>
</td>        

    
    

    	<td colspan="1"><label>Joining Date</label></td>
        <td><input type="text" placeholder="Format (dd-mm-yy)" name="txtEmp_JDate" class="required  field_name" value='<?php echo $xROW[8]; ?>'></td>
</tr><tr>
        <td align="center" colspan="4">         <?php	echo "<a class='button b5' href='View_SentEventRequests.php?Emp_IDTVR=$xROW[0]'>View Sent Event Requests</a>"; ?> </span></td>

              
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