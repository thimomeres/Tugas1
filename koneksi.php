<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "toko";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>