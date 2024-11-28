<?php

                                $conn=mysqli_connect("localhost","root","","myproject");
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                    $sql = "SELECT * FROM `customers` WHERE 1";
                                    $results = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($results)>0){
                                    while($row = mysqli_fetch_assoc($results)){
                                        $uid=$row['id'];
                                        $Name=$row['Name'];
                                        $Email=$row['Email'];
                                        $DateofBirth=$row['DateofBirth'];
                                        $Address=$row['Address'];
                                        $Country=$row['Country'];
                                        $Contact=$row['Contact'];
                                        $target_file=$row['image'];
                                ?>
                                        <tr>
                                            <td> <?php echo $uid; ?></td>
                                            <td> <?php echo $Name; ?></td>
                                            <td> <?php echo $Email; ?></td>
                                            <td> <?php echo $DateofBirth; ?></td>
                                            <td> <?php echo $Address; ?></td>
                                            <td> <?php echo $Country; ?></td>
                                            <td> <?php echo $Contact; ?></td>
                                            <td> <?php echo $target_file;?></td>
                                        </tr>


















                                    <?php
                                    }
                                }
?>
