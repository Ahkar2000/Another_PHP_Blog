<div class="col-12 col-md-4">
    <div class=" front-panel-right-sidebar">
        <div class="card mb-3">
            <div class=" card-body">
                <?php if(isset($_SESSION['user']['id'])){ ?>
                    <p class="mb-1">
                        Hi <b><?php echo $_SESSION['user']['name'];?></b>
                    </p>
                    <a href="dashboard.php" class="btn btn-primary">Go Dashboard</a>
                <?php }else{ ?>
                    <p>
                        Hi <b>Guest</b>
                    </p>
                    <a href="register.php" class="btn btn-primary">Register Here</a>
                <?php }?>
            </div>
        </div>
        <h4>Category List</h4>
        <div class="list-group mb-3">
            <a href="index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '' : 'active' ?>" aria-current="true">
                All Categories
            </a>
                <?php foreach (fcategories() as $c) { ?>
                <a href="category_based_post.php?category_id=<?php echo $c['id'] ?>" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? $_GET['category_id'] == $c['id'] ? 'active' : '<?php echo $url;?>/index.php' : '' ?>" aria-current="true">
                    <?php echo $c['title'] ?>
                    <?php if($c['ordering']==1){?>
                        <i class="fa-solid fa-thumbtack text-primary ms-1"></i>
                    <?php }?>
                </a>
            <?php } ?>
        </div>
        <div class="mb-3">
            <h4>Search by Date</h4>
            <div class="card">
                <div class="card-body">
                    <form action="search_by_date.php" method="post" class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start" required>
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end" required>
                        <button class="mt-2 btn btn-primary">
                            <i class="feather-calendar"></i>
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>