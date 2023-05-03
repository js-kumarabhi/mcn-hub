<?php 
session_start();
include('../database.php');
$controler=$_SESSION['username'];
$colleges=mysqli_num_rows ( mysqli_query($con,"SELECT * FROM `college_list` WHERE 1") );
$users=mysqli_num_rows ( mysqli_query($con,"SELECT * FROM `students` WHERE 1") );
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>MCN Dashboard</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">MCN</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $controler; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>

                            <li class="nav-divider">
                                Features
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="college.php" aria-expanded="false" data-target="#college"><i class="fas fa-fw fa-file"></i>Onboard A College </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="admin.php" aria-expanded="false" aria-controls="submenu-6" ><i class="fas fa-fw fa-inbox"></i>Appiont College Admin <span class="badge badge-secondary">New</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="librarian.php" aria-expanded="false" aria-controls="submenu-7"><i class="fas fa-book"></i>Appiont College Librarian <span class="badge badge-secondary">New</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="https://brainshop.ai/" aria-expanded="false" target="_blank" aria-controls="submenu-7"><i class="fas fa-comments"></i>Manage Chatbot <span class="badge badge-secondary">New</span></a>
                            </li>

                            <li class="nav-divider">
                                Jobs
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="alljob.php" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-th-list"></i>All Jobs </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="newjob.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="far fa-plus-square"></i>Post new job
                                    <span class="badge badge-secondary">New</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="applications.php" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="far fa-hand-paper"></i>Applications<span class="badge badge-secondary">New</span></a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">MCN Dashboard </h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Overview</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="ecommerce-widget">

                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Total Students</h5>
                                                <h2 class="mb-0"> <?php echo $users; ?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <i class="fas fa-user fa-fw fa-sm text-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total views   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total followers   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Students Placed</h5>
                                                <h2 class="mb-0"> <?php echo $users; ?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                                <i class=" fas fa-trophy fa-fw fa-sm text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total followers   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- partnerships   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Colleges</h5>
                                                <h2 class="mb-0"><?php echo $colleges; ?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                                <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end partnerships   -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total earned   -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Total Earned</h5>
                                                <h2 class="mb-0"> $149.00</h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->


        <!-- modal For College Onboarding -->
        <!-- ============================================================== -->
        <div class="modal fade" id="college" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Onboard A College</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form>
                           <div class="card-body">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" id="clg" required="" placeholder="College Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-md" type="text" id="address" required="" placeholder="College Location" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-md" type="text" id="code" required="" placeholder="College Code" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-md" type="text" id="website" required="" placeholder="College Website" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-md" type="text" id="uwebsite" required="" placeholder="University Website" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input class="form-control form-control-md" type="file" id="logo" required="" placeholder="Logo" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-md" type="file" id="banner" required="" placeholder="Banner" autocomplete="off">
                            </div>



                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">For creating an account, agree the <a href="#">terms and conditions</a></span>
                                </label>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    <button type="button" class="btn btn-primary" id="onboard">Signup</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- modal  -->

<!-- Modal For Admin -->
<div class="modal fade" id="admin" tabindex="-2" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appoint A Admin</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
              <form>

                 <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="college" required="" placeholder="Admin Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="college" required="" placeholder="Admin Password" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="college" required="" placeholder="Admin Password" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="file" name="college" required="" placeholder="Pic" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="college" required="" placeholder="College Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="college" required="" placeholder="College Code" autocomplete="off">
                </div>                                                  </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a href="#" class="btn btn-primary">Appoint</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- modal  -->


<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>