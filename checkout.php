
<?php
    include('includes/bundle.php'); 

    $cartID = 0;
    if(isset($_GET['cart_id'])) {
        $cartID = $_GET['cart_id'];
    }
    $cart = get_cart_items($cartID);
    
// calculate cart totals 
    $cartID = $cartID; // Replace with your actual cartID
    $cartItems = get_cart_items_total($cartID);

    // Retrieve values from the cartItems array
    $subtotal = $cartItems['subtotal'];
    $tax = $cartItems['tax'];
    $shipping = $cartItems['shipping'];
    $grandTotal = $cartItems['grandTotal'];

    // delete item from cart
    if(isset($_POST['delete'])) {
        $itemID = $_POST['itemID'];
        delete_item($itemID);
        header("Location: checkout.php?cart_id=$cartID");
    }

    // close cart 
    if(isset($_POST['completePurchase']) && isset($_SESSION['session_userID'])) {
        header("Location: client.php");
        exit();
    }
    
    
    
    
?>

<div class="d-flex justify-content-center flex-nowrap">
    <h1>Your Cart</h1>
    <hr>
</div>
<br>
<br>
    <!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        
                        <th>Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach($cart as $c) : ?>
                    <tr>
                        <td class="align-middle"><img src="<?php echo $c['Image']; ?>" alt="" style="width: 50px;"></td>
                        <td class="align-middle"><?php echo $c['Name']; ?></td>
                        <td class="align-middle">$<?php echo $c['Price']; ?></td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <!-- <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div> -->
                                <input type="number" readonly class="form-control form-control-sm bg-light border-0 text-center" value=<?php echo $c['Qty']; ?> >
                                <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>" />
                                <!-- <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div> -->
                            </div>
                        </td>
                        <td class="align-middle">$<?php echo $c['Subtotal']; ?></td>
                        <td class="align-middle">
                          <form method="POST">
                            <input type="hidden" name="itemID" value="<?php echo $c['Item']; ?>" />
                            <button type="submit" name="delete" class="btn btn-sm btn-danger">   
                                <i class='fa fa-times'></i>
                            </button>
                          </form>
                            
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <div class="col-lg-4">
               
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-success text-light pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$<?php echo "$subtotal"; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tax Rate</h6>
                            <h6 class="font-weight-medium">$<?php echo "$tax"; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$<?php echo "$shipping"; ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?php echo "$grandTotal"; ?></h5>
                        </div>
                        <form method="POST">
                            <button name="completePurchase" type="submit" class="btn btn-block text-uppercase btn-warning font-weight-bold my-3 py-3">
                                continue checkout
                            </button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- Cart End -->

<?php
    include('components/footer.php');    
?>