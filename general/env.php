<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "book_to_record";

$conn = mysqli_connect("localhost","root","","book_to_record");

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}