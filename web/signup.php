<?php  
    include 'connect.php';
    
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $email = $decoded->email;
    $password = $decoded->password;
    $name = $decoded->name;
    $hashCode;
    $hashCodeString;

    //  Find if the email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        GLOBAL $hashCode;
        $hashCode = NULL;
    }else {
        GLOBAl $hashCode;
        GLOBAL $hashCodeString;
        $duplicateCheckQuery = "SELECT * FROM userLoginInfo 
                                WHERE email = '$email' ";
        $query = mysqli_query($conn,$duplicateCheckQuery);
        if(!$query){
            echo "ERROR";
        }
        $duplicateCheckQueryResult = mysqli_fetch_assoc($query);
        if(!$duplicateCheckQueryResult){
            $hashCodeString = $name.$password;
            $hashCode = md5($hashCodeString);
            $query = "INSERT INTO userLoginInfo (`name`, `email`, `password`, `hash`) 
                        VALUES ('$name','$email','$password',MD5('$hashCodeString'))";
            mysqli_query($conn, $query);
        }else{
            echo "Duplicate Email";
        }
    }
    echo json_encode($hashCode);
?>