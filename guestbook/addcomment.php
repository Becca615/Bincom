<?php
include("config.php");

	$name=$_POST['name'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];
	
	$insert =mysqli_query($db, "INSERT INTO `guestbook`(`name`, `email`, `comment`) 
									VALUES ('$name','$email','$comment')");
	

	if ($insert == true ){

		//echo "success";
		header('location:http://localhost/dami/bincom/guestbook/');
	}else{
		echo "failed";
	}
