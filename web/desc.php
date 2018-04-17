<?php
    include "connect.php";

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $movieId = $decoded->id;
    $description = NULL;
    if($movieId){
        $query = "SELECT description FROM movieinfo WHERE 
                    movieId = '$movieId' ";
        $queryRun = mysqli_query($conn,$query);
        $queryResult = mysqli_fetch_assoc($queryRun);
        if($queryResult){
            $description = $queryResult['description'];        
        }        
    }
    
    echo json_encode($description);
    include "disconnect.php";
?>