<?php
    $con = mysqli_connect("localhost", "root", "", "blood_donate");
    
    if (!$con) {
        die("Connection to the database failed due to " . mysqli_connect_error());
    }

    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Get input data
        $usernameU = $_POST['username'];
        $passwordU = $_POST['password'];

        // Prepare SQL to check if the admin exists
        $sql = "SELECT * FROM `admin login` WHERE username = ? AND password = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $usernameU, $passwordU);
        $stmt->execute();
        $result = $stmt->get_result();

        // check login success
        if ($result->num_rows > 0) {
            echo "<script> var loginStatus = 'success'; </script>";
        } else {
            echo "<script> var loginStatus = 'failed'; </script>";
        }


        $stmt->close();

    }

    
    $con->close();

?>














<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>City University</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
            integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="adminL.css">
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
                            <a href="patList.php"><li><p class="list">Patient List</p></li></a>
                            <a href="contact.html"><li><p class="list">Contact Us</p></li></a>
                            <a href="help.html"><li><p class="list">Donation Help?</p></li></a>
                            <a href="admin.html"><li><p class="list active">Admin Process</p></li></a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- right part -->

            <div class="right_part">
                <h3>This area is restricted to administrators only.</h3>
                <div class="login_container">
                    <form action="admin_login.php" method="post" class="login_part">
                        <h1>Admin Login</h1>
                        <div class="input_box">
                            <input type="text" name="username" required>
                            <label for="username">Username</label>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input_box">
                            <input type="password" name="password" required>
                            <label for="password">Password</label>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <label for="remember_me" class="remember_me_box"><input type="checkbox" name="remember_me">Remember Me</label>
                        <button type="submit"><span>Login</span></button>
                    </form>
                    <div class="hello_part">
                        <h1>Hello, Admin!</h1>
                        <p>How are you?</p>
                        <h4>Please log in using your admin credentials.</h4>
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="admin.js"></script>

    </body>
</html>