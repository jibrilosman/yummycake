
<?php
    include('includes/bundle.php'); 

    if(isset($_POST['logout'])) {
        session_unset(); // clears
		session_destroy(); // destroys our Sessions!
        header('Location: index.php');
        exit();
        
	}
    if(isset($_POST['userName']) && isset($_POST['password'])) {
        $user = $_POST['userName'];
        $pass = $_POST['password'];
        $loggedIn = login($user, $pass);
        $result = $loggedIn->fetch();

     if($result) {
        $userID = $result[0]; // set userID
        $userName = $result[1]; // set username
        $_SESSION['session_userID'] = $userID;
        $_SESSION['session_userName'] = $userName;
        header('Location: index.php');
        exit();
    }
} 
?>


<section class="vh-100 bg-image"
style="background: url('assets/images/42446.jpg');background-size:contain;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>
            <?php if(isset($_SESSION['session_userName'])) {
                echo "Welcome back " . $_SESSION['session_userName'];
                
                echo "<form method='POST'>";
                echo "<input type='hidden' name='logout'>";
                echo "<button>logout</button><br/>";
                echo "</form>"; 
            } else {       
              echo "<form method='Post'>";

                echo "<div class='form-outline mb-4'>";
                echo "<input type='text' id='form3Example1cg' name='userName' class='form-control form-control-lg' required />";
                echo "<label class='form-label' for='form3Example1cg'>User Name</label>";
                echo "</div>";

                // echo "<div class='form-outline mb-4'>";
                // echo "<input type='email' id='form3Example1cg' name='email' class='form-control form-control-lg' />";
                // echo "<label class='form-label' for='form3Example1cg'>Email</label>";
                // echo "</div>";

                echo "<div class='form-outline mb-4'>";
                echo "<input type='password' id='form3Example1cg' name='password' class='form-control form-control-lg' required />";
                echo "<label class='form-label' for='form3Example1cg'>Password</label>";
                echo "</div>";

                echo "<div class='d-flex justify-content-center '>";
                echo "<button class='btn btn-success  btn-block btn-lg gradient-custom-4 '>Login&nbsp&nbsp";
                echo "<i class='fa fa-right-to-bracket fa-beat text-white'></i>";
                echo "</button>";
                echo "</div>";

                echo "<p class='text-center text-muted mt-5 mb-0'>Not a user!! "; 
                echo "<a href='register.php' class='fw-bold text-body'><u>Click here to Sign Up</u></a></p>";

              echo "</form>";
            } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    include('components/footer.php');    
?>