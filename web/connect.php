<?php 
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "radiant-dusk-89811";   
    $conn = mysqli_connect($servername,$username,$pass,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "<br>!! Database Connected successfully !!<br>";
?>