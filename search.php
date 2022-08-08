<?php require_once "front_panel/head.php"; ?>
<title>Home</title>
<?php require_once "front_panel/sideheader.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white p-2">
                    <li class="breadcrumb-item "><a class="text-decoration-none" href="<?php echo $url ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active">
                        Search by <b>"<?php echo $_POST['key']?>"</b>
                    </li>
                </ol>
            </nav>
            <div>
                <?php 
                    $result=fsearch($_POST['key']);
                    if(count($result)==0){
                        echo alert("There is no result","warning");
                    }
                ?>
                <?php foreach (fsearch($_POST['key']) as $p) { ?>
                   <?php include "single.php"?>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_side_bar.php"; ?>
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>