<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $time = date("h:i:s", time());
    echo $time;
    // if($decoded){
    //     include "connect.php";
    //     $jwt = $decoded->jwt;
    //     $comment = $decoded->comment;
    //     $movieId = $decoded->id;

    //     $insertQuery = "INSERT INTO `usercomments`(`movieId`, `comment`, `jwt`) VALUES ('$movieId','$comment','$jwt')";
    //     $insertQueryRun = mysqli_query($conn,$insertQuery);        
    // }

<<<<<<< HEAD
    // include "disconnect.php"
?>
=======
        $insertQuery = "INSERT INTO `usercomments`(`movieId`, `comment`, `jwt`) VALUES ('$movieId','$comment','$jwt')";
        $insertQueryRun = mysqli_query($conn,$insertQuery);        
    }
<<<<<<< HEAD
?>
=======

    include "disconnect.php"
?>
>>>>>>> 68674e3a6a58f26670f9bb6f7a8dfc59fe610bb8
>>>>>>> 8dc5d6d1cbfa2b8e55b6b60ecaf2676a59cb42ba
