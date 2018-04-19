<?php
    include 'connect.php';

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        $descprition = $decoded->description;
        $movieId = $decoded->id;
        $review = $decoded->review;
        $rating = $decoded->rating;

        $duplicateCheck = "SELECT * FROM movieinfo WHERE
                                 movieId = '$movieId'";
        $duplicateCheckQueryRun = mysqli_query($conn,$duplicateCheck);
        $duplicateCheckQueryResult = mysqli_fetch_assoc($duplicateCheckQueryRun);
        if(!$duplicateCheckQueryResult){
            $insertQuery = "INSERT INTO `movieinfo`(movieId, description, review, rating) VALUES ('$movieId','$descprition','$review','$rating')";
            $insertQueryRun = mysqli_query($conn, $insertQuery);

            if($insertQueryRun){
                echo "INSERT query ram";
                echo json_encode(1);
            }else {
                echo json_encode(NULL);
            }
            
        }else {
            echo json_encode(NULL);
        }
    }else {
        echo json_encode(NULL);
    }
        include "disconnect.php";
?>
