<?php
    include "connect.php";
    $movieId = $_GET['id'];
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
