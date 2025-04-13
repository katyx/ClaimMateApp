<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CareU</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

</head>
<body class="loginbody">
    <!-- Start - Background -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
    </div>
    <!-- End - Background -->

    <!--Start - Login Form -->
    <form class="login" name="form" onsubmit="return isvalid()" method="POST">
        <div class="row" style="margin-bottom: 30px;">
            <!-- Logo -->
            <div class="" style="text-align: center;">
                <img src="images/logo-1.png" alt="logo" style="width: 265px;">
            </div>
            <!-- Welcome Note -->
            <!-- <div class="col-8 align-bottom" style="font-weight: 900; font-size: 35px; color: #00068E;">
                Welcome
            </div> -->
        </div>
        <input type="text" id="user" name="user" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <button type= "submit" id="btn" name="submit">Login</button>
    </form>
    <!--End - Login Form -->

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

  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function isvalid(){
                var user = document.form.user.value;
                var password = document.form.password.value;
                if(user.length=="" && password.length==""){
                    alert("Login failed. Username and password required!");
                    return false;
                }
                else if(user.length==""){
                    alert("Login failed. Username required!");
                    return false;
                }
                else if(password.length==""){
                    alert("Login failed. Password required!");
                    return false;
                }
                
            }
    </script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `login` WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        

        if($count==1){
            $userid = $row['id'];
            $usertype = $row['usertype'];
            $empname = $row['empname'];

            $_SESSION['user'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $userid;
            $_SESSION['empname'] = $empname;
            $_SESSION['usertype'] = $usertype;
            echo "<script> location.href='dashboard.php'; </script>";
            exit();
        } else{
            echo '<script>
                    alert("Login failed. Invalid username or password!!")
                </script>';
        }
    }
?>