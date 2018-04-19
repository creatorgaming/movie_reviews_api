<?php
	$host = '';
	$user = '';
	$password = '';
	$movieReview_db = '';
	$comment_db = '';
	$users_db = '';
	$typeOfRequest = '';
	$reviewConn = mysqli_connect($host,$user,$password,$movieReview_db);
	$commentConn = mysqli_connect($host,$user,$password,$comment_db);
	$userConn = mysqi_connect($host,$user,$password,$users_db);
	if(mysqli_connect_errno())
	{
			echo "Could not connect: ".mysqli_connect_errno()."<br>";
	}

 ?>
