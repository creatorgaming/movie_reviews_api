<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    
    if($decoded){
        include "connect.php";
        include "commentClass.php";
        
        $date = date("d/m/y", time());
        $jwt = $decoded->jwt;
        $comment = $decoded->comment;
        $movieId = $decoded->id;

        $insertQuery = "INSERT INTO `usercomments`(movieId, comment, date, jwt) VALUES ('$movieId','$comment','$date','$jwt')";
        $insertQueryRun = mysqli_query($conn,$insertQuery);
        if($insertQueryRun) {
            $returnObject = new commentClass($jwt,$comment,$date); 
            echo json_encode($returnObject);
        }else {
            echo json_encode(0);
        }
    }else {
        echo json_encode(0);
    }
?>