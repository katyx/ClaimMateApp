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
    <title>View Case - CareU</title>

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

            <!-- Add Note Start -->
            <div class="row">
                <div class="addnote col-lg-2">
                    <button type="button" class="notebutton casebox btn btn-primary" data-toggle="modal" data-target="#noteModal">Add Note</button>
                </div>
                <div class="addnote col-lg-2">
                    <button type="button" class="notebutton casebox btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mark As</button>
                </div>
            </div>
            <!-- Add Note Start -->
            
            <!-- View Case Details Start -->
            <?php
            if(isset($_GET['casesid'])){

            // Get user ID from GET request
            $case_id = $_GET['casesid'];

            // Prepare the SQL statement with a placeholder for the user ID
            $stmt = mysqli_prepare($conn, "SELECT * FROM `case` WHERE caseid = ?");

            // Bind the user ID to the placeholder in the SQL statement
            mysqli_stmt_bind_param($stmt, "s", $case_id);

            // Execute the SQL statement
            mysqli_stmt_execute($stmt);

            // Get the result set from the SQL statement
            $result = mysqli_stmt_get_result($stmt);

            // Check if user exists
            if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);

                // User details
            $case_id = $rows['caseid'];
            $cstm_nic = $rows['cstm_nic'];
            $cstm_name = $rows['cstm_name'];
            $status = $rows['status'];
            $claim_no = $rows['claim_no'];
            $cover_note = $rows['cover_note'];
            $debit_out = $rows['debit_out'];
            $location = $rows['location'];
            $date = $rows['date'];
            $time = $rows['time'];
            $cause_dmg = $rows['cause_dmg'];
            $any_reason = $rows['any_reason'];
            $extend_dmg = $rows['extend_dmg'];
            $img01 = $rows['img01'];
            $img02 = $rows['img02'];
            $img03 = $rows['img03'];
            $img04 = $rows['img04'];
            $vcl_no = $rows['vcl_no'];
            $drvr_nic = $rows['drvr_nic'];
            $drvr_lno = $rows['drvr_lno'];
            $categories = $rows['categories'];
            $expiry_date = $rows['expiry_date'];
            $fullname = $rows['fullname'];
            $address = $rows['address'];
            $mobno = $rows['mobno'];
            $thirdparty = $rows['thirdparty'];
            $note = $rows['note'];

            // Prepare the SQL statement with a placeholder for the user ID
            $stmt1 = mysqli_prepare($conn, "SELECT * FROM `vehicles` WHERE vcl_no = ?");

            // Bind the user ID to the placeholder in the SQL statement
            mysqli_stmt_bind_param($stmt1, "s", $vcl_no);

            // Execute the SQL statement
            mysqli_stmt_execute($stmt1);

            // Get the result set from the SQL statement
            $result1 = mysqli_stmt_get_result($stmt1);

            // Check if user exists
            if (mysqli_num_rows($result1) > 0) {
            $rows = mysqli_fetch_assoc($result1);

            // Vehicle details
            $vcl_type = $rows['vcl_type'];
            $vcl_make = $rows['vcl_make'];
            $vcl_model = $rows['vcl_model'];
            $vcl_year = $rows['vcl_year'];
            $vcl_trns = $rows['vcl_trns'];
            $vcl_fuel = $rows['vcl_fuel'];
            $vcl_ecap = $rows['vcl_ecap'];
            $vcl_eno = $rows['vcl_eno'];
            $vcl_cno = $rows['vcl_cno'];
            $policyno = $rows['policyno'];
            $coverperiod = $rows['coverperiod'];
            $suminsured = $rows['suminsured'];
            $type = $rows['type'];

            echo "<div class='container-fluid pt-4 px-4'>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='casebox bg-light text-center rounded p-4'>
                        
                            <div class='d-flex align-items-center justify-content-between mb-4'>
                                    <h6 class='sec-title mb-0'><b>Details</b></h6>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Status</div>
                                    <div class='col-md-7'>: <span> <b>$status</b> </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Insured</div>
                                    <div class='col-md-7'>: <span> $cstm_name ($cstm_nic) </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Case ID</div>
                                    <div class='col-md-7'>: <span> $case_id </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Policy No.</div>
                                    <div class='col-md-7'>: <span> $policyno </span> </div>
                                </div>

                                <div class='row case-details'>
                                    <div class='col-md-5'>Claim No.</div>
                                    <div class='col-md-7'>: <span> $claim_no</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Period of Cover</div>
                                    <div class='col-md-7'>: <span> $coverperiod </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Sum Insured</div>
                                    <div class='col-md-7'>: <span> $suminsured </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Hire Purchase / Lease </div>
                                    <div class='col-md-7'>: <span> $type </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Cover Note </div>
                                    <div class='col-md-7'>: <span> $cover_note </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Debit Outstanding </div>
                                    <div class='col-md-7'>: <span> $debit_out </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Location</div>
                                    <div class='col-md-7'>: <span> $location</span></div>
                                </div>

                                <div class='row case-details'>
                                    <div class='col-md-5'>Date</div>
                                    <div class='col-md-7'>: <span> $date</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Time</div>
                                    <div class='col-md-7'>: <span> $time</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Cause of Damage</div>
                                    <div class='col-md-7'>: <span> $cause_dmg</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Any Other Reason</div>
                                    <div class='col-md-7'>: <span> $any_reason</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Extent Damage</div>
                                    <div class='col-md-7'>: <span> $extend_dmg</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Images -</div>
                                    <div class='col-md-7'>
                                        <div class='row detailsimg'>
                                            <img src='data:image;base64,".base64_encode($img01)."'  onclick='openModal();currentSlide(1)' class='hover-shadow cursor'>
                                        </div>
                                        <div class='row detailsimg'>
                                            <img src='data:image;base64,".base64_encode($img02)."'  onclick='openModal();currentSlide(2)' class='hover-shadow cursor'>
                                        </div>
                                        <div class='row detailsimg'>
                                            <img src='data:image;base64,".base64_encode($img03)."'  onclick='openModal();currentSlide(3)' class='hover-shadow cursor'>
                                        </div>
                                        <div class='row detailsimg'>
                                            <img src='data:image;base64,".base64_encode($img04)."'  onclick='openModal();currentSlide(4)' class='hover-shadow cursor'>
                                        </div>
                                    </div>
                                </div>                              
                            </div>
                        </div>
                        <div class='col-md-6'>
                        <div class='row'>
                            <div class='casebox bg-light text-center rounded p-4'>
                                <div class='d-flex align-items-center justify-content-between mb-4'>
                                    <h6 class='sec-title mb-0'><b>Vehicle Details</b></h6>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Vehicle No.</div>
                                    <div class='col-md-7'>: <span> $vcl_no </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Vehicle Type</div>
                                    <div class='col-md-7'>: <span> $vcl_type </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Vehicle Make</div>
                                    <div class='col-md-7'>: <span> $vcl_make</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Vehicle Model</div>
                                    <div class='col-md-7'>: <span> $vcl_model</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Manufactured Year</div>
                                    <div class='col-md-7'>: <span> $vcl_year</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Transmission</div>
                                    <div class='col-md-7'>: <span> $vcl_trns</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Fuel Type</div>
                                    <div class='col-md-7'>: <span> $vcl_fuel</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Engine Capacity</div>
                                    <div class='col-md-7'>: <span> $vcl_ecap</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Engine Number</div>
                                    <div class='col-md-7'>: <span> $vcl_eno</span></div>
                            </div>
                            <div class='row case-details'>
                                    <div class='col-md-5'>Chassis No.</div>
                                    <div class='col-md-7'>: <span>$vcl_cno</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Mileage</div>
                                    <div class='col-md-7'>: <span>14979</span></div>
                                </div>
                            </div>
                        </div>
                        <div class='row' style='padding-top: 13px;'>
                            <div class='casebox bg-light text-center rounded p-4'>
                                <div class='d-flex align-items-center justify-content-between mb-4'>
                                    <h6 class='sec-title mb-0'><b>Driver Details</b></h6>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>NIC</div>
                                    <div class='col-md-7'>: <span> $drvr_nic </span> </div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>License No.</div>
                                    <div class='col-md-7'>: <span> $drvr_lno</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Categories</div>
                                    <div class='col-md-7'>: <span> $categories </span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Expiry Date</div>
                                    <div class='col-md-7'>: <span> $expiry_date</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Full Name</div>
                                    <div class='col-md-7'>: <span> $fullname</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Address</div>
                                    <div class='col-md-7'>: <span> $address</span></div>
                                </div>
                                <div class='row case-details'>
                                    <div class='col-md-5'>Mobile No.</div>
                                    <div class='col-md-7'>: <span> $mobno</span></div>
                                </div>
                            </div>
                        </div>
                        <div class='row' style='padding-top: 13px;'>
                            <div class='casebox bg-light text-center rounded p-4'>
                                <div class='d-flex align-items-center justify-content-between mb-4'>
                                    <h6 class='sec-title mb-0'><b>Third Party Details</b></h6>
                                </div>
                                <div class='row case-details'>
                                    <div class='col'><span> $thirdparty </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='container-fluid pt-3 px-4' >
                <div class='row'>
                    <div class='col'>
                        <div class='casebox bg-light text-center rounded p-4'>
                            <div class='d-flex align-items-center justify-content-between mb-4'>
                                <h6 class='sec-title mb-0'><b>Note</b></h6>
                            </div>
                            <div class='row case-details'>
                                <div class='col'><span> $note </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>"; 
            }
                } else {
                    echo "Case not found";
                }
            }

            
            

    ?>
            <!-- View Case Details End -->

            <!-- Start - Footer -->
            <footer id="sticky-footer">
        
                <!-- Copyright -->
                <div class="text-center p-4">
                    © 2023 
                <a class="text-reset fw-bold" href="">CareU</a>
                - All Rights Reserved
                </div>
                <!-- Copyright -->
            </footer>
            <!--End - Footer -->
    </div>

    <!-- Modal -->
    <form name="form" onsubmit="return isvalid()" method="POST">
    <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel">Add Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <textarea id="notebox" name="note" rows="4" cols="50" placeholder="Type here..."></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Modal -->
    <form name="form" onsubmit="return isvalid()" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Select the situation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" style="text-align: left;"><label style="padding-left: 13px;" for="cars">Mark As:</label></div>
                    <div class="col-md-8">
                        <select id="status" name="status">
                            <option value="Attended">Attended</option>
                            <option value="Non-Attended">Non-Attended</option>
                            <option value="Completed">Completed</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" id="ok" name="ok" class="btn btn-primary">Ok</button>
            </div>
          </div>
        </div>
      </div>
      </form>

    <!-- Image Modal -->
    <div id="imgModal" class="dimodal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
      
          <div class="imgSlides">
            <div class="numbertext">1 / 4</div>
            <div><?php echo "<img src='data:image;base64,".base64_encode($img01)."'style='width: 100%;'>";?></div>
          </div>
      
          <div class="imgSlides">
            <div class="numbertext">2 / 4</div>
            <div><?php echo "<img src='data:image;base64,".base64_encode($img02)."'style='width: 100%;'>";?></div>
          </div>
          <div class="imgSlides">
            <div class="numbertext">3 / 4</div>
            <div><?php echo "<img src='data:image;base64,".base64_encode($img03)."'style='width: 100%;'>";?></div>
          </div>
          <div class="imgSlides">
            <div class="numbertext">4 / 4</div>
            <div><?php echo "<img src='data:image;base64,".base64_encode($img04)."'style='width: 100%;'>";?></div>
          </div>
      
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
      
        </div>
    </div>

    <script>
        function openModal() {
          document.getElementById("imgModal").style.display = "block";
        }
        
        function closeModal() {
          document.getElementById("imgModal").style.display = "none";
        }
        
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("imgSlides");
          var dots = document.getElementsByClassName("demo");
          var captionText = document.getElementById("caption");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });</script>
    
</body>
</html>
<?php
     if(isset($_POST['submit'])){

        $notee = $_POST['note'];

        $qryAdd ="UPDATE `case` SET `note` = '$notee' WHERE `case`.`caseid` = '$case_id';";
        $resAdd = mysqli_query($conn, $qryAdd);

    }

    if(isset($_POST['ok'])){

        $statuss = $_POST['status'];

        $qryAdd ="UPDATE `case` SET `status` = '$statuss' WHERE `case`.`caseid` = '$case_id';";
        $resAdd = mysqli_query($conn, $qryAdd);

    }
    
?>