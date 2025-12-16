<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "blood_donate";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connect to the database is failed due to " . mysqli_connect_error());
}

?>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City University</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="admin_dashboard.css">
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
                        <a href="index.html">
                            <li>
                                <p class="list">Home</p>
                            </li>
                        </a>
                        <a href="donarReq.php">
                            <li>
                                <p class="list">Register as a Donor</p>
                            </li>
                        </a>
                        <a href="patReq.php">
                            <li>
                                <p class="list">Request for Blood</p>
                            </li>
                        </a>
                        <a href="donList.php">
                            <li>
                                <p class="list">Donor List</p>
                            </li>
                        </a>
                        <a href="patList.php">
                            <li>
                                <p class="list">Patient List</p>
                            </li>
                        </a>
                        <a href="contact.html">
                            <li>
                                <p class="list">Contact Us</p>
                            </li>
                        </a>
                        <a href="help.html">
                            <li>
                                <p class="list">Donation Help?</p>
                            </li>
                        </a>
                        <a href="admin_login.php">
                            <li>
                                <p class="list active">Admin Process</p>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <!-- right part -->

        <div class="right_part">
            <div class="admin_panel_header">
                <h1><i class="fa-solid fa-droplet"></i>BloodCare Admin Panel</h1>
            </div>

            <div class="donor_list_container">
                <div class="h1_div">
                    <h1>Donor List</h1>
                </div>
                <div class="short_by">
                    <button class="short_by_btn1">// Short by</button>
                    <div class="filter1 filter">
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
                <div class="table_div1">
                    <table>
                        <thead>
                            <tr>
                                <th class="name">Full Name</th>
                                <th class="id">Student ID</th>
                                <th class="department">Department</th>
                                <th class="batch">Batch</th>
                                <th class="blood_group">Blood Group</th>
                                <th class="gender">Gender</th>
                                <th class="age">Age</th>
                                <th class="weight">Weight</th>
                                <th class="date">Last Donate</th>
                                <th class="number">Phone Number</th>
                                <th class="address">Present Address</th>
                                <th class="time">Info Enter Time</th>
                                <th class="action_th">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            date_default_timezone_set('Asia/Dhaka');

                            $sql = "SELECT * FROM `donar list`";
                            $result = $con->query($sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name = $row["name"];
                                    $id = $row["id"];
                                    $department = $row["department"];
                                    $batch = $row["batch"];
                                    $blood_group = $row["blood_group"];
                                    $gender = $row["gender"];
                                    $age = $row["age"];
                                    $weight = $row["weight"];
                                    $last_donate = $row["last_donate"];
                                    $phone_number = $row["phone_number"];
                                    $present_address = $row["present_address"];
                                    $enter_time = $row["dt"];

                                    if (!empty($last_donate)) {
                                        $today = date('Y-m-d');
                                        $diff = (strtotime($today) - strtotime($last_donate)) / (60 * 60 * 24 * 30);
                                    } else {
                                        $diff = 99;
                                    }

                                    //check if last donation < 3 month
                                    $rowClass = ($diff < 3) ? 'not_eligible' : '';


                                    echo "<tr class='$rowClass'>
                                            <td>" . $name . "</td>
                                            <td>" . $id . "</td>
                                            <td>" . $department . "</td>
                                            <td>" . $batch . "</td>
                                            <td>" . $blood_group . "</td>
                                            <td>" . $gender . "</td>
                                            <td>" . $age . "</td>
                                            <td>" . $weight . "</td>
                                            <td>" . $last_donate . "</td>
                                            <td>" . $phone_number . "</td>
                                            <td>" . $present_address . "</td>
                                            <td>" . $enter_time . "</td>
                                            <td class='action_td'>
                                                <a href='update.php?updateid=". $id ."'>
                                                    <button class='update_btn'>
                                                        <i class='fa-solid fa-pen-to-square'></i>
                                                        <span>Update</span>
                                                    </button>
                                                </a>
                                                <a href='delete.php?deleteid=". $id ."'>
                                                    <button class='delete_btn'>
                                                        <i class='fa-solid fa-trash'></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </a>
                                            </td>
                                            </tr>";
                                }
                            } else {
                                die("Invalid query: " . $con->error);
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="patient_list_container">
                <div class="h1_div">
                    <h1>Patient List</h1>
                </div>

                <div class="short_by">
                    <button class="short_by_btn2">// Short by</button>
                    <div class="filter2 filter">
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

                <div class="table_div2">
                    <table>
                        <thead>
                            <tr>
                                <th class="name">Full Name</th>
                                <th class="blood_group">Blood Group</th>
                                <th class="gender">Gender</th>
                                <th class="age">Age</th>
                                <th class="date">Operation date</th>
                                <th class="number">Phone Number</th>
                                <th class="address">Operation Address</th>
                                <th class="time">Info Enter Time</th>
                                <th class="action_th">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $sql = "SELECT * FROM `patient list`";
                            $result = $con->query($sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $name = $row["name"];
                                    $blood_group = $row["blood_group"];
                                    $gender = $row["gender"];
                                    $age = $row["age"];
                                    $operation_date = $row["operation_date"];
                                    $phone_number = $row["phone_number"];
                                    $operation_address = $row["operation_address"];
                                    $enter_time = $row["dt"];


                                    echo "<tr>
                                            <td>" . $name . "</td>
                                            <td>" . $blood_group . "</td>
                                            <td>" . $gender . "</td>
                                            <td>" . $age . "</td>
                                            <td>" . $operation_date . "</td>
                                            <td>" . $phone_number . "</td>
                                            <td>" . $operation_address . "</td>
                                            <td>" . $enter_time . "</td>
                                            <td class='action_td'>
                                                <a href='update.php'>
                                                    <button class='update_btn'>
                                                        <i class='fa-solid fa-pen-to-square'></i>
                                                        <span>Update</span>
                                                    </button>
                                                </a>
                                                <a href='delete.php?deletename=". $name ."'>
                                                    <button class='delete_btn'>
                                                        <i class='fa-solid fa-trash'></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </a>
                                            </td>
                                            </tr>";

                                }
                            } else {
                                die("Invalid query= " . $con->error);
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
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

    <script src="admin_dashboard.js"></script>

</body>

</html>