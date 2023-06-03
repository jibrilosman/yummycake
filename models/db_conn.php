// db_model.php
<?php
    $dsn = 'mysql:host=localhost;dbname=yummy_cake_db';
    $dbname = "yummy_cake_db";
    $host = "localhost";
    $username = 'admin';
    $password = 'password2023';
    $con = mysqli_connect($host, $username, $password, $dbname);

    try {
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e) {
        $error_message = $e->getMessage();
        include('components/db_error.php');
        exit();
    }
?>