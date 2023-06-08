<?php
    $count = 0;
    $cartID = 0;
    // is the user logged in?
    if(isset($_SESSION['session_userID'])) {
        $has_cart = active_cart($_SESSION['session_userID']); // cart_model.php
        $result = $has_cart -> fetch();

        if($result) { // user has a cart
            $cartID = $result[0]; // set cartID
            $count = item_count($cartID); // item_model.php
        }
    }
    else {
        // do nothing
    }
?>
 <a class=' scrollto  d-lg-flex' href='checkout.php?cart_id=<?php echo $cartID ?>' >
   <i class='fa-solid fa-cart-shopping text-warning fa-2xl'>
        <small class='badge  border border-secondary rounded-circle' style='color:#f00;'> 
          <?php echo $count ?> 
       </small>
    </i>
 </a>