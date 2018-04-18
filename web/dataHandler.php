<?php
	function fetch_comment($movieId,$commentConn,$comment_db)
	{
		$sql = "SELECT * FROM `$comment_db` WHERE MovieID = '$movieId'";
		$result = mysqli_query($commentconn,$sql);
		while($val = mysqli_fetch_array($result))
		{

		}
	}
	function add_comment($movieId,$userEmail,$comment,$commentConn,$comment_db)
	{
		$sql = "INSERT INTO  `$comment_db` (MovieID, UserEmail, Comment) VALUES ('$movieId','$userEmail','$comment')";
		$result = mysqli_query($commentconn,$sql);
		if(!$result)
			return -1;
	}
	function search_review($movieId,$reviewConn,$movieReview_db)
	{
		$sql = "SELECT * FROM `$movieReview_db` WHERE MovieID = '$movieId'";
		$result = mysqli_query($commentconn,$sql);
		if($result)
			return "true";
		else
			return "false";
	}
	function add_review($movieId,$review,$description,$reviewConn,$movieReview_db)
	{
		$sql = "INSERT INTO  `$movieReview_db` (MovieID, Description, Review) VALUES ('$movieId','$description','$review')";
		$result = mysqli_query($reviewConn,$sql);
		if(!$result)
			return -1;
	}
	function modify_review($movieId,$review,$description,$reviewConn,$movieReview_db)
	{
		if(strcmp(search_review($movieId,$reviewConn,$movieReview_db),"false") == 0)
		{
			return -1;
		}
		$sql = "INSERT INTO  `$movieReview_db` (MovieID, Description, Review) VALUES ('$movieId','$description','$review')";
		$result = mysqli_query($reviewConn,$sql);
		if(!$result)
			return -1;
	}
	function get_all_reviews($reviewConn,$movieReview_db)
	{
		$sql = "SELECT * FROM `$movieReview_db` WHERE 1";
		$result = mysqli_query($reviewConn,$sql);
		while ($val = mysqli_fetch_array($result)) {
		}
	}
	function get_all_comments($commentConn,$comment_db)
	{
		$sql = "SELECT * FROM `$comment_db` WHERE 1";
		$result = mysqli_query($commentConn,$sql);
		while ($val = mysqli_fetch_array($result)) {
		}
	}
 ?>
