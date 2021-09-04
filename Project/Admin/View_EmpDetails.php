<?php
error_reporting(0);
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
include "../ConnectDB.inc";
$xDB=new ConnectDB();
	if(isset($_GET['Emp_IDFD']))
		{
			$Emp_IDFD=$_GET['Emp_IDFD'];
			$xDB->DMLCOMMANDS("delete from tblemployees where emp_id='$Emp_IDFD'");
echo "Employee Profile Has been Deleted";			
		}
?>


		
		
		

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Employee Details | Blue Pumpkin</title>

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
					<a href="#">Home<span>blue Pumpkin</span></a>
				</li>
				<li>
					<a href="#">Employee<span>Add/View/Delete</span></a>
					<ul>
						<li><a href="Add_Emp.php">Add New Employee</a></li>
						<li>
							<a href="#">View Employee Details</a>
							<ul>
								<li><a href="View_EmpByID.php">View By ID</a></li>
								<li><a href="#">View All</a></li>
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


<div class="content" style="height:365px;">
 <h2 align="center">Employee Details</h2>
	<div class="fixw">

		<div class="one-third">
		
			<blockquote class="huge">
            Pages: 
<?php
			$DS2=$xDB->SELECTDATA("select emp_id from tblemployees");

		
		for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
		{
	echo"<a href='View_EmpDetails.php?Emp_IDFV=$a'> $a | </a>";
		}


 ?>
			</blockquote>
	</div>


 <!--Displaying all Employees Details-->

            <div class="two-third ">
                    <table class='table1' >
<tr>
<thead>
 	<th>Employee ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Cell No</th>
    <th>Address</th>
    <th>Picture</th>
    <th>Login name</th>
    <th>Login Password</th>
    <th width="200">Joining Date</th>
     <th>Delete</th>
     <th>Edit</th>
     
     </thead>
   </tr>

                    <?php
					
			  if(isset($_GET['Emp_IDFV']))
		{ 
			
			$EMP_IDFV=$_GET['Emp_IDFV'];
   $DS1=$xDB->SELECTDATA("select * from tblemployees limit $EMP_IDFV, 5 ");

   		for($i=0;$i<mysql_num_rows($DS1);$i++)
			{
							echo "<tr>";
			$xROW1=mysql_fetch_array($DS1);

 		   echo "<td width='10'>$xROW1[0]</td>"; //EmpID
			echo "<td>$xROW1[1]</td>"; // Emp Email
			echo "<td>$xROW1[2]</td>"; // Emp Cell No
			echo "<td>$xROW1[3]</td>"; // Emp Address
			echo "<td>$xROW1[4]</td>"; // Emp Login password
			echo "<td><a href='Resize_Emp_Img.php?Emp_IDTVP=$xROW1[0]' rel='colorbox'><img src='../Images/Emp_Img/$xROW1[5].jpeg' width=30 height=30></a></td>";
			echo "<td>$xROW1[6]</td>"; // Emp Joining Date
			echo "<td>$xROW1[7]</td>"; // Emp Joining Date
						echo "<td width='200'>$xROW1[8]</td>"; // Emp Joining Date



		 			echo"<td><a class='button b7' href='View_EmpDetails.php?Emp_IDFD=$
					$xROW1[0]'>Delete</a></td>";
					echo"<td><a class='button b5' href='Edit_EmpDetails.php?Emp_IDFE=$xROW1[0]'>View</a></td> ";

			echo "</tr>";
			}
			}
		
		


		
		
		
		
		
		
		
		
		
		
		


					
				 
				 
				 
				 
				


                
            ?>
            </table>
            </div>
</div>
</div><!--Content-->

<div class="clear"></div>
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