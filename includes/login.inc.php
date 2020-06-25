<?php

if ( isset($_POST['login_submit'])){

    $uid = htmlspecialchars($_POST['uid']);
    $pass = htmlspecialchars($_POST['pass']);

    if ( empty($uid) || empty($pass)) {
        header("Location: ../index.php?error=emptyfields&uid=$uid.&pass=$pass");
        exit();
    }else{
        require ('./db.php');
        $sql = "SELECT * FROM users where username = :uid or email = :uid";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
                "uid" => $uid
        ]);
        if($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $userPass = password_verify($pass,$row['password']);
            if($userPass === false) {
                header("Location: ../index.php?error=wrongpassword");
                exit();
            }else if ($userPass === true){
               session_start();
               $_SESSION['id'] = $row['id'];
               $_SESSION['username'] = $row['username'];
               $_SESSION['email'] = $row['email'];
                header("Location: ../index.php?succes=signedin");
                exit();
            }
        }else{
            header("Location: ../index.php?error=wrongemail");
            exit();
        }

    }
}else {
    header("Location: ../index.php");
    exit();
}