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
                    <div style="padding-top: 60px;"><h5><b>Add User</b></h5></div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="padding-top: 30px;">
                            <div class="addusr form-floating mb-3">
                                <input type="text" name="id" class="form-control" id="id" placeholder="dipId">
                                <label class="txt" for="id">Employee ID</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="empname" class="form-control" id="empname" placeholder="dipName">
                                <label class="txt" for="floatingInput">Employee Name</label>
                            </div>
                            <div class="addusr form-floating mb-4">
                                <input type="text" name="user" class="form-control" id="user" placeholder="uName">
                                <label class="txt" for="user">User Name</label>
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
                                <div class="row">
                                    <div class="col-md-4" style="text-align: left;"><label style="padding-left: 13px;" for="cars">User type:</label></div>
                                    <div class="col-md-8">
                                        <select id="usertype" name="usertype">
                                            <option value="Admin">Admin</option>
                                            <option value="Super Admin">Super Admin</option>
                                        </select>
                                    </div>
                                </div>
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
                var id = document.form.id.value;
                var empname = document.form.empname.value;
                var user = document.form.user.value;
                var password = document.form.password.value;
                var cpassword = document.form.cpassword.value;

                if(id.length=="" && empname.length=="" && user.length=="" && password.length==""){
                    alert("User adding failed. Fill all the fields!");
                    return false;
                }else if(id.length==""){
                    alert("User adding failed Employee Id required!");
                    return false;
                }else if(empname.length==""){
                    alert("User adding failed Employee Name required!");
                    return false;
                }else if(user.length==""){
                    alert("User adding failed Username required!");
                    return false;
                }else if(password.length==""){
                    alert("User adding failed Password required!");
                    return false;
                }else if(cpassword.length==""){
                    alert("User adding failed Confirm password!");
                    return false;
                }
                
            }
    </script>
    
</body>
</html>
<?php
    if(isset($_POST['submit'])){

        $userid = $_POST['id'];
        $empname = $_POST['empname'];
        $username = $_POST['user'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $usertype = $_POST['usertype'];

        $idquery = "SELECT * FROM `login` WHERE id = '$userid'";
        $queryid = mysqli_query($conn, $idquery);

        $usernamequery = "SELECT * FROM `login` WHERE username = '$username'";
        $queryusername = mysqli_query($conn, $usernamequery);
        
        $checkid = mysqli_num_rows($queryid);
        $checkusername = mysqli_num_rows($queryusername);
         
        
        if($checkid>0){
            echo '<script>
                    alert("User adding failed. Id already exist!")
                </script>';
        } elseif($checkusername>0){
            echo '<script>
                    alert("User adding failed. Username already exist!")
                </script>';
        }else{
            if($password == $cpassword){
                $qryAdd ="INSERT INTO `login` VALUES('$userid','$empname','$username','$password','$usertype')";
                $resAdd = mysqli_query($conn, $qryAdd);

                echo '<script>
                        alert("User added successfully!")
                    </script>';
            }else{
                echo '<script>
                        alert("User adding failed. Passwords are not matching!")
                    </script>';
            }
        }
    }
?>