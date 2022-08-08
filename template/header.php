<?php require_once "core/base.php"; ?>
<?php require_once "core/functions.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>

<body>
    <section class="main container-fluid">
        <div class="row">
            <!-- side bar start -->
            <?php include "template/siderbar.php" ?>
            <!-- side bar end -->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 pb-3 pt-0 content">
                <div class="row header mb-3 position-sticky top-0 mt-3">
                    <div class="col-12">
                        <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                            <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                                <i class="feather-menu text-light" style="font-size: 2em;"></i>
                            </button>
                            <form action="" method="post" class="d-none d-md-block">
                                <div class="form">
                                    <input type="text" class=" form-control w-75 d-inline">
                                    <button class="btn btn-light d-inline">
                                        <i class="feather-search text-primary"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo $url; ?>/assets/img/<?php echo $_SESSION['user']['photo']?>" class="userImg shadow-sm" alt="">
                                    <?php echo $_SESSION['user']['name'] ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>