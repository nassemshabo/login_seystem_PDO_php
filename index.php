
<?php  require('./components/header.php') ?>
<body>
  <?php
      if($_SESSION['id']){
          echo  " <div class='profile'>
                     <h1> your Profile </h1>
                     <strong>username</strong>:" .$_SESSION['username']."<br>
                     <strong>Email</strong>: ".$_SESSION['email']."
                  </div>";


      } else{
          echo "<h1> you are sginOUt </h1>";
      }
  ?>
</body>
<?php  require('./components/footer.php') ?>