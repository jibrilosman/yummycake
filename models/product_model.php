<?php
    // product_model.php
    function get_products() { // gets all products

        global $db;
        $query = "SELECT * FROM product";
        $rows = [];
        $query_result = $db->query($query);
        while( $row = $query_result->fetch(PDO::FETCH_ASSOC) ) 
        {
            $rows[] = $row; // adds each row to the $rows array
        }
        return $rows;
    
    }

    

    // gets all products by catID, parse it and convert to a php JSON object.
    function get_products_by_cat($catID) {
        global $db;
        $query = "SELECT PR.productID, PR.productImage, PR.productName, PR.productDesc, PR.productPrice FROM product AS PR WHERE PR.catID = '$catID'";

        $rows = [];
        $query_result = $db->query($query);
        while( $row = $query_result->fetch(PDO::FETCH_ASSOC) ) 
        {
            $rows[] = $row; // adds each row to the $rows array
        }
        return $rows;
    }

?>