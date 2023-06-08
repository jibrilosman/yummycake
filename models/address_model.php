<?php
    // create a function to save the address to the database
    
    function saveAddress($address) {
        global $db;
        $query = "INSERT INTO address (firstName, lastName, companyName, homeAddress, postalCode, email, phone, information)" . 
        "VALUES ('$address[firstName]', '$address[lastName]', '$address[companyName]', '$address[homeAddress]','$address[postalCode]', '$address[email]', '$address[phone]', '$address[information]')";
        $result = $db->query($query);
        return $db->lastInsertId();
    } // end saveAddress


    // // create function to get the last address ID from the database
    function getLastAddressID() {
        global $db;
        $query = "
            SELECT
                CONCAT(AD.firstName, ' ', AD.lastname) AS 'Name',
                AD.companyName AS 'Company',
                AD.homeAddress AS 'Address',
                AD.postalCode AS 'Zip Code',
                AD.email AS 'Email',
                AD.phone AS 'Phone No',
                AD.information AS 'Additional information'
            FROM
                address AS AD 
            ORDER BY
                addressID
            DESC LIMIT 1";
        $result = $db->query($query);
        $addressID = $result->fetch();
        $result->closeCursor();

        return $addressID;
    } // end getLastAddressID

    $last_address = getLastAddressID();
    if($last_address) {
        echo $last_address['Name'],
        $last_address['Company'],
        $last_address['Address'],
        $last_address['Zip Code'],
        $last_address['Email'],
        $last_address['Phone No'],
        $last_address['Additional information'];
    } else {
        echo 'Failed to retrieve the last address.';
    }
    
?>
