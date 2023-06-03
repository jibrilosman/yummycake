<?php
    include('includes/bundle.php');
    include('includes/addtocart.php');
    
    if (isset($_GET['cat_id'])) {
        $category_id = $_GET['cat_id'];
    }
    else {
        $category_id = 1;
    }

    $products = get_products_by_cat($category_id);
        
?>
 
<section class='menu'>
   <div class="tab-content" data-aos="fade-up" data-aos-delay="300" style='text-align:center;'>
     <div class="tab-pane fade active show" id="menu-starters">
        <div class="row gy-5">
            <?php foreach($products as $p) : ?>
            <div class="col-lg-4 menu-item ">
                <a href="<?php echo $p['productImage']; ?>" class="glightbox"><img src="<?php echo $p['productImage']; ?>" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $p['productName']; ?></h4>
                <p class="ingredients">
                <?php echo $p['productDesc']; ?>
                </p>
                <p class="price">
                    $<?php echo $p['productPrice']; ?>
                </p>

                <form method="POST" class="d-flex align-items-center mb-4 pt-2" style='margin-left:80px;' >
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type='button' class="btn btn-warning btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="qty" class="form-control bg-light  border-0 text-center" value="1" min="1">
                        <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>" />
                        <div class="input-group-btn">
                            <button type='button' class="btn btn-warning btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>&nbsp &nbsp
                    <button type="submit"  class="btn btn-warning px-3"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                </form>
                 
            </div><!-- Menu Item -->                   
            <?php endforeach; ?>
        </div>
     </div>
    </div>
</section>

<?php
    include('components/footer.php');    
?>  

