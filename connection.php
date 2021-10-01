<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'infosec';

    $conn = new mysqli($servername,$username,$password,$dbname) or die(mysqli_error($conn));
?>