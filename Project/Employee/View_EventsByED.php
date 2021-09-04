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
	
	
		if(isset($_GET['E_IDTSR']))
		{
			$E_IDTSR=$_GET['E_IDTSR'];
			$E_Date3=$_GET['E_Date1'];
			$Date=date('d-m-y');
		
		echo "$Date";
				$DS1=$xDB->SELECTDATA("select * from tbleventrequests where e_id='$E_IDTSR' and emp_id='$Emp_ID'");
		if(mysql_num_rows($DS1)>0)
		{
echo '<script language="javascript">';
  echo 'alert("You have already participated for this event ")';  
  echo '</script>';
  echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByED.php?E_Date1=$E_Date3';>";
			
		}
else{
		$xDB->DMLCOMMANDS("insert into tbleventrequests values('','$Emp_ID','$E_IDTSR','$Date','pending')");
echo '<script language="javascript">';
  echo 'alert("You have participated for the event Successfully")';  //not showing an alert box.
  echo '</script>';
    echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByED.php?E_Date1=$E_Date3';>";
}
		}
		
if(isset($_GET['btnView_EventsByDate']))
		{
			$E_Date1=$_GET['txtE_Date'];
		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByED.php?E_Date1=$E_Date1';>";
			
/*			$DS2=$xDB->SELECTDATA("select * from tblevents where e_date='$E_Date'");
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventsByED.php?E_IDFV=$a&E_Date=$E_Date'>&nbsp;$a</a>";
}*/	

			
		}
			
		
		
		
		

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Events Datewise | Blue Pumpkin</title>

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
    alert("Plese Enter the Date");
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
					<a href="#">Datewise Events<span>View Events by Event's Date</span></a>
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
    <h1 align="center">DateWise Events</h1>
<div class="form">



<!--View EMployee Details By Their ID-->
<form method="GET" action="View_EventsByED.php" onSubmit="return check();" name="form1" >
<table  align="center" class="table1">
	<tr>
    	<td><label>Date:</label></td>
        <td><input type="text" name="txtE_Date" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}"></td>
	</tr>
    <tr>
        <td colspan="2" align="right"><span class="button b1"><input type="submit" value="View" name="btnView_EventsByDate"></span></td>
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
			$EDate_ = $_GET['E_Date1'];
			$DS=$xDB->SELECTDATA("Select EC.EC_ID, EC.EC_Name, E.E_ID, E.E_Name, E.E_Date, E.E_Img, E.EC_ID,E.E_DESC from tbleventscategory EC, tblevents E Where E.EC_ID = EC.EC_ID and e_date='$EDate_' limit $E_IDFV,5");

			
			for($i=0;$i<mysql_num_rows($DS); $i++)
			{
				$xROW=mysql_fetch_array($DS);
				
echo "			<div class='three-fourth'>";
echo "			<ul class='rooms'>";
echo "				<li>";

echo"	<div class='pic'><a href='../Admin/Resize_E_Img.php?E_IDTVP=$xROW[5]' rel='colorbox'><img src='../Images/E_Img/$xROW[5].jpeg' width=200 height=100></a></div>";
				echo "	<div class='desc'>";
					echo "	<h2>$xROW[3]</h2>";
			echo"			<p>$xROW[7]</p>";
echo"						<p>
							<a href='View_EventDetailsTSR.php?E_IDTSR=$xROW[2]&EC_Name=$xROW[1]' class='button b9'>Details</a>&nbsp;&nbsp;&nbsp;<span class='rednotice'>$xROW[4]</b></span>
							<a href='View_EventsByED.php?E_IDTSR=$xROW[2]&E_Date1=$EDate_' class='button b8' style='float:right'>Participate</a>
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
</div>

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