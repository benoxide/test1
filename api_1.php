<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 9/12/2017
 * Time: 9:56 AM
 */

 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temporary";
// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());

}



//$sql1 =SELECT `rule_obj`.operation FROM `rule_obj` WHERE rule_id in (SELECT rule_id FROM `rule_sub` WHERE empid = 1);  
$sql1 = "SELECT `rule_obj`.`operation`,`rule_obj`.`link` FROM `rule_obj` where  `rule_obj`.`rule_id` IN
		(SELECT `rule_sub`.`rule_id` FROM `rule_sub` WHERE `rule_sub`.`empid` = {$_POST['sub_id']})";


//$result = mysqli_query($conn, $sql1);

/*$sql1 = "SELECT * FROM `sub1` WHERE empid = {$_POST['sub_id']} ";

*/$result1 = mysqli_query($conn, $sql1);
/*
$sql2 = "SHOW COLUMNS FROM `sub1` ";

$result3 = mysqli_query($conn, $sql2);*/

$rules = mysqli_num_rows($result1);
/*
if ($rules > 0) {
    // output data of each row
	$Flag = True;
	$r_count = mysqli_num_rows($result);
    while($row1 = mysqli_fetch_assoc($result)) {
		$row2 = mysqli_fetch_assoc($result1);
	while($row = mysqli_fetch_assoc($result3))
	{
		
		$temp = $row["Field"];
		$tempv1 = $row1[$temp];
		$tempv2 = $row2[$temp];
		if($tempv1 == $tempv2){
			$Flag = True;
		}
		else
		{
			$Flag = False;
		}
		
			
	}
	if($Flag == True)
	{
		echo "access granted";
		break;
	}
	else
	{
		$r_count = $r_count-1;
    }
	}
	if($r_count == 0 and $Flag == False)
	{
		echo "acess not granted";
	}
	
} */
if($rules > 0){
	$outp = array();
	while($row1 = mysqli_fetch_assoc($result1))
	{
		$var = array();
		$var[] = $row1["operation"];
		$var[] = $row1["link"];
		$outp[] = $var;
	}
	echo json_encode($outp);
}

else {
	echo "0 results";
	}



