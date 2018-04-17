<?php
    include 'connect.php';
    //$query = "INSERT INTO `movieinfo` VALUES ('tt1375666','','')";
    // $done = mysqli_query($conn,$query);
    // if($done){
    //     echo "done";
    // }

    $movies = array();
    $getMovieQuery = "SELECT movieId FROM movieinfo";
    while($row = mysqli_fetch_array(mysqli_query($conn,             $getMovieQuery))){
        $movies[] = $row['movieId'];
    }
    echo json_encode($movies);

    include "disconnect.php";
?>