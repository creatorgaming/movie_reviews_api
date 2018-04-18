<?php
    include "connect.php";

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $movieId = $decoded->id;
    $description = array();
    if($movieId){
        $query = "SELECT description,rating FROM movieinfo WHERE 
                    movieId = '$movieId' ";
        $queryRun = mysqli_query($conn,$query);
        $queryResult = mysqli_fetch_assoc($queryRun);
        if($queryResult){
            $description[0] = $queryResult['description'];
            $description[1] = $queryResult['rating'];                
        }        
    }
    
    echo json_encode($description);
    include "disconnect.php";
?>