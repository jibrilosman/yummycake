
<?php
    include('includes/bundle.php');
    require_once('vendor/autoload.php');

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


    \Stripe\Stripe::setApiKey('sk_test_51MMgP3IHGa5fTquEM1WTQylDDYQdgyvokbrqLuR6uzr5IqvahBqZ459syeJfoJZUkssqA2FsuMzyQDsGgKKI421e000QauJkCE');
    
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'cad',
            'unit_amount' => $grandTotal * 100,
            'product_data' => [
                'name' => 'Name',
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost/yummycake/address.php',
        'cancel_url' => 'http://localhost:8888/ecommerce/checkout.php?cart_id=' . $cartID,
    ]);
    
?>

<div>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- <script src="js/checkout.js"></script> -->
    <div class="col-lg-5 container align-items-center">
               
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
                       <form method="POST" class="text-center">
                           <button id="checkout-button"  type="submit" class="btn btn-block  text-uppercase text-white btn-warning font-weight-bold my-3 py-3">
                               checkout &nbsp; <i class="fa fa-long-arrow-right"></i> &nbsp;
                               <i class="fa-brands fa-cc-stripe fa-beat fa-2xl text-body"></i>
                           </button>
                       </form>
                      
                   </div>
               </div>
           </div>
    <!-- <button id="checkout-button">Checkout</button> -->
    <script>
        var stripe = Stripe('pk_test_51MMgP3IHGa5fTquEn425pb6jUEIzNAqyjvkLAaOMuHB8vj7wneDsTLvOXJfcTgmTDlCJo0akVlF02X1yp9ZKEI9i00jEsNS1Hg');
        const checkoutButton = document.getElementById('checkout-button');
        checkoutButton.addEventListener('click', function (e) {
            e.preventDefault();
            // When the customer clicks on the button, redirect
            // them to Checkout.
            stripe.redirectToCheckout({
                sessionId: '<?php echo $session->id; ?>'
            }).then(function (result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, display the localized error message to your customer
                // using `result.error.message`.
            
            });
        });

        
    </script>

</div>

<?php
    include('components/footer.php');    
?>