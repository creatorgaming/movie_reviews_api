<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        include "connect.php";
        $jwt = $decoded->jwt;
        $comment = $decoded->comment;
        $movieId = $decoded->id;

        $insertQuery = "INSERT INTO `usercomments`(`movieId`, `comment`, `jwt`) VALUES ('$movieId','$comment','$jwt')";
        $insertQueryRun = mysqli_query($conn,$insertQuery);        
    }
<<<<<<< HEAD
?>
=======

    include "disconnect.php"
?>
>>>>>>> 68674e3a6a58f26670f9bb6f7a8dfc59fe610bb8
