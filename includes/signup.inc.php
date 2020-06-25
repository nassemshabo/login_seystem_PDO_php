<?php

if(isset($_POST['submit_signup'])){

    $username = htmlspecialchars($_POST['username']);
    $emai = htmlspecialchars($_POST['email']) ;
    $pass = htmlspecialchars($_POST['pwd']);
    $pass_rep = $_POST['pwd-repeat'];
    //validation
    if( empty($username) || empty($emai) || empty($pass)  || empty($pass_rep) ) {
       header("Location: ../signup.php?error=emptyfields&uid=$username&mail=$emai");
       exit();
    }else if (!filter_var($emai,FILTER_VALIDATE_EMAIL) ) {
        header("Location: ../signup.php?error=invildmail&uid=$username");
        exit();
    }else if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
        header("Location: ../signup.php?error=usernameerror&mail=$emai");
        exit();
    }else if ( $pass !== $pass_rep){
        header("Location: ../signup.php?error=passnotsame&mail=$emai&uid=$username");
        exit();
    }
    else{
        require ('db.php');
        $user = "SELECT * from users where username = :uid";
        $stmt = $conn->prepare($user);
        $stmt->execute([
            "uid" => $username
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row > 0 ) {
            header("Location: ../signup.php?error=userexist&mail=$emai");
            exit();
        }else {
            $hash_pass = password_hash($pass , PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username , email , password) values(:uid , :email , :pass )";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                "uid" => $username,
                "email" => $emai,
                "pass" => $hash_pass
            ]);
            $conn=null;
            header("Location: ../signup.php?error=finish");
            exit();
        }


    }
}else{
    header("Location: ../signup.php");
    exit();
}


