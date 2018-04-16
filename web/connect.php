<?php 
<<<<<<< HEAD
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12233034";
    $pass = "bSsMvMeKgB";
    $database = "sql12233034";   
    // $servername = "localhost";
    // $username = "root";
    // $pass = "";
    // $database = "radiant-dusk-89811";
    $conn = mysqli_connect($servername,$username,$pass,$database);
=======
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "radiant-dusk-89811";   
    $conn = mysqli_connect($servername,$username,$password,$database);
>>>>>>> heroku/master
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "<br>!! Database Connected successfully !!<br>";
?>