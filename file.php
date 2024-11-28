<?php
$conn=mysqli_connect("localhost","root","","myproject");

if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $data = file_get_contents($_FILES['file']['tmp_name']);

    // insert the image data into the database
    $sql = "INSERT INTO file (name, type, data) VALUES ($name, $type, $data)";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Success');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}






?>