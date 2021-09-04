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

<?php
		if(isset($_GET['btnView_EventsByEC']))
		{
	$EC_Name1 = $_GET['cmbE_CName'];
		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByEC.php?EC_Name1=$EC_Name1';>";
	
/*				$DS2=$xDB->SELECTDATA("select e.e_id,e.ec_id, ec.ec_id,ec.ec_name   from tblevents e, tbleventscategory ec where e.ec_id=ec.ec_id and ec.ec_name='$E_CName'");
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventsByEC.php?E_IDFV=$a&E_CName=$E_CName'>&nbsp;$a</a>";
}	
*/

		}
		
		
		//Sending  Request for participation
	if(isset($_GET['E_IDTSR']))
		{
			$E_IDTSR=$_GET['E_IDTSR'];
			$EC_Name4=$_GET['EC_Name1'];
			$Date=date('d-m-y');
		
		echo "$Date";
		
		$DS1=$xDB->SELECTDATA("select * from tbleventrequests where e_id='$E_IDTSR' and emp_id='$Emp_ID'");
		if(mysql_num_rows($DS1)>0)
		{
echo '<script language="javascript">';
  echo 'alert("You have already participated for this event ")';  
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByEC.php?EC_Name1=$EC_Name4';>";
			
		}
		
		else{
		
		$xDB->DMLCOMMANDS("insert into tbleventrequests values('','$Emp_ID','$E_IDTSR','$Date','pending')");
		

echo '<script language="javascript">';
  echo 'alert("You have participated for the event Successfully")';  //not showing an alert box.
  echo '</script>';
    		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventsByEC.php?EC_Name1=$EC_Name4';>";
		}
		
		}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Categorized Events | Blue Pumpkin</title>

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
					<a href="#">Categorized Events<span>View Events by Event's Category</span></a>
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
    <h1 align="center">Categorized Events</h1>
<div class="form">
<form method="get" action="View_EventsByEC.php">
<table  align="center" class="table1">
	<tr>

    	<td><label>Event Cateogory:</label></td>
        <td><select name="cmbE_CName" >
        <?php
		$DS=$xDB->SELECTDATA("select EC_Name from tblEventscategory");		

		for($i=0;$i<mysql_num_rows($DS);$i++)
		{
			$xRow=mysql_fetch_array($DS);
			echo "<option> $xRow[0]</option>";
		}
		?>
        </select></td>

	</tr>
    <tr><td colspan="2" align="right"><span class="button b1"><input type="submit" value="View" name="btnView_EventsByEC"></span></td></tr>
    
    </table>
</form>
</div>

	<div class="fixw">

    			<blockquote class="huge">
            Pages: 
            <?php
			
				if(isset($_GET['EC_Name1']))
	{
		$EC_Name2=$_GET['EC_Name1'];

				$DS2=$xDB->SELECTDATA("select e.e_id,e.ec_id, ec.ec_id,ec.ec_name   from tblevents e, tbleventscategory ec where e.ec_id=ec.ec_id and ec.ec_name='$EC_Name2'");
			
for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
{
	echo"<a href='View_EventsByEC.php?E_IDFV=$a&EC_Name1=$EC_Name2'>&nbsp;$a</a>";
}

	}?>

			</blockquote>

    
    
    
    
    
    

  <?php              
                		if(isset($_GET['E_IDFV']))
		{ 
					$E_IDFV=$_GET['E_IDFV'];
			 
		

		$EC_Name3=$_GET['EC_Name1'];
		
			
			$DS1=$xDB->SELECTDATA("Select EC.EC_ID, EC.EC_Name, E.E_ID, E.E_Name, E.E_Date, E.EC_ID, E.E_img, E.E_Desc from tbleventscategory EC, tblevents E Where E.EC_ID = EC.EC_ID and ec.ec_name='$EC_Name3' limit $E_IDFV, 5 ");
$xTROWS=mysql_num_rows($DS1);
for($j=0; $j<$xTROWS; $j++)
{
	$xROW1 = mysql_fetch_array($DS1);
	
echo "			<div class='three-fourth'>";
echo "			<ul class='rooms'>";
echo "				<li>";

echo"	<div class='pic'><a href='../Admin/Resize_E_Img.php?E_IDTVP=$xROW1[6]' rel='colorbox'><img src='../Images/E_Img/$xROW1[6].jpeg' width=200 height=100></a></div>";
				echo "	<div class='desc'>";
					echo "	<h2>$xROW1[3]</h2>";
			echo"			<p>$xROW1[7]</p>";
echo"						<p>
							<a href='View_EventDetailsTSR.php?E_IDTSR=$xROW1[2]&EC_Name=$EC_Name3' class='button b9'>Details</a>&nbsp;&nbsp;&nbsp;<span class='rednotice'>$xROW1[4]</b></span>
							<a href='View_EventsByEC.php?E_IDTSR=$xROW1[2]&EC_Name1=$EC_Name3' class='button b8' style='float:right'>Participate</a>
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