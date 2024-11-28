<?php
$conn = new mysqli("localhost", "root", "", "myproject");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $sql = "SELECT * FROM customers WHERE id = '$edit'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $uid = $row['id'];
        $Name = $row['Name'];
        $Email = $row['Email'];
        $DateofBirth = $row['DateofBirth'];
        $Address = $row['Address'];
        $Country = $row['Country'];
        $Contact = $row['Contact'];
        $target_file = $row['choose_file'];
    } else {
        echo "No records found";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Customer</h2>
                </div>
                <div class="card-body">
                    <form id="edit_form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? htmlspecialchars($_GET['edit']) : ''; ?>">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Name:</label>
                                <input class="form-control" type="text" name="Name" value="<?php echo isset($Name) ? htmlspecialchars($Name) : ''; ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label>Email:</label>
                                <input class="form-control" type="email" name="Email" value="<?php echo isset($Email) ? htmlspecialchars($Email) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Date of Birth:</label>
                                <input class="form-control" type="date" name="DateofBirth" value="<?php echo isset($DateofBirth) ? htmlspecialchars($DateofBirth) : ''; ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label>Address:</label>
                                <input class="form-control" type="text" name="Address" value="<?php echo isset($Address) ? htmlspecialchars($Address) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Country:</label>
                                <input class="form-control" type="text" name="Country" value="<?php echo isset($Country) ? htmlspecialchars($Country) : ''; ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label>Contact:</label>
                                <input class="form-control" type="text" name="Contact" value="<?php echo isset($Contact) ? htmlspecialchars($Contact) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Image:</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Update Customer</button>
                        </div>
                    </form>
                </div>
                <script>
                $(document).ready(function() {
                    $("#edit_form").on('submit', function(e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            type: "POST",
                            url: "updates.php",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                alert("Data inserted successfully");
                                location.reload();
                            },
                            error: function() {
                                alert("An error occurred. Please try again.");
                            }
                        });
                    });
                });
                </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>
