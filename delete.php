<?php
$conn = mysqli_connect("localhost", "root", "", "myproject");

if(!$conn){
    die(" Connection failed : " . mysqli_connect_error()) ;
}

$delete = $_GET['del'];

$sql = " DELETE   FROM customers WHERE id = '$delete' ";

if (mysqli_query($conn, $sql)) {
    echo '<script> location.replace("index.php"); </script>';
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
