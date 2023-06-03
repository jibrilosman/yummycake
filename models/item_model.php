<?php
    function add_item($cartID, $productID, $qty) {
        global $db;
        $query = "INSERT INTO item (itemID, cartID, productID, qty)" . 
        "VALUES (NULL, '$cartID', '$productID', '$qty')";
        $result = $db -> query($query);
        return $result;
    } // end add_item


    function item_count( $cartID) {
        global $db;
        $query = "SELECT SUM(qty) AS total FROM item WHERE cartID='$cartID'";
        $result = $db->query($query);
    
        // Check if query was successful
        if($result){
            $row = $result -> fetch(PDO::FETCH_ASSOC);  // Fetch the row
            if($row['total'] !== null){ 
                return $row['total'];  // Return total qty as number
            }
        }
        return 0;  // Return 0 if no items or unsuccessful query
    } // end item_count

    // get all items for the user and specific cartID
    function get_cart_items($cartID) {
        global $db;
        $query = "
            SELECT 
                IT.itemID AS 'Item',
                SUM(IT.qty) AS 'Qty',
                PR.productImage AS 'Image',
                PR.productName AS 'Name',
                PR.productPrice AS 'Price',
                PR.productPrice * SUM(IT.qty) AS 'Subtotal'
            FROM 
                item AS IT 
            JOIN 
                product AS PR 
            ON 
                PR.productID = IT.productID
            WHERE
                IT.cartID = cartID
            GROUP BY
                IT.productID";   
        $result = $db -> query($query);
        return $result;
    } // end get cart items


    function get_cart_items_total($cartID) {
        global $db;
        $query = "
            SELECT 
                IT.itemID AS 'Item',
                SUM(IT.qty) AS 'Qty',
                PR.productImage AS 'Image',
                PR.productName AS 'Name',
                PR.productPrice AS 'Price',
                PR.productPrice * SUM(IT.qty) AS 'Subtotal'
            FROM 
                item AS IT 
            JOIN 
                product AS PR 
            ON 
                PR.productID = IT.productID
            WHERE
                IT.cartID = cartID
            GROUP BY
                IT.productID";   
        $result = $db->query($query);
        
        // Calculate the total of subtotals
        $subtotal = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $subtotal += $row['Subtotal'];
        }
        
        // Calculate tax (assuming tax rate of 10%)
        $taxRate = 0.13;
        $shipping = 10;
        $tax = $subtotal * $taxRate;
        
        // Calculate grand total
        $grandTotal = $subtotal + $tax + $shipping;

        //format the numbers (2 decimal places)
        $subtotal = number_format($subtotal, 2);
        $shipping = number_format($shipping, 2);
        $tax = number_format($tax, 2);
        $grandTotal = number_format($grandTotal, 2);
        
        // Create an associative array to hold the results
        $cartItems = array(
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'grandTotal' => $grandTotal,
        );
        
        return $cartItems;
    }


    // delete item from cart by itemID 
    function delete_item($itemID) {
        global $db;
        $query = "DELETE FROM item WHERE itemID = '$itemID'";
        $result = $db -> query($query);
        return $result;
    } // end delete_item

    // delete all items from cart by cartID
    function delete_all_items($cartID) {
        global $db;
        $query = "DELETE FROM item WHERE cartID = '$cartID'";
        $result = $db -> query($query);
        return $result;
    } // end delete_all_items
    
    
?>