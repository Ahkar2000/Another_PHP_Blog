<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar min-vh-100" style="overflow-y: scroll;">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 d-flex me-2 justify-content-center align-items-center rounded">
                <i class=" feather-shopping-bag text-white h4 mb-0"></i>
            </span>
            <span class="fw-bolder h4 mb-0 text-uppercase text-primary"> My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn-light border-0 d-block d-lg-none ">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <?php if($_SESSION['user']['role'] == 1){
            ?>
             <li class="menu-spacer"></li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-home me-1"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>
            <?php
            }
            ?>
            <li class="menu-title">
                Manage Posts
            </li>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/post_add.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-plus-circle me-1"></i>
                        Add Post
                    </span>
                </a>
            </li>

            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/post_list.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-list me-1"></i>
                        Post List
                    </span>
                    <span class="badge rounded-pill text-bg-light d-flex align-items-center text-primary">
                        <?php echo count_total('posts') ?>
                    </span>
                </a>
            </li>
            <?php if ($_SESSION['user']['role'] <= 1) {
             ?>
            <li class="menu-title">
                Setting
            </li>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/category_add.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-layers me-1"></i>
                        Category Manager
                    </span>
                    <span class="badge rounded-pill text-bg-light d-flex align-items-center text-primary">
                        <?php echo count_total('categories') ?>
                    </span>
                </a>
            </li>
            <?php if ($_SESSION['user']['role'] == 0) {?>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/user_list.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-users me-1"></i>
                        User Manager
                    </span>
                    <span class="badge rounded-pill text-bg-light d-flex align-items-center text-primary">
                        <?php echo count_total('users') ?>
                    </span>
                </a>
            </li>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/visitors.php" class="menu-item-link text-nowrap">
                    <span class="d-flex align-items-center">
                        <i class="feather-eye me-1"></i>
                        Visitors Manager
                    </span>
                    <span class="badge rounded-pill text-bg-light d-flex align-items-center text-primary">
                        <?php echo count_total('viewers',"user_id=0") ?>
                    </span>
                </a>
            </li>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/ads_list.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-airplay me-1"></i>
                        Ads Manager
                    </span>
                </a>
            </li>
            <?php }?>
            <?php }?>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/wallet.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class=" feather-dollar-sign me-1"></i>
                        Wallet
                    </span>
                </a>
            </li>
            <li class="menu-item mb-2">
                <a href="<?php echo $url ?>/index.php" class="menu-item-link">
                    <span class="d-flex align-items-center">
                        <i class="feather-arrow-right-circle me-1"></i>
                        Go to News
                    </span>
                </a>
            </li>
            <li class="menu-item mb-4">
                <a href="<?php echo $url ?>/logout.php" class="menu-item-link btn btn-secondary w-100 text-white justify-content-center">
                    <i class=" feather-lock me-1"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>