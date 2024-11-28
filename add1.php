<?php
$conn = new mysqli("localhost", "root", "", "myproject");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $DateofBirth = $_POST['DateofBirth'];
    $Address = $_POST['Address'];
    $Country = $_POST['Country'];
    $Contact = $_POST['Contact'];
    $Gender=$_POST['Gender'];
    $Courses=$_POST['Courses'];


    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO customers (Name, Email, DateofBirth, Address, Country, Contact, choose_file,Gender,Courses) 
                        VALUES ('$Name', '$Email', '$DateofBirth', '$Address', '$Country', '$Contact', '$target_file','$Gender','$Courses')";
                if ($conn->query($sql) === TRUE) {
                    echo "Data inserted successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }

        if ($conn) {
            $result = mysqli_query($conn, "SELECT * FROM customers");
            while ($row = mysqli_fetch_assoc($result)) {

                echo   '<img src="images/<?php echo $file_name; ?>" alt="Image"  width="100">';
            }
        } else {
            echo "Connection failed: " . mysqli_connect_error();
        }



    }



?>
