<?php
  
    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit();

    }
?>


<div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Yummy<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Menu</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>   
          <?php  
             if(isset($_SESSION['session_userName'])) {
                echo "<span style='position:absolute; top:4%; left:50%;transform: translate(-50%, -50%); color:#00f;'>welcome back , " . $_SESSION['session_userName'] . "!</span>";
                echo "<li><a href='index.php?logout' class='text-danger'>Logout</a></li>";
                
                } else {
                 echo "<li><a href='login.php' class='text-success'>Login</a></li>";
                } 
                include('components/cart.php');
          ?>

          
          
<!-- <i class="bi bi-cart-fill"><span>(0)</span></i> -->
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>