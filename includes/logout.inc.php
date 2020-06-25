<?php
session_start();
if(isset($_POST['logout_submit'])) {


    session_unset();
    session_destroy();
    header("Location: ../index.php");
}else{
    header("Location: ../index.php");
}