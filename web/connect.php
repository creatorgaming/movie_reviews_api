<?php
     $servername = "sql12.freesqldatabase.com";
     $username = "sql12234220";
     $pass = "L3iXDvlqlg";
     $database = "sql12234220";
    //$servername = "localhost";
    //$username = "root";
    //$pass = "";
    //$database = "radiant-dusk-89811";
    $conn = mysqli_connect($servername,$username,$pass,$database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
