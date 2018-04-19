<?php
    include 'connect.php';

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    
    if($decoded){
        $descprition = $decoded->description;
        $movieId = $decoded->id;

        $query = "SELECT * FROM movieinfo WHERE
                                 movieId = '$movieId'";
        $queryRun = mysqli_query($conn,$query);
        $queryResult = mysqli_fetch_assoc($queryRun);
        if($queryResult){
            $deleteQuery = "DELETE FROM `movieinfo` WHERE movieId = '$movieId'";
            $deleteQueryRun = mysqli_query($conn, $deleteQuery);

            if($deleteQueryRun){
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
