<?php
    include 'connect.php';

    //$query = "INSERT INTO `movieinfo` VALUES ('tt1375666','','')";
    // $done = mysqli_query($conn,$query);
    // if($done){
    //     echo "done";
    // }

    $movies = array();
    $getMovieQuery = "SELECT movieId FROM movieinfo";
    $getMovieQueryRun = mysqli_query($conn,$getMovieQuery);
    while($row = mysqli_fetch_array($getMovieQueryRun)){
        $movies[] = $row['movieId'];
    }
    echo json_encode($movies);
    include "disconnect.php";
?>
