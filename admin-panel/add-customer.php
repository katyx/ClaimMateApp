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
    <title>Add User - CareU</title>

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
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
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

            <!-- Users Start -->
            <form name="form" onsubmit="return isvalid()" method="POST">
            <div class="container-fluid pt-4 px-4">
                <div class="casebox bg-light text-center rounded p-4" style="min-height: 625px;">
                    <div style="padding-top: 60px;"><h5><b>Add Customer</b></h5></div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="padding-top: 30px;">
                            <div class="addusr form-floating mb-3">
                                <input type="text" name="nic" class="form-control" id="nic" placeholder="dipId">
                                <label class="txt" for="nic">Customer NIC</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="license" class="form-control" id="license" placeholder="license">
                                <label class="txt" for="license">Customer License No.</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="customername" class="form-control" id="customername" placeholder="uName">
                                <label class="txt" for="customername">Customer Name</label>
                            </div>
                            <div class="addusr form-floating mb-3">
                                <input type="text" name="gender" class="form-control" id="gender" placeholder="gender">
                                <label class="txt" for="gender">Gender</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="dob" class="form-control" id="dob" placeholder="dob">
                                <label class="txt" for="dob">Date of Birth</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="address" class="form-control" id="address" placeholder="uName">
                                <label class="txt" for="address">Address</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="mobile">
                                <label class="txt" for="mobile">Mobile</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <label class="txt" for="password">Password</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Password">
                                <label class="txt" for="cpassword">Confirm Password</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <div class="nadd row" style="padding-top: 30px;">
                                    <button type="submit" id="submit" name="submit" class="btn addbutton" >Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- Users End -->

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

    <script>
        function isvalid(){
                var nic = document.form.nic.value;
                var license = document.form.license.value;
                var customername = document.form.customername.value;
                var gender = document.form.gender.value;
                var dob = document.form.dob.value;
                var address = document.form.address.value;
                var mobile = document.form.mobile.value;
                var password = document.form.password.value;
                var cpassword = document.form.cpassword.value;

                if(nic.length=="" && license.length=="" && customername.length=="" && gender.length=="" && dob.length=="" && address.length=="" && mobile.length=="" && password.length=="" && cpassword.length==""){
                    alert("Customer adding failed. Fill all the fields!");
                    return false;
                }else if(nic.length==""){
                    alert("Customer adding failed Customer NIC required!");
                    return false;
                }else if(license.length==""){
                    alert("Customer adding failed Customer Licence No. required!");
                    return false;
                }else if(customername.length==""){
                    alert("Customer adding failed Customer Name required!");
                    return false;
                }else if(gender.length==""){
                    alert("Customer adding failed Customer Gender required!");
                    return false;
                }else if(dob.length==""){
                    alert("Customer adding failed Customer Name required!");
                    return false;
                }else if(address.length==""){
                    alert("Customer adding failed Customer Address required!");
                    return false;
                }else if(mobile.length==""){
                    alert("Customer adding failed Customer Mobile No. required!");
                    return false;
                }else if(password.length==""){
                    alert("Customer adding failed Password required!");
                    return false;
                }else if(cpassword.length==""){
                    alert("Customer adding failed Confirm password!");
                    return false;
                }
                
            }
    </script>
    
</body>
</html>
<?php
    if(isset($_POST['submit'])){

        $nic = $_POST['nic'];
        $license = $_POST['license'];
        $customername = $_POST['customername'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $nicquery = "SELECT * FROM `customers` WHERE nic = '$nic'";
        $querynic = mysqli_query($conn, $nicquery);

        $licensequery = "SELECT * FROM `customers` WHERE license = '$license'";
        $querylicense = mysqli_query($conn, $licensequery);
        
        $checknic = mysqli_num_rows($querynic);
        $checklicense = mysqli_num_rows($querylicense);
         
        
        if($checknic>0){
            echo '<script>
                    alert("Customer adding failed. NIC already exist!")
                </script>';
        } elseif($checklicense>0){
            echo '<script>
                    alert("Customer adding failed. License No. already exist!")
                </script>';
        }else{
            if($password == $cpassword){
                $qryAdd ="INSERT INTO `customers` VALUES('$nic','$license','$customername','$gender','$dob','$address','$mobile','$password')";
                $resAdd = mysqli_query($conn, $qryAdd);

                echo '<script>
                        alert("Customer added successfully!")
                    </script>';
            }else{
                echo '<script>
                        alert("Customer adding failed. Passwords are not matching!")
                    </script>';
            }
        }
    }
?>