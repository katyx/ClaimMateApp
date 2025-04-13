<?php
    include 'connection.php';
    include 'login-check.php';

    // Get the user type from the session
    $usertype = $_SESSION['usertype'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public User Details - CareU</title>

    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Start - Background -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <!-- End - Background -->
    
    <div class="container-xxl position-relative bg-none d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <a href="dashboard.php">
                <div class="toplogo bg-white">
                    <div>
                        <img src="images/logo-1.png" alt="" style="width: 235px;">
                    </div>
                </div>
            </a>
            <nav class="navbar navbar-light">
                    <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Cases</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="today-cases.php" class="dropdown-item"><i class="far fa-file-alt me-2"></i>Today Cases</a>
                            <a href="cases.php" class="dropdown-item"><i class="far fa-file-alt me-2"></i>Total Cases</a>
                            <a href="attended-cases.php" class="dropdown-item"><i class="far fa-file-alt me-2"></i>Attended Cases</a>
                            <a href="non-attended-cases.php" class="dropdown-item "><i class="far fa-file-alt me-2"></i>Non Attended Cases</a>
                        </div>
                    </div>
                    <a href="analytics.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Analytics</a>
                    <a href="customers.php" class="nav-item nav-link"><i class="fa fa-users"></i>Customers</a>
                    <?php
                        // Show the "System Users" link only if the user type is "Super Admin"
                        if($usertype == 'Super Admin') {
                            echo '<a href="system-users.php" class="nav-item nav-link"><i class="fa fa-user-secret"></i>System Users</a>';
                        }
                    ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand casebox bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0" style="color: #00068E;">
                    <i class="fa fa-bars" style="color: white;"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="images/pro-pic.png" alt="Profile Pic" style="width: 40px; height: 40px;">
                            <span class="user d-none d-lg-inline-flex"><?php echo $_SESSION['user'];?></span>
                        </a>
                        <div class="rdown dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            
            <!-- Customers Details Start -->
            <div class="detailsbox container-fluid bg-light pt-4 px-4">
                <div class="row">
                <?php
                    if(isset($_GET['nic'])){

                    // Get user ID from GET request
                    $nic = $_GET['nic'];

                    // Prepare the SQL statement with a placeholder for the user ID
                    $stmt = mysqli_prepare($conn, "SELECT * FROM customers WHERE nic = ?");

                    // Bind the user ID to the placeholder in the SQL statement
                    mysqli_stmt_bind_param($stmt, "s", $nic);

                    // Execute the SQL statement
                    mysqli_stmt_execute($stmt);

                    // Get the result set from the SQL statement
                    $result = mysqli_stmt_get_result($stmt);

                    // Check if user exists
                    if (mysqli_num_rows($result) > 0) {
                    $rows = mysqli_fetch_assoc($result);

                        // User details
                    $nic = $rows['nic'];
                    $license = $rows['license'];
                    $customername = $rows['customername'];
                    $gender = $rows['gender'];
                    $dob = $rows['dob'];
                    $address = $rows['address'];
                    $mobile = $rows['mobile'];


                    // Display user details in table
                    echo "<div class='col-md-5'>
                        <div class='bg-light text-center rounded p-4'>
                            <div class='d-flex align-items-center justify-content-between mb-4' style='text-align: center;'>
                                <h6 class='username mb-0'><b>$customername</b></h6>
                            </div>
                            <div class='col-md-2'>
                                <img class='userimage rounded-circle me-lg-2' src='images/pro-pic.png' alt='Profile Pic' style='width: 180px; height: 180px;'>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-7'>
                        <div class='bg-light text-center rounded p-4'>
                        


                            <div class='row case-details' style='padding-top: 60px;'>
                                <div class='col-md-5'>NIC</div>
                                <div class='col-md-7'>: <span>$nic</span> </div>
                            </div>
                            <div class='row case-details'>
                                <div class='col-md-5'>License No.</div>
                                <div class='col-md-7'>: <span>$license</span></div>
                            </div>
                            <div class='row case-details'>
                                <div class='col-md-5'>Full Name</div>
                                <div class='col-md-7'>: <span>$customername</span></div>
                            </div>
                            <div class='row case-details'>
                                <div class='col-md-5'>Gender</div>
                                <div class='col-md-7'>: <span>$gender</span></div>
                            </div>
                            <div class='row case-details'>
                                <div class='col-md-5'>Date of Birth</div>
                                <div class='col-md-7'>: <span>$dob</span></div>
                            </div>
                            <div class='row case-details'>
                                <div class='col-md-5'>Address</div>
                                <div class='col-md-7'>: <span>$address</span></div>
                            </div>
                            <div class='row case-details' style='padding-bottom: 40px;'>
                                <div class='col-md-5'>Mobile No.</div>
                                <div class='col-md-7'>: <span>$mobile</span></div>
                            </div>
                            <div class='nadd row' style='padding-top: 30px; padding-bottom: 30px;'>
                                <div class='dbtn'><a class='btn deletebutton' href='customer-delete.php?nic=$nic'>Delete</a></div>
                            </div>";
                                
                            } else {
                                echo "Customer not found";
                            }
                         }

                        ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Customers Details End -->

            <!-- Start - Footer -->
            <footer id="sticky-footer">
        
                <!-- Copyright -->
                <div class="text-center p-4">
                    © 2023 
                <a class="text-reset fw-bold" href="https://CareU.online/">CareU</a>
                - All Rights Reserved
                </div>
                <!-- Copyright -->
            </footer>
            <!--End - Footer -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });</script>
    
</body>
</html>
