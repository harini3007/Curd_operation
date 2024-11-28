<?php
$conn = mysqli_connect("localhost", "root", "", "myproject");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit = $_POST['id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $DateofBirth = $_POST['DateofBirth'];
    $Address = $_POST['Address'];
    $Country = $_POST['Country'];
    $Contact = $_POST['Contact'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!empty($_FILES["image"]["name"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "UPDATE customers SET Name='$Name', Email='$Email', DateofBirth='$DateofBirth', Address='$Address', Country='$Country', Contact='$Contact', choose_file='$target_file' WHERE id='$edit'";
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    } else {
        $sql = "UPDATE customers SET Name='$Name', Email='$Email', DateofBirth='$DateofBirth', Address='$Address', Country='$Country', Contact='$Contact' WHERE id='$edit'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Data updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
?>