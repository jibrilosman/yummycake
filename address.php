
<?php
    include('includes/bundle.php');
    
    if(isset($_POST['firstName'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $companyName = $_POST['companyName'];
        $homeAddress = $_POST['homeAddress'];
        $postalCode = $_POST['postalCode'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $information = $_POST['information'];
        
        $address = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'companyName' => $companyName,
            'homeAddress' => $homeAddress,
            'postalCode' => $postalCode,
            'email' => $email,
            'phone' => $phone,
            'information' => $information
        );
        
        $addressID = saveAddress($address);
        $_SESSION['addressID'] = $addressID;
        header('Location: thankyou.php');
    }

        // Get cart items
        $cart = get_cart_items($cartID);

        // Get total items in cart
        $cartItems = get_cart_items_total($cartID);

?>

<section class="container align-items-center">       
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0">Delivery details</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form7Example1" name="firstName" class="form-control" required />
                        <label class="form-label" for="form7Example1">First name</label>
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form7Example2" name="lastName" class="form-control" required />
                        <label class="form-label" for="form7Example2">Last name</label>
                    </div>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form7Example3" name="companyName" class="form-control" />
                    <label class="form-label" for="form7Example3">Company name</label>
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form7Example4" name="homeAddress" class="form-control" required />
                    <label class="form-label" for="form7Example4">Address</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="form7Example4" name="postalCode" class="form-control" required />
                    <label class="form-label" for="form7Example4">Postal Code</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form7Example5" name="email" class="form-control" required />
                    <label class="form-label" for="form7Example5">Email</label>
                </div>

                <!-- Number input -->
                <div class="form-outline mb-4">
                    <input type="number" id="form7Example6" name="phone" class="form-control" required />
                    <label class="form-label" for="form7Example6">Phone</label>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <textarea class="form-control" name="information" id="form7Example7" rows="4"></textarea>
                    <label class="form-label" for="form7Example7">Additional information</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-2">
                  <button type="submit" class="btn btn-warning btn-lg btn-block">
                     Save & Make purchase
                  </button>
                    
                </div>
                </form>
            </div>
            </div>
        </div>

    </div>
</section>

<?php
    include('components/footer.php');    
?>