<?php
    session_start();
    include "../functions/functions.php";

    include "parts/perm/adminPerm.php";

    $blogs = GetBlogs();
    $users = GetUsers($_SESSION["id"]);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "parts/sidebar.php"?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "parts/topbar.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin paneli</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php $title = "Kayıtlı kullanıcı"; $logo = "fas fa-users fa-sm fa-fw mr-2 text-gray-400"; $number = count($users); include "parts/dashboardCard.php"?>

                        <?php $title = "Yazı"; $logo = "fas fa-fw fa-folder"; $number = count($blogs); include "parts/dashboardCard.php"?>

                    </div>
                    
                    <h2>Son yazılar</h2>
                    <?php if(count($blogs) == 0):?>
                        <h5>Yazılmış bir yazı yok.</h5>
                    <?php else:?>
                        <div class="row">
                            <?php for ($i=0; $i < count($blogs) && $i < 10 ; $i++):?>
                                <div class="col-lg-4 mb-4" style="display: flex">
                                    <!-- Approach -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <a href="blogshow.php?id=<?php echo $blogs[$i]["b_id"]?>">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo $blogs[$i]["b_title"]?></h6>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <p><?php echo TextSplit($blogs[$i]["b_content"],$blogs[$i]["b_id"],"blogshow.php")?></p>
                                        </div>
                                        <div class="card-footer">
                                            <div>
                                                <p><?php echo $blogs[$i]["u_username"]?></p>
                                                <p><?php echo $blogs[$i]["b_createdDate"]?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endfor?>
                        </div>
                    <?php endif?>
                    
                    <div class="mt-3">
                        <h2>Son kayıt olan kullanıcılar</h2>
                        <?php if(count($users) == 0):?>
                            <h5>Kayıtlı kullanıcı yok.</h5>
                        <?php else:?>
                            <div class="row">
                                <?php for ($i=0; $i < count($users) && $i < 12 ; $i++):?>
                                    <div class="col-lg-4 mb-4">
                                        <!-- Approach -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo $users[$i]["u_username"]?></h6>
                                            </div>
                                            <div class="card-body">
                                                <p><?php echo $users[$i]["u_email"]?></p>
                                            </div>
                                        </div>

                                    </div>
                                <?php endfor?>
                            </div>
                        <?php endif?>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5> -->
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><b>Çıkış yapıyorsunuz.</b></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Vazgeç</button>
                    <a class="btn btn-primary" href="../pages/phpPro/logout.php">Onayla</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>