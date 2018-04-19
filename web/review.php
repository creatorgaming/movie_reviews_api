<?php
    include "connect.php";

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $movieId = $decoded->id;
    $review = NULL;
    if($movieId){
        $query = "SELECT review FROM movieinfo WHERE movieId = '$movieId' ";
        $queryRun = mysqli_query($conn,$query);
        $queryResult = mysqli_fetch_assoc($queryRun);
        if($queryResult){
            $review = $queryResult['review'];
        }
    }

    echo json_encode($review);
    include "disconnect.php";
?>
