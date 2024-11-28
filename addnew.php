<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>MY CLIENT</h2>
                </div>
                <div class="card-body">
                    <form action="add1.php" method="post" enctype="multipart/form-data" id="input_form">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" name="Name" id="name" placeholder="Enter name" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="Email" id="email" placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="DateofBirth">Date of Birth:</label>
                                <input class="form-control" type="date" name="DateofBirth" id="DateofBirth" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="address">Address:</label>
                                <input class="form-control" type="text" name="Address" id="address" placeholder="Enter Address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="country">Country:</label>
                                <input class="form-control" type="text" name="Country" id="country" placeholder="Enter Country" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="contact">Contact:</label>
                                <input class="form-control" type="text" name="Contact" id="contact" placeholder="Enter Contact" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Choose File:</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                        <div class="form-check">
                            <h2>Gender</h2>
                            <input type="radio" id="radio1" name="Gender" value="Male">
                            <label for="radio1">Male</label>
                            <input type="radio" id="radio2" name="Gender" value="Female">
                            <label for="radio2">Female</label>
                            <input type="radio" id="radio3" name="Gender" value="Others">
                            <label for="radio3">Others</label><br><br>
                            <h2>Courses</h2>
                            <input type="checkbox" id="check1" name="Courses" value="Python">
                            <label for="check1">Python</label>
                            <input type="checkbox" id="check2" name="Courses" value="Web development">
                            <label for="check2">Web development</label>
                            <input type="checkbox" id="check3" name="Courses" value="Java">
                            <label for="check3">Java</label><br><br>
                            <!-- <button type="submit" name="submit" class="btn btn-warning sm-3">Select</button><br> -->
                        </div>
                        <div>

                            <button type="submit" class="btn btn-primary lg-3">Add Customer</button>
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#input_form").on('submit', function(e) {
                            e.preventDefault();
                            var formData = new FormData(this);
                            $.ajax({
                                type: "POST",
                                url: "add1.php",
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
