<?php require_once "front_panel/head.php"; ?>
<title>Home</title>
<?php require_once "front_panel/sideheader.php"; ?>
<?php 
    if($_GET['category_id']){
        $id = $_GET['category_id'];
        $current = category($id);
    }else{
        linkTo("index.php");
    }
    if(!$current){
        linkTo("index.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white p-2">
                    <li class="breadcrumb-item "><a class="text-decoration-none" href="<?php echo $url ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $current['title']?></li>
                </ol>
            </nav>
            <div>
                <?php foreach (fpostsByCat($_GET['category_id']) as $p) { ?>
                    <?php include "single.php"?>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_side_bar.php"; ?>
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>