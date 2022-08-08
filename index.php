<?php
    session_start();
?>
<?php require_once "front_panel/head.php"; ?>
<title>Home</title>
<?php require_once "front_panel/sideheader.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white p-2">
                    <li class="breadcrumb-item "><a class="text-decoration-none" href="<?php echo $url ?>/index.php">Home</a></li>
                </ol>
            </nav>
            <div class="mb-4 text-end">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="feather-calendar"></i> Sort
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="?order_by=created_at&order_type=asc">
                                <i class="feather-arrow-down-circle"></i>
                                Oldest to Newest
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?order_by=created_at&order_type=desc">
                                <i class="feather-arrow-up-circle"></i>
                                Newest to Oldest
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="feather-list"></i>
                                Default
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <?php
                if (isset($_GET['order_by']) && isset($_GET['order_type'])) {
                    $orderCol = $_GET['order_by'];
                    $orderType = strtoupper($_GET['order_type']);
                    $posts = fposts($orderCol, $orderType);
                } else {
                    $posts = fposts();
                }

                foreach ($posts as $p) {
                ?>
                    <?php include "single.php" ?>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_side_bar.php"; ?>
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>