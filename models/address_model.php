<?php
    // create a function to save the address to the database
    
    function saveAddress($address) {
        global $db;
        $query = "INSERT INTO address (firstName, lastName, companyName, address, postalCode, email, phone, information)" . 
        "VALUES ('$address[firstName]', '$address[lastName]', '$address[companyName]', '$address[address]','$address[postalCode]', '$address[email]', '$address[phone]', '$address[information]')";
        $result = $db->query($query);
        return $db->lastInsertId();
    } // end saveAddress
    
?>
