<?php
include('../database.php');
session_start();
if (isset($_SESSION["login"]))
{
    header("location:home.php");
}
?>
<?php
if (isset($_POST['login'])) 
{
    if($_POST['username']=='' || $_POST['password']=='')
{
    ?>
    <script>
        alert('May Be Some Fields Are Empty !');
    </script>
    <?php
    exit();
}
    $u=$_POST['username'];
    $p=$_POST['password'];
    $qry = "SELECT `password`, `username` FROM `controler` WHERE username = '$u' && password ='$p'";
    $run=mysqli_query($con, $qry);
    $data=mysqli_fetch_assoc($run);
    if ($data) 
    {
        session_start();
        $_SESSION['username']=$u;
        $_SESSION["login"]="true";
        header("location:home.php");
    }
    else
    {
       ?>
    <script>
        alert('Unauthorised Credential');
    </script>
    <?php
    }
}
?>
?>


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><h1>MCN Controler Login</h1></a><span class="splash-description">Please enter your credential.</span></div>
            <div class="card-body">
                <form method="post" action="index.php"> 
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>