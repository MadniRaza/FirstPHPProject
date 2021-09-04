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
 	if(isset($_GET['EW_IDFD']))
		{
			$EW_IDFD=$_GET['EW_IDFD'];
			$xDB->DMLCOMMANDS("delete from tbleventwinnerdetails where ew_id='$EW_IDFD'");
echo '<script language="javascript">';
  echo 'alert("Event winner Has been Deleted")';  //not showing an alert box.
  echo '</script>';
		}
		
		
		
		
		
if(isset($_GET['btnView_EventWinnerByED']))
		{
			
			$E_Date1=$_GET['txtE_Date'];
				echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventWinnerByED.php?E_Date1=$E_Date1';>";
		/*	$DS2=$xDB->SELECTDATA("select EW.EW_ID,  EW.E_ID, E.E_ID, E.E_Date, E.EC_ID  from tbleventwinnerdetails EW, tblevents E where EW.E_ID= E.E_ID and E.E_Date='$E_Date'");
			if(mysql_num_rows($DS2)>0)
			{
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventWinnerByED.php?EW_IDFV=$a&E_Date=$E_Date'>&nbsp;$a</a>";
}}else	
			{		 echo '<script language="javascript">';
  echo 'alert("No Results Found")';  //not showing an alert box.
  echo '</script>';}
			*/
			
		}
		
		
		
		

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Event Winner Details By Event Date| Blue Pumpkin</title>

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
								<li><a href="View_EventsByED.php">View By Event Date</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Event Winner<span>View/Edit/Delete</span></a>
					<ul>
						<li><a href="View_EventWinnerByEC.php">View By Event Category</a></li>
              		<li><a href="#">View By Event Date</a></li>
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

<h1>View Event Winner Details By Event Date</h1>

<!--View EMployee Details By Their ID-->
<form method="GET" action="View_EventWinnerByED.php" onSubmit="return check();" name="form1" >
<table border="1" cellpadding="5" cellspacing="5" class="table1">
	<tr>
    	<td><label>Date:</label></td>
        <td><input type="text" name="txtE_Date" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}" class="required filed_message"></td>
	</tr>
    <tr>
        <td colspan="2" align="right"><span class="button b1"><input type="submit" value="View" name="btnView_EventWinnerByED"></span></td>
	</tr>
    
</table>
</form>
</div>






	<div class="fixw">
			<blockquote class="huge">
            Pages: 
            <?php
			
	if(isset($_GET['E_Date1']))
	{
		$E_Date2_=$_GET['E_Date1'];

			$DS2=$xDB->SELECTDATA("select EW.EW_ID,  EW.E_ID, E.E_ID, E.E_Date, E.EC_ID  from tbleventwinnerdetails 	EW, tblevents E where EW.E_ID= E.E_ID and E.E_Date='$E_Date2'");
			if(mysql_num_rows($DS2)>0)
			{
		for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
		{
			echo "<a href='View_EventWinnerByED.php?EW_IDFV=$a&E_Date1=$E_Date2'>&nbsp;$a</a>";
		}
			}
else {		 echo '<script language="javascript">';
  echo 'alert("No Results Found")';  //not showing an alert box.
  echo '</script>';
  }
	}

		?>

			</blockquote>






<?php	
if(isset($_GET['EW_IDFV']))
		{ 
			$EW_IDFV=$_GET['EW_IDFV']; 
			$EDate_= $_GET['E_Date1'];


		
		
			$DS1=$xDB->SELECTDATA("select EW.EW_ID, EW.Emp_ID, EW.E_ID, E.E_ID, E.E_Date, E.EC_ID,EW.EW_DESC,emp.emp_id,emp.emp_name  from tbleventwinnerdetails EW,  tblevents E, tblemployees emp where EW.E_ID= E.E_ID and emp.emp_id=ew.emp_id and E.E_Date='$EDate_' limit $EW_IDFV,5");
			for($i=0;$i<mysql_num_rows($DS1); $i++)
			{

						$xROW1 = mysql_fetch_array($DS1);
		$Month=date('M',strtotime($xROW1[4]));
		$Day=date('d',strtotime($xROW1[4]));

		echo "<div class='posts-month'>$Month</div>";
		
		echo "<div class='post-item'>";
		echo "<div class='day'></div>";
		echo "<div class='date'><a href='Resize_EW_Img.php?Emp_IDTVP=$xROW1[1]' rel='colorbox'> <img src='../Images/Emp_Img/$xROW1[1].jpeg' height=50 width=50 class='border left'/></a></div>";
		
		echo"<div class='text'>";
		
		echo "$xROW1[4]";
		
			echo"<h2><a href='Edit_EventWinnerDetails.php?EW_IDFE=$xROW1[0]'>$xROW1[8]</a></h2>";
			echo "<p>$xROW1[6]; <br> </p>";
echo"<div class='post-tags'>";
			echo "<a href='View_EventWinnerByEC.php?EW_IDFD=$xROW1[0]'>Delete WInner</a>&nbsp; &nbsp;<a  href='Edit_EventWinnerDetails.php?EW_IDFE=$xROW1[0]'>View</a>";
			

echo"				</div>";

			
			echo "</div>";
			echo "<div class='clear'></div>";
echo "		</div>";
		


				
				}
			
			
		}
			
	
?>


</table>
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