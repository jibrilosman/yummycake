<?php
    include('includes/bundle.php');  
    include('includes/addtocart.php');

    $cats = get_cats();

    if(isset($_GET['catID']))
    {
    $_SESSION['catID'] = $_GET['catID'];
    }
    else
    {
    $_SESSION['catID'] = 0;
    }  
    $products = get_products();   
?>

<!-- Hero Section Start -->
<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up" class="aos-init aos-animate">Enjoy Your <br>Delicious Dessert</h2>
          <p data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">Here is an interesting news for those on a diet: a cake cut into thin slices has fewer calories than a whole cake.</p>
          
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/images/cake-4.png" class="img-fluid aos-init aos-animate" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
</section>
<!-- Hero Section ends -->

<!-- Menu Section starts -->
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>
        <!-- List of the Menu starts -->
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <?php foreach($cats as $cat) { ?>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['catID'] == $cat['catID']) { echo 'active show'; } ?>" href="product.php?cat_id=<?php echo $cat['catID']; ?>">
                    <h4><?php echo $cat['catName']; ?></h4>
                </a>
            </li>
        <?php } ?>

        </ul>
        <br>
        <br>
        <!-- List of the Menu ends -->
    

    <div class="tab-content bg-light" data-aos="fade-up" data-aos-delay="300">
        <div class="tab-pane fade active show" id="menu-starters">
            <div class="row gy-5"> 
               <?php foreach($products as $p) : ?>
                <div class="col-lg-4 menu-item">
                    <a href="<?php echo $p['productImage']; ?>" class="glightbox"><img src="<?php echo $p['productImage']; ?>" class="menu-img img-fluid" alt=""></a>
                    <h4><?php echo $p['productName']; ?></h4>
                    <p class="ingredients" style='text-align:center;'>
                    <?php echo $p['productDesc']; ?>
                    </p>
                    <p class="price">
                    $<?php echo $p['productPrice']; ?>
                    </p>
                <form method="Post" class="d-flex align-items-center mb-4 pt-2" style='margin-left:80px;' >
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type='button' class="btn btn-warning btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" name="qty" class="form-control bg-light  border-0 text-center"  value="1" min="1" max="12">
                        <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>" />
                        <div class="input-group-btn">
                            <button type='button' class="btn btn-warning btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>&nbsp
                    <button class="btn btn-warning px-3"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                </form>

               </div>
              <?php endforeach; ?>

            </div>
        </div>  

    </div>
</section> 
<!-- Menu Section ends -->  
<?php
    include('components/footer.php');    
?>