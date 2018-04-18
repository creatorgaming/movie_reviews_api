<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        include "connect.php";
        include "commentClass.php";
        $movieId = $decoded->id;
        $comments = array();
        $commentsEntry = new commentClass();

        $fetchQuery = "SELECT jwt,comment FROM usercomments WHERE movieId = '$movieId'";
        $fetchQueryRun = mysqli_query($conn,$fetchQuery);

        while($result = mysqli_fetch_assoc($fetchQueryRun)){
            $jwt = $result['jwt'];
            $comment = $result['comment'];
            $commentsEntry->jwt = $jwt;
            $commentsEntry->comment = $comment;
            // $commentsEntry->changeObjectAttributes($jwt,$comment);
            $comments[] = $commentsEntry;
        }    
    }
    echo json_encode($comments);
?>