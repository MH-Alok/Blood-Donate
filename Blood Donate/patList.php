<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database ="blood_donate";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con) {
        die("Connect to the database failed due to" . mysqli_connect_error());
    }

?>












<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City University</title>
        <link rel="stylesheet" href="patiListt.css">
    </head>
    <body>
        <!-- header starts -->
        <header>
            <div class="logo">
                <img src="img/logo1.png">
            </div>
            <div class="blood_don">
                <p>Blood Donate</p>
            </div>
        </header>

        <section>
            <!-- left part -->
            <div class="left_part">
                <div class="for_img">
                    <div class="for_blur">
                        <a href="donarReq.php">
                            <div class="donate_btn">Donate</div>
                        </a>
                    </div>
                </div>

                <div class="easy_line">
                    <span>#</span>
                    <p>Easy For You</p>
                </div>

                <!-- nav -->
                <div class="nav_div">
                    <div class="nav_bar"></div>
                    <div class="nav_list">
                        <ul>
                            <a href="index.html"><li><p class="list">Home</p></li></a>
                            <a href="donarReq.php"><li><p class="list">Register as a Donor</p></li></a>
                            <a href="patReq.php"><li><p class="list">Request for Blood</p></li></a>
                            <a href="donList.php"><li><p class="list">Donor List</p></li></a>
                            <a href="patList.php"><li><p class="list active">Patient List</p></li></a>
                            <a href="contact.html"><li><p class="list">Contact Us</p></li></a>
                            <a href="help.html"><li><p class="list">Donation Help?</p></li></a>
                            <a href="admin_login.php"><li><p class="list">Admin Process</p></li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- right part -->

            <div class="right_part">
                <div class="h1_div">
                    <h1>Patient List</h1>
                </div>
                <div class="short_by">
                    <button class="short_by_btn">// Short by</button>
                    <div class="filter">
                        <label for="blood_group">
                            <span id="B">B</span>
                            <span id="L">L</span>
                            <span id="O">O</span>
                            <span id="O">O</span>
                            <span id="D">D</span>
                            <span id="G">G</span>
                            <span id="R">R</span>
                            <span id="O">O</span>
                            <span id="U">U</span>
                            <span id="P">P</span>
                        </label>
                        <select name="blood_group" id="blood_group">
                            <option value="">Select</option>
                            <option value="">A+</option>
                            <option value="">A-</option>
                            <option value="">B+</option>
                            <option value="">B-</option>
                            <option value="">AB+</option>
                            <option value="">AB-</option>
                            <option value="">O+</option>
                            <option value="">O-</option>
                        </select>
                        <button type="submit">Filter</button>
                    </div>
                </div>
                <div class="table_div">
                    <table>
                        <thead>
                            <tr>
                                <th class="name">Full Name</th>
                                <th class="blood_group">Blood Group</th>
                                <th class="gender">Gender</th>
                                <th class="date">Operation date</th>
                                <th class="address">Operation Address</th>
                            </tr>
                        </thead>
                        <tbody>
            
                            <?php
            
                                $sql = "SELECT * FROM `patient list`";
                                $result = $con->query($sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)){
                                        $name = $row["name"];
                                        $blood_group = $row["blood_group"];
                                        $gender = $row["gender"];
                                        $operation_date = $row["operation_date"];
                                        $operation_address = $row["operation_address"];

                                        echo "<tr>
                                            <td>".$name."</td>
                                            <td>".$blood_group."</td>
                                            <td>".$gender."</td>
                                            <td>".$operation_date."</td>
                                            <td>".$operation_address."</td>
                                            </tr>";
                                    }
                                } else {
                                    die("Invalid query:" . $con->error);
                                }
                                        
                            ?>
            
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- right part end -->
        </section>

        <!-- footer starts -->
        <footer>
            <div class="footer_divs">
                <div class="footer_header">About Us</div>
                <div class="footer_details">This is blood donation website, for City University student's and teacher's.<br>It's
                    created by Mohaimenul Hoque Alok from 67th batch and idea was given by Raihan Chowdhury form 67th batch. We
                    created this for blood donation of our University.<br>It's from City University. For our students and
                    teachers user.</div>
            </div>
            <div class="footer_divs">
                <div class="footer_header">Why this?</div>
                <div class="footer_details">This is a perfect web for our city university blood donation. With this website you
                    can easily find a donor. And you can donate easily. What you need? A donor? or a receiver? too easy with this
                    website for city university students.</div>
            </div>
            <div class="footer_divs">
                <div class="footer_header">Involved</div>
                <div class="footer_details">
                    <p>Created by <a href="https://www.facebook.com/mohaimenul.hoque.549"><span>@MH Alok</span></a></span></p>
                    <p>Mobile Phone : <span>+880 1947-151532</span></p>
                    <p>Mail: <span>mohaimenulhoquealok@gamil.com</span></p>
                    <div class="footer_img_container">
                        <div class="footer_img"><img src="img/logo1.png" height="100%" width="100%"></div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="patList.js"></script>
    </body>
</html>