<?php

spl_autoload_register(function ($class){
    include $class . '.php';
});

$credentials = new credentials();

$con = new mysqli($credentials->hostname, $credentials->username, $credentials->password, $credentials->dbname);

$user = $_POST['user'];
$pass = $_POST['pass'];

if ($con->connect_error) {
    echo json_encode(0);
} else {

    $coins = $_POST['coins'];

    $sql = "UPDATE $credentials->table_user 
                SET coins = '$coins' 
                WHERE user = '$user'
                AND pass = '$pass'";

    if ($con->query($sql)) {
        echo json_encode($coins);
    } else {
        echo json_encode(0);
    }
}
?>