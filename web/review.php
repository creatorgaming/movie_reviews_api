<?php
    $movieId = $_GET['id'];
    $review = NULL;
    if($movieId){
        include "connect.php";
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
