<?php
    include 'connect.php';

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        $description = $decoded->description;
        $movieId = $decoded->id;
        $review = $decoded->review;
        $rating = $decoded->rating;

        $duplicateCheck = "SELECT * FROM movieinfo WHERE
                                 movieId = '$movieId'";
        $duplicateCheckQueryRun = mysqli_query($conn,$duplicateCheck);
        $duplicateCheckQueryResult = mysqli_fetch_assoc($duplicateCheckQueryRun);
        if(!$duplicateCheckQueryResult){
            $insertQuery = "INSERT INTO `movieinfo`(movieId, description, review, rating) VALUES ('$movieId','$description','$review','$rating')";
            $insertQueryRun = mysqli_query($conn, $insertQuery);
            if($insertQueryRun){                
                echo json_encode(1);
            }
        }
    }
    include "disconnect.php";
?>
