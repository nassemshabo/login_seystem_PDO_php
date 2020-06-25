
<?php  require('./components/header.php') ?>
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