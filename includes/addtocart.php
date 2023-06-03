<?php
    
    // user has clicked an Add to Cart button
    if(isset($_POST['productID']) && isset($_SESSION['session_userID'])) {
        $productID = $_POST['productID'];
        $qty = $_POST['qty'];
        // check for cart
        $has_cart = active_cart($_SESSION['session_userID']);
        $result = $has_cart -> fetch();

        if($result) { // user has an active cart
            // adding a new item with that cartID
            $cartID = $result[0]; // set cartID
            add_item($cartID, $productID, $qty);
        }
        else { // user DOES NOT have an active cart
            // create new cart
            create_cart($_SESSION['session_userID']);
            // add new item with the new cartID
            $has_cart = active_cart($_SESSION['session_userID']);
            $result = $has_cart -> fetch();
            if($result) {
                // if user has an active cart
                // adding a new item with that cartID
                $cartID = $result[0]; // set cartID
                add_item($cartID, $productID, $qty);
            }
        }
        header("Location: index.php");
        exit();
    } // add product if
    else if(isset($_POST['productID'])) {
        include('includes/toast.php');
    }
    else {
        // do nothing
    }
?>