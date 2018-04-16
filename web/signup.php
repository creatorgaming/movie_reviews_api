<<<<<<< HEAD
<?php  
    include 'connect.php';
    
=======
<?php
    include 'connect.php';

>>>>>>> heroku/master
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $email = $decoded->email;
    $password = $decoded->password;
    $name = $decoded->name;
    $hashCode;
<<<<<<< HEAD
    $hashCodeString;
=======
>>>>>>> heroku/master

    //  Find if the email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        GLOBAL $hashCode;
        $hashCode = NULL;
    }else {
        GLOBAl $hashCode;
<<<<<<< HEAD
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
=======
        $duplicateCheckQuery = "SELECT * FROM userlogininfo WHERE email = '$email' ";
        $duplicateCheckQueryResult = mysqli_fetch_assoc(mysqli_query($conn,$duplicateCheckQuery));
        if(!$duplicateCheckQueryResult){
            $hashCode = hash('md5',$name,$password);
            $query = "INSERT INTO userlogininfo (`name`, `email`, `password`, `hash`) VALUES ('$name','$email','$password','$hashCode')";
            mysqli_query($conn, $query);
            // if(mysqli_query($conn, $query)){
    		// 	echo "query saved";
	    	// }else{
    		// 	echo "query not saved";
	    	// }
            //echo "<br>".$hashCode."<br>";
        }else{
            echo json_encode("duplicate e-mail");
        }
    }
    echo "HASH CODE: ".json_encode($hashCode);
>>>>>>> heroku/master
?>