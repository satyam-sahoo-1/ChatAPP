<?php
    $conn = mysqli_connect("localhost","root","","chat");
    if(!$conn){
        echo "<script> console.log('Connection error: " . mysqli_connect_error() . "')</script>";

    }

?>