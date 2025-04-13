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
    <title>Non Attended Cases - CareU</title>

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
                        <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Cases</a>
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

            <!-- Non Attended Cases Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="casebox bg-light text-center rounded p-4" style="height: 493px;">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Non Attended Cases</h6>
                    </div>
                    <div class="casesshowtbl table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="tth text-dark">
                                    <th scope="col">Case ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `case` WHERE `status` ='Non-Attended'";
                                    $result = mysqli_query($conn, $sql);

                                    while($row=$result->fetch_assoc()){
                                        echo "
                                        <tr>
                                            <td>$row[caseid]</td>
                                            <td>$row[date]</td>
                                            <td>$row[time]</td>
                                            <td>$row[location]</td>
                                            <td>$row[status]</td>
                                            <td><a class='btn btn-sm btn-primary' href='view-case.php?casesid=$row[caseid]'>Details</a></td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Non Attended Cases End -->

            <!-- Start - Footer -->
            <footer id="sticky-footer">
        
                <!-- Copyright -->
                <div class="text-center p-4">
                    © 2023 
                <a class="text-reset fw-bold" href="https://careu.live/">CareU</a>
                - All Rights Reserved
                </div>
                <!-- Copyright -->
            </footer>
            <!--End - Footer -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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