<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        include "connect.php";
        include "commentClass.php";
        $movieId = $decoded->id;
        $comments = array();
        $commentsEntry = new commentClass();

        $fetchQuery = "SELECT jwt,comment FROM userComments WHERE movieId = '$movieId'";
        $fetchQueryRun = mysqli_query($conn,$fetchQuery);
        $i = 0;
        while($result = mysqli_fetch_array($fetchQueryRun)){
            $jwt = $result['jwt'];
            $comment = $result['comment'];
            $commentsEntry->jwt = $jwt;
            $commentsEntry->text = $comment;
            // $commentsEntry->changeObjectAttributes($jwt,$comment);
            $comments[$i] = $commentsEntry;
            $i++;
        }    
    }
    echo json_encode($comments);
?>