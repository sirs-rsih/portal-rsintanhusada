<?php
    session_start();
    require('../controller/accountcontrol.php');
    $_SESSION['menu']='Preferences';
    include('../../config.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo($_SESSION['menu'].' | '.$app_name);?></title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../../assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body id="page-top">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php
                    include('../component/header.php');
                ?>
                <!-- /.navbar-header -->
                <?php
                    include('../component/topmenu.php');
                ?>

                <!-- /.navbar-top-links -->

                <?php
                    include('../component/sidemenu.php');
                ?>
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><i class="fa fa-gear fa-fw"></i> <?php echo($_SESSION['menu']); ?></h1>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- /.col-lg-12 -->
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-user fa-fw"></i> DATA USER
                                </div>
                                <?php
                                    
                                    $q = mysqli_query($connect,"SELECT * FROM mst_user WHERE username='".$_SESSION['username']."'");
                                    $data = mysqli_fetch_array($q);
                                ?>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-taxi fa-fw"></i> USERNAME
                                            <span class="pull-right text-muted"><em><?php echo($data['username']); ?></em>
                                            </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-taxi fa-fw"></i> NAMA LENGKAP
                                            <span class="pull-right text-muted"><em><?php echo($data['nama']); ?></em>
                                            </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-taxi fa-fw"></i> JABATAN
                                            <span class="pull-right text-muted"><em><?php echo($data['jabatan']); ?></em>
                                            </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-taxi fa-fw"></i> LEVEL
                                            <span class="pull-right text-muted"><em><?php 
                                                                                        if($data['level']==0){
                                                                                            echo('GOD MODE');
                                                                                        }else if($data['level']==1){
                                                                                            echo('SUPERADMIN');
                                                                                        }if($data['level']==2){
                                                                                            echo('USER');
                                                                                        }if($data['level']==3){
                                                                                            echo('JONGOS');
                                                                                        }
                                                                                    ?></em>
                                            </span>
                                        </a>
                                    </div>
                                    <!-- /.list-group -->
                                    <a href="#" class="btn btn-primary btn-block">UPDATE DATA</a>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-map-marker fa-fw"></i> LOKASI <?php echo($company); ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    Test test test
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <?php
            include('../component/backtotop.php');
            // include('../modal/tambahunitbaru.php');
        ?>

        <!-- jQuery -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../assets/dist/js/sb-admin-2.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../../assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="../../assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

        <script>
            $(document).ready(function() {
                $('#dataTables-unit').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>