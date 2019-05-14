<!doctype html>

<?php 
  session_start();
  $_SESSION['signedIn'] == false;
  
?>
<html lang="en">

<header>
  <div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
  
    
  </header>

<body>
    <!-- FOOTER -->
<footer style = "padding-top:500px"class="container">
      <?php
    include 'footer.php';?>
</footer>
<main>
</main>
</body>

</html>