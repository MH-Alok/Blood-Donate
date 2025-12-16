<?php
$insert = false;
if(isset($_POST['submit'])) {
    $server = 'localhost';
    $username = 'root';
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to the database failed due to" . mysqli_connect_error());
    }


    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $operation_date = $_POST['operation_date'];
    $phone_number = $_POST['phone_number'];
    $operation_address = $_POST['operation_address'];


    $sql = "INSERT INTO `blood_donate` . `patient list` (`name`, `blood_group`, `gender`, `age`, `operation_date`, `phone_number`, 
    `operation_address`, `dt`) VALUES ('$name', '$blood_group', '$gender', '$age', '$operation_date', '$phone_number', '$operation_address',
    current_timestamp());";

    if($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }


    $con->close();
}
?>











<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City University</title>
        <link rel="stylesheet" href="patReq.css">
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
                            <a href="patReq.php"><li><p class="list active">Request for Blood</p></li></a>
                            <a href="donList.php"><li><p class="list">Donor List</p></li></a>
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
                <div class="right_part_img"></div>
                <div class="right_part_blur">
                    <!-- registration from for patient -->
                    <form class="don_form" action="patReq.php" method="post">
                        <h1>Patient Request</h1>
                        <?php
                            if($insert == true)
                                echo "<p class='submitMsg'>Thanks for submitting your form.</p>"
                        ?>
                        <label for="name">
                            <p>Full Name</p><span>:</span>
                            <input type="text" id="name" name="name" placeholder="Your Name" required>
                        </label>
                        <label for="blood_group">
                            <p>Blood Group</p><span>:</span>
                            <select name="blood_group" id="blood_group" required>
                                <option value="Select">Select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </label>
                        <label for="gender">
                            <p>Gender</p><span>:</span>
                            <div class="for_gender">
                                <input type="radio" id="male" name="gender" value="Male">Male
                                <input type="radio" id="female" name="gender" value="Female">Female
                                <input type="radio" id="others" name="gender" value="Others">Others
                            </div>
                        </label>
                        <label for="age">
                            <p>Age</p><span>:</span>
                            <input type="number" name="age" id="age" placeholder="Your Age" required>
                        </label>
                        <label for="operation_date">
                            <p>Operation Date</p><span>:</span>
                            <input type="date" name="operation_date" id="operation_date">
                        </label>
                        <label for="phone_number">
                            <p>Phone Number</p><span>:</span>
                            <input type="number" name="phone_number" id="phone_number" placeholder="Your Number" required>
                        </label>
                        <label for="operation_address">
                            <p>Operation Address</p><span>:</span>
                            <textarea name="operation_address" id="operation_address" placeholder="Enter Address" required></textarea>
                        </label>
                        <button class="submit" type="submit" name="submit">Submit</button>
                    </form>
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

        <script src="index.js"></script>
    </body>
</html>