<?php
    include('includes/bundle.php');

    // Get cartID from session

    // Get cart items
    $cart = get_cart_items($cartID);

    // Get total items in cart
    $cartItems = get_cart_items_total($cartID);

    if(isset($_POST['deleteAll'])) {
        close_cart($cartID);
        delete_all_items($cartID);
        header("Location: index.php");
        exit();
    }
    
?>

<section class="container-fluid">
    <h1 class="text-center">Thank you for your purchase. </h1>
    <hr>
    <h3 class="text-center">We will ship your items to you as soon as possible.</h3>
    <br>
    <p class="text-center">Here is your order summary:</p>
    <div class="row px-xl-5">
        <div class="col-lg-10 text-center table-responsive mb-5">
            <table class="table table-light table-borderless text-center table-hover  mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cart as $c) : ?>
                    <tr>
                        <td class="fw-normal"><?php echo $c['Name']; ?></td>
                        <td class="fw-normal"><?php echo $c['Qty']; ?></td>
                        <td class="fw-normal">$<?php echo $c['Price']; ?></td>
                        <td class="fw-normal">$<?php echo $c['Subtotal']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="fw-bold">Shipping</td>
                        <td class="fw-bold">$<?php echo $cartItems['shipping']; ?></td>
                    <tr>
                        <td colspan="3" class="fw-bold">Tax</td>
                        <td class="fw-bold">$<?php echo $cartItems['tax']; ?></td>
                    </tr>
                        <td colspan="3" class="fw-bold">Total</td>
                        <td class="fw-bold">$<?php echo $cartItems['grandTotal']; ?></td>
                    </tr>
                </tbody>
            </table>
            <form method="POST">
                <button name="deleteAll" type="submit" class="btn btn-block text-uppercase btn-warning font-weight-bold my-3 py-3">
                    continue checkout
                </button>
            </form>
        </div>
    </div>
</section>



<?php
    include('components/footer.php');    
?>