<?php
    require_once "core/base.php";
    require_once "core/functions.php"
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
</head>
<body style="background: var(--primary-soft);">
    
<div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <h4 class="text-center text-primary">
                                <i class="feather-users"></i>
                                Login To Admin
                            </h4>
                            <hr>
                            <?php
                                if (isset($_POST['loginbtn'])) {
                                    echo login();
                                }
                            ?>
                            <div class="form-group">
                                <label for="">
                                    <i class=" feather-mail text-primary"></i>
                                    Your Email
                                </label>
                                <input type="email" name="email" class="form-control my-2" required>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <i class=" feather-lock text-primary"></i>
                                    Password
                                </label>
                                <input type="password" name="password" min="8" class="form-control my-2" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="loginbtn">Sign in</button>
                                <a class="btn btn-outline-primary text-decoration-none" href="register.php">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script src="<?php echo $url;?>/assets/js/jquery.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?php echo $url;?>/assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo $url;?>/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url;?>/assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url;?>/assets/vendor/chart_js/Chart.min.js"></script>
<script src="<?php echo $url;?>/assets/js/app.js"></script>
<script src="<?php echo $url;?>/assets/js/dashboard.js"></script>
</body>
</html>