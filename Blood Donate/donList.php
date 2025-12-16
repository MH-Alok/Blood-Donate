<?php

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this databsee failed due to" . mysqli_connect_error());
    }

?>







<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City University</title>
        <link rel="stylesheet" href="donListt.css">
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
                            <a href="donList.php"><li><p class="list active">Donor List</p></li></a>
                            <a href="patList.php"><li><p class="list">Patient List</p></li></a>
                            <a href="contact.html"><li><p class="list">Contact Us</p></li></a>
                            <a href="help.html"><li><p class="list">Donation Help?</p></li></a>
                            <a href="admin_login.php"><li><p class="list">Admin Process</p></li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- right part -->

            <div class="right_part">
                <div class="h1_div"><h1>Donor List</h1></div>
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
                                <th class="id">Student ID</th>
                                <th class="department">Department</th>
                                <th class="batch">Batch</th>
                                <th class="blood_group">Blood Group</th>
                                <th class="gender">Gender</th>
                                <th class="date">Last Donate</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                date_default_timezone_set('Asia/Dhaka');

                                $sql = "SELECT * FROM `donar list`";
                                $con->select_db("blood_donate");
                                $result = $con->query($sql);
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $name = $row["name"];
                                        $id = $row["id"];
                                        $department = $row["department"];
                                        $batch = $row["batch"];
                                        $blood_group = $row["blood_group"];
                                        $gender = $row["gender"];
                                        $last_donate = $row["last_donate"];

                                        if (!empty($last_donate)) {
                                            $today = date('Y-m-d');
                                            $diff = (strtotime($today) - strtotime($last_donate)) / (60 * 60 * 24 * 30);
                                        } else {
                                            $diff = 99;
                                        }

                                        //check if last donation < 3 month
                                        $rowClass = ($diff < 3) ? 'not_eligible' : '';

                                        echo "<tr class='$rowClass'>
                                            <td>".$name."</td>
                                            <td>".$id."</td>
                                            <td>".$department."</td>
                                            <td>".$batch."</td>
                                            <td>".$blood_group."</td>
                                            <td>".$gender."</td>
                                            <td>".$last_donate."</td>
                                            </tr>";

                                    }
                                } else{
                                    die("Invaid query: " . $con->error);
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
                <div class="footer_details">This is blood donation website, for City University student's and teacher's.<br>It's created by Mohaimenul Hoque Alok from 67th batch and idea was given by Raihan Chowdhury form 67th batch. We created this for blood donation of our University.<br>It's from City University. For our students and teachers user.</div>
            </div>
            <div class="footer_divs">
                <div class="footer_header">Why this?</div>
                <div class="footer_details">This is a perfect web for our city university blood donation. With this website you can easily find a donor. And you can donate easily. What you need? A donor? or a receiver? too easy with this website for city university students.</div>
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

        <script src="donList.js"></script>

    </body>
</html>