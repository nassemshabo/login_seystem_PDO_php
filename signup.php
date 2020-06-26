
<?php
require('./components/header.php') ;



if($_GET['error']){
    switch ($_GET['error']) {
        case "invildmail":
            echo "<span style='color: red;'> invaild email </span>";
            break;
        case "emptyfields":
            echo "<span style='color: red;'> please fill the inputs</span>";
            break;
        case "invaliduid":
            echo "<span style='color: red;'> invaild usersname</span>";
            break;
        case "passnotsame":
            echo "<span style='color: red;'> password dont match </span>";
            break;
        case "userexist":
            echo "<span style='color: red;'> username already exist </span>";
            break;
        case "emailexist":
            echo "<span style='color: red;'> email already exist </span>";
            break;

        default:
            echo "<span style='color: green;'> created the account you can now sgin in </span>";
            break;
    }

}

?>
<body>

      <h1>signup</h1>
      <form action="includes/signup.inc.php" method="POST">
          <input type="text" name="username" placeholder="username"/>
          <input  name="email" placeholder="email"/>
          <input type="password" name="pwd" placeholder="password"/>
          <input type="password" name="pwd-repeat" placeholder="repeatPassword"/>
          <input type="submit" name="submit_signup"/>
      </form>
</body>
<?php  require('./components/footer.php') ?>