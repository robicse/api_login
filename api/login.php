<?php
	include_once('../db.php');
	
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	// Perform queries
	$query_result = mysqli_query($con,"SELECT * FROM users where username='$username' and password='$password'");
	$cnt=mysqli_num_rows($query_result);
	$row=mysqli_fetch_array($query_result);
	if($cnt)
	{
		$response["result"] = array();
		$response['success']=true;
		
		$result = array();
		$result['username']=$row['username'];
		$result['email']=$row['email'];
		$result['password']=$row['password'];
		array_push($response["result"], $result);
	}
	else
	{
		$response['success']=false;
		//$response['message']="Sorry you enter an invalid mail address";
	}
	
	header('Content-Type: application/json');
	echo json_encode($response);
	
	/* mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age)
	VALUES ('Glenn','Quagmire',33)"); */

	//mysqli_close($con);
?> 

