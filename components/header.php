<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>login app </title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <span>MY App</span>
        <div class="forms">
            <?php
               if($_SESSION['id']) {
                   echo "  <form action=\"./includes/logout.inc.php\" method=\"POST\">
                              <button class=\"btn-primary\" name=\"logout_submit\" type=\"submit\">Logout</button>
                           </form>";
               }else{
                   echo  "  <form  action=\"./includes/login.inc.php\" method=\"POST\">
                                <input type=\"text\" name=\"uid\" placeholder=\"username or email\">
                                <input type=\"password\" name=\"pass\" placeholder=\"password\">
                                <button class=\"btn-primary\" name=\"login_submit\" type=\"submit\">Login</button>
                            </form>

                            <form action=\"./signup.php\">
                                <button class=\"btn-primary\" name=\"login_submit\" type=\"submit\">Sginup</button>
                            </form>";
               }
            ?>

        </div>
</nav>