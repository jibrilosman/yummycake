<?php

    function create_user($userName, $password, $email) {
        echo 'hi';
        global $db;
        $query = "INSERT INTO user (userID, userName, password, email)" . 
        "VALUES (NULL, '$userName', '$password', '$email')";
        $result = $db->query($query);
        return $result;
    } // end create_user

    function login($userName, $password) {
        global $db;
        $query = "SELECT * FROM user WHERE userName='$userName' AND password='$password'";
        $result = $db->query($query);
        return $result;
    } // end login

    function get_user($userID) {
        global $db;
        $query = "SELECT * FROM user WHERE userID = '$userID'";
        $result = $db->query($query);
        $user = $result->fetch();
        return $user;
    } // end get_user
    
?>