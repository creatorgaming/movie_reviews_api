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

    include "disconnect.php"
?>