<?php
class ConnectDB 
{
	function DMLCOMMANDS($Query)
	{
	
		$CN=mysql_connect("localhost","root","");		
		mysql_select_db("bluePumpkindb",$CN);	
		mysql_query($Query,$CN);
		mysql_close($CN);
	}
	
	function SELECTDATA($Query)
	{
		$CN=mysql_connect("localhost","root","");		
		mysql_select_db("BluePumpkinDB",$CN);	
		$DS=mysql_query($Query,$CN);
		mysql_close($CN);	
		return $DS;
	}	

}














?>