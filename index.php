<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>MY Customer</h2>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-warning">
                            <a href="addnew.php" class="text-light">ADD NEW</a>
                        </button><br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Images</th>
                                    <th>Gender</th>
                                    <th>Courses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php
                                    $conn = mysqli_connect("localhost", "root", "", "myproject");
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT * FROM customers";
                                    $results = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($results) > 0) {
                                        while ($row = mysqli_fetch_assoc($results)) {
                                            $uid = $row['id'];
                                            $Name = $row['Name'];
                                            $Email = $row['Email'];
                                            $DateofBirth = $row['DateofBirth'];
                                            $Address = $row['Address'];
                                            $Contact = $row['Contact'];
                                            $target_file = $row['choose_file'];
                                            $Gender=$row['Gender'];
                                            $Courses=$row['Courses']
                                ?>
                                        <tr>
                                            <td><?php echo $uid; ?></td>
                                            <td><?php echo $Name; ?></td>
                                            <td><?php echo $Email; ?></td>
                                            <td><?php echo $DateofBirth; ?></td>
                                            <td><?php echo $Address; ?></td>
                                            <td><?php echo $Contact; ?></td>
                                            <td><img src="<?php echo $target_file; ?>" alt="Image"  width="100"></td>
                                            <td><?php echo $Gender;?></td>
                                            <td><?php echo $Courses;?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm">
                                                    <a href='edit.php?edit=<?php echo $uid; ?>' class="text-light">Edit</a>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" style="margin-left: -14px;">
                                                    <a href='delete.php?del=<?php echo $uid; ?>' class="text-light">Delete</a>
                                                </button>
                                            </td>

                                        </tr>
                                <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No records found</td></tr>";
                                    }
                                    mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>

    <script>
        $(document).ready(function(){
            function fetchData() {
                $.ajax({
                    type: "GET",
                    url: "table.php",
                    dataType: "json",
                    success: function(response) {
                        var tableBody = $("#table_body");
                        tableBody.empty();
                        $.each(response.data, function(index, customer) {
                            var row = "<tr>" +
                                "<td>" + customers.id + "</td>" +
                                "<td>" + customers.name + "</td>" +
                                "<td>" + customers.email + "</td>" +
                                "<td>" + customers.dob + "</td>" +
                                "<td>" + customers.address + "</td>" +
                                "<td>" + customers.contact + "</td>" +
                                "<td><img src='images/" + customers.image + "  width='100'></td>" +
                                "<td>" +
                                    "<button class='btn btn-success btn-sm'>" +
                                        "<a href='edit.php?edit=" + customers.id + "' class='text-light'>Edit</a>" +
                                    "</button>" +
                                    "<button class='btn btn-danger btn-sm'>" +
                                        "<a href='delete.php?del=" + customers.id + "' class='text-light'>Delete</a>" +
                                    "</button>" +
                                "</td>" +
                                "</tr>";
                            tableBody.append(row);
                        });
                    },
                    error: function(error) {
                        console.log("Error fetching data", error);
                    }
                });
            }

            fetchData();
        });
    </script>
    </div>
            </div>
        </div>
    </div>

</body>
</html>