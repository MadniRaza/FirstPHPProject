<?php
error_reporting(0);
include "../ConnectDB.inc"; // including Database Connection File
$xDB=new ConnectDB(); // Making object of database Connection File

if(isset($_GET['btnView_EventRequests']))
		{
			$E_Date=$_GET['txtE_Date'];
			$EC_Name=$_GET['cmbE_CName'];
			$E_Request=$_GET['rdoRequests'];

			
	
			$DS=$xDB->SELECTDATA("Select EC_ID from tbleventscategory where ec_name='$EC_Name'");
			$xROW1=mysql_fetch_array($DS);
			$EC_ID=$xROW1[0];

		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date&EC_ID1=$EC_ID&E_Request1=$E_Request&EC_Name1=$EC_Name';>";		
			
	}

			
	if(isset($_GET['ER_IDFA']))
		{
			$ER_IDFA=$_GET['ER_IDFA'];
			$E_Date4=$_GET['E_Date1'];
			$E_Request4=$_GET['E_Request1'];
			$EC_ID4=$_GET['EC_ID1'];
			$EC_Name4=$_GET['EC_Name1'];

			
		$DS1=$xDB->SELECTDATA("select * from tbleventrequests where er_id='$ER_IDFA' and er_status='accepted'");
		if(mysql_num_rows($DS1)>0)
		{
			 echo '<script language="javascript">';
  echo 'alert("Satus of this Request is already ACCEPTED,")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		

  
  
  
  
  
			
			}
		
		else
{
					$DS1=$xDB->SELECTDATA("update tbleventrequests set er_status='accepted' where er_id='$ER_IDFA'");
							 echo '<script language="javascript">';
  echo 'alert("Request Accepted Successfully")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		
  
}
		}
		else 	if(isset($_GET['ER_IDFD']))
		{
			$ER_IDFD=$_GET['ER_IDFD'];
						$E_Date4=$_GET['E_Date1'];
			$E_Request4=$_GET['E_Request1'];
			$EC_ID4=$_GET['EC_ID1'];
			$EC_Name4=$_GET['EC_Name1'];

			
						
		$DS1=$xDB->SELECTDATA("select * from tbleventrequests where er_id='$ER_IDFD' and er_status='denied'");
		if(mysql_num_rows($DS1)>0)
		{
			 echo '<script language="javascript">';
  echo 'alert("Satus of this Request is already "/Denied/"")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		
			
			}
		
		else
{

			
			
			
			
					$DS1=$xDB->SELECTDATA("update tbleventrequests set er_status='denied' where er_id='$ER_IDFD'");
												 echo '<script language="javascript">';
  echo 'alert("Request Denied Successfully")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		

}
		}

else 	if(isset($_GET['ER_IDFP']))
		{
			$ER_IDFP=$_GET['ER_IDFP'];
						$E_Date4=$_GET['E_Date1'];
			$E_Request4=$_GET['E_Request1'];
			$EC_ID4=$_GET['EC_ID1'];
			$EC_Name4=$_GET['EC_Name1'];

			
			
						
		$DS1=$xDB->SELECTDATA("select * from tbleventrequests where er_id='$ER_IDFP' and er_status='pending'");
		if(mysql_num_rows($DS1)>0)
		{
			 echo '<script language="javascript">';
  echo 'alert("Satus of this Request is already Pending,")';  //not showing an alert box.
  echo '</script>';
  		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		
			
			}
		
		else
{

			
			
								$DS1=$xDB->SELECTDATA("update tbleventrequests set er_status='pending' where er_id='$ER_IDFP'");
								
															 echo '<script language="javascript">';
  echo 'alert("Request is  Pending,Can be Accepted or denied later")';  //not showing an alert box.
  echo '</script>';
    		echo "<meta http-equiv='Refresh'; Content='0; URL=View_EventRequests.php?E_Date1=$E_Date4&EC_ID1=$EC_ID4&E_Request1=$E_Request4&EC_Name1=$EC_Name4';>";		

}

		}
			


?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Requests Sent By Employees | Blue Pumpkin</title>

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

 if(document.form1.cmbE_CName.value=="")
  {
    alert("Plese Enter Event Category to Search");
	document.form1.cmbE_CName.focus();
	return false;
  }
  
else if(document.form1.rdoRequests[0].checked != true && document.form1.rdoRequests[1].checked != true && document.form1.rdoRequests[2].checked != true)
  {
    alert("Plese Select your choice ");
	document.form1.rdoRequests[0].focus();
	return false;
  } 
  else if(document.form1.txtE_Date.value=="")
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
              		<li><a href="View_EventWinnerByED.php">View By Event Date</a></li>
					</ul>
				</li>
                
				<li>
					<a href="#">Paritipants Requests<span>Accept/Deny Requests</span></a>
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
<form method="GET" action="View_EventRequests.php" name="form1" onSubmit="return check();" >

<table border="1" cellpadding="5" cellspacing="5" align="center" class="table1" >
	<tr>
    	<td><label>Event Cateogory:</label></td>
        <td><select name="cmbE_CName" class="sel">
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
    	<tr>
    	<td><label>Select Choice</label></td>
        <td><input type="radio" name="rdoRequests" value="Accepted" >Accepted
    <input type="radio" name="rdoRequests" value="Denied">Denied
             <input type="radio" name="rdoRequests" value="Pending">Pending</td>
	</tr>
        <tr>
        <td><label>Enter Date</label></td>
        <td><input type="text"  name="txtE_Date" pattern="[0-9]{2}[-/]+[0-9]{2}[-/]+[0-9]{2}" class="required field_message"></td>
	</tr>

    <tr>
        <td colspan="2" align="right"><span class="button b9"> <input type="submit" value="View" name="btnView_EventRequests"></span></td>
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
			
			$E_Date2 = $_GET['E_Date1'];
			$EC_ID2= $_GET['EC_ID1'];
			$E_Request2=$_GET['E_Request1'];
			$EC_Name2=$_GET['EC_Name1'];
			
		
		//echo "$E_Date2 | $EC_ID2 | $E_Request2 ";
		
			$DS2=$xDB->SELECTDATA("select ER.ER_ID,ER.E_ID,ER.ER_STATUS,E.EC_ID,E.E_ID,E.E_Date from tbleventrequests ER, tblevents E where ER.E_ID=E.E_ID and E.E_Date='$E_Date2' and E.EC_ID='$EC_ID2' and ER.ER_STATUS='$E_Request2'");
			
		for($a=0;$a<mysql_num_rows($DS2);$a=$a+5)
		{
			echo "<a href='View_EventRequests.php?ER_IDFV=$a&E_Date1=$E_Date2&EC_ID1=$EC_ID2&E_Request1=$E_Request2&EC_Name1=$EC_Name2'> $a</a>";
		}	

	}
				
		?>

			</blockquote>


    
<?php
	if(isset($_GET['ER_IDFV']))
		{ 
			$ER_IDFV=$_GET['ER_IDFV']; 
			$E_Date3 = $_GET['E_Date1'];
			$EC_ID3=$_GET['EC_ID1'];
			$E_Request3=$_GET['E_Request1'];
			$EC_Name3=$_GET['EC_Name1'];
			$DS=$xDB->SELECTDATA("select ER.ER_ID,ER.E_ID,ER.ER_STATUS,ER.Emp_ID,E.EC_ID,E.E_ID,E.E_Date, E.E_Name,ER.ER_Date,Emp.EMp_id,emp.emp_name from tbleventrequests ER, tblevents E,tblemployees emp where ER.E_ID=E.E_ID and emp.emp_id=er.emp_id and E.E_Date='$E_Date3' and E.EC_ID='$EC_ID3' and ER.ER_STATUS='$E_Request3' limit $ER_IDFV,5");
for($i=0;$i<mysql_num_rows($DS); $i++)
			{
				$xROW=mysql_fetch_array($DS);
				$Month=date('M',strtotime($xROW[6]));
				$Day=date('d',strtotime($xROW[6]));
		echo "<div class='posts-month'>$Month</div>";
		echo "<div class='post-item'>";
		echo "<div class='day'> $Day</div>";
		echo "<div class='date'>Date:$xROW[6]</div>";
		echo"<div class='text'>";
		echo "<a href='Resize_E_Img.php?E_IDTVP=$xROW1[5]' rel='colorbox'><img src='../Images/E_Img/$xROW[5].jpeg' height=100 width=100 class='border left' alt='Image Sample'/></a>";
			echo"<h2>$xROW[7]</h2>";
echo "<hr>";
echo"<div class='post-tags'>";
echo "<b> Request Sent By: <a href='Resize_Emp_Img.php?Emp_IDTVP=$xROW[9]' rel='colorbox'>$xROW[10] </a> &nbsp; &nbsp; &nbsp;| &nbsp;<a  href='View_EventRequests.php?ER_IDFA=$xROW[0]&E_Date1=$E_Date3&EC_ID1=$EC_ID3&E_Request1=$E_Request3&E_CName1=$EC_Name3'>Accept |</a>
<a href='View_EventRequests.php?ER_IDFD=$xROW[0]&E_Date1=$E_Date3&EC_ID1=$EC_ID3&E_Request1=$E_Request3&E_CName1=$EC_Name3'>Deny |</a>
<a href='View_EventRequests.php?ER_IDFP=$xROW[0]&E_Date1=$E_Date3&EC_ID1=$EC_ID3&E_Request1=$E_Request3&E_CName1=$EC_Name3'>Pending</a></b>";
echo"				</div>";

			
			echo "</div>";
			echo "<div class='clear'></div>";
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