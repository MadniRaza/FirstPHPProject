<?php
include "../ConnectDB.inc"; // including Database Connection File
$xDB=new ConnectDB(); // Making object of database Connection File
			// What if user click on Add Admin Button
	if(isset($_POST['btnAdd_Admin'])) 
		{
		$A_FName=$_POST['txtA_FName'];
		$A_LName=$_POST['txtA_LName'];
		$A_Email=$_POST['txtA_Email'];
		$A_CNo=$_POST['txtA_CNo'];
		$A_Address=$_POST['txtA_Address'];
		$A_LoginName=$_POST['txtA_LoginName'];
		$A_LoginPass=$_POST['txtA_LoginPass'];
		$A_Jdate=$_POST['txtA_JDate'];
//		echo "$A_Address | $A_CNo | $A_Email | $A_FName | $A_Jdate | $A_LName | $A_LoginName  |$A_LoginPass";
		
		
		//==============Retreiving Image Details==============//
		$I_FN=$_FILES['A_Img']['name'];
		$I_FS=$_FILES['A_Img']['size']/1024;
		$I_FT=$_FILES['A_Img']['type'];
		$I_TN=$_FILES['A_Img']['tmp_name'];

		//Inserting Admin Details in to Database without Picture
		$xDB->DMLCOMMANDS("insert into 			tbladmin(A_ID,A_FName,A_Lname,A_Email,A_CellNo,A_Address,A_LoginName,A_LoginPass,A_JDate) values('','$A_FName','$A_LName','$A_Email','$A_CNo','$A_Address','$A_LoginName','$A_LoginPass','$A_Jdate'); ");
			//Updating Data to Give Picture id To user
	$DS=$xDB->SELECTDATA("select A_id from tbladmin order by a_id desc");
	$xRow=mysql_fetch_array($DS);
	$A_ID=$xRow[0];
	$xDB->DMLCOMMANDS("update tbladmin set A_img=".$A_ID." where A_id=".$A_ID."");			
		// Saving Image in to Directory
			if($I_FT=="image/jpeg" || $I_FT=="image/png" || $I_FT=="image/gif" || $I_FT=="image/jpeg")
			{
			if($I_FS<1024)	
				{
					$EXT=substr($I_FT,6,strlen($I_FT));
					$LOC="$A_ID"."."."$EXT";
					echo "$LOC";
					move_uploaded_file($I_TN,"../Images/A_Img/$LOC");	
				}
				else
					{
					 echo 'File must be less than 1 mb';
					}
				}
			else 
			 { 
			 	echo 'Only JPEG | PNG | GIF images are allowed ';
			}

		echo 'Data Saved';
		}
		
		




 ?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>ADD ADMIN DETAILS</h1>
<form enctype="multipart/form-data"  method="post" action="Add_Admin.php" >
<table border="1" cellpadding="5" cellspacing="5">
	<tr>
    	<td><label>Admin First Name:</label></td>
        <td><input type="text" name="txtA_FName"></td>
	</tr>
	<tr>
    	<td><label>Admin Last Name:</label></td>
        <td><input type="text" name="txtA_LName"></td>
	</tr>
   	<tr>
    	<td><label>Email:</label></td>
        <td><input type="email" name="txtA_Email"></td>
	</tr>
    	<tr>
    	<td><label>Cell No:</label></td>
        <td><input type="text" name="txtA_CNo"></td>
	</tr>
    	<tr>
    	<td><label>Address:</label></td>
        <td><textarea rows="2" cols="15" name="txtA_Address"></textarea></td>
	</tr>

	<tr>
    	<td><label>Image</label></td>
        <td><input type="file" name="A_Img"></td>
	</tr>
    <tr>
    	<td><label>Login Name</label></td>
        <td><input type="text" name="txtA_LoginName"></td>
	</tr>
    <tr>
    	<td><label>Password</label></td>
        <td><input type="text" name="txtA_LoginPass"></td>
	</tr>
    <tr>
    <tr>
    	<td><label>Joining Date</label></td>
        <td><input type="date" name="txtA_JDate"</td>
	</tr>
    <tr>
        <td><input type="submit" value="Submit" name="btnAdd_Admin"</td>
	</tr>
</table>



</form>
</body>
</html>