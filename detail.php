<?php session_start(); ?>
<?php require_once "front_panel/head.php"; ?>
<title>Home</title>
<?php require_once "front_panel/sideheader.php"; ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $current = post($id);
}else{
    linkTo("index.php");
}
if(!$current){
    linkTo("index.php");
}
$current_cat = $current['category_id'];
if(isset($_SESSION['user']['id'])){
    $user_id = $_SESSION['user']['id'];
}else{
    $user_id = 0;
}
viewer_record($user_id,$id,$_SERVER['HTTP_USER_AGENT']);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white p-2">
                    <li class="breadcrumb-item"><a class=" text-decoration-none" href="<?php echo $url ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Post Detail
                    </li>
                </ol>
            </nav>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <h4>
                            <?php echo $current['title'] ?>
                        </h4>
                        <div class="my-3">
                            <i class="feather-user text-primary"></i>
                            <?php echo user($current['user_id'])['name'] ?>
                            <i class="feather-layers text-success"></i>
                            <?php echo category($current['category_id'])['title'] ?>
                            <i class="feather-calendar text-warning"></i>
                            <?php echo date("j M Y", strtotime($current['created_at'])) ?>
                        </div>
                        <div>
                            <?php echo html_entity_decode($current['description']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach (fpostsByCat($current_cat, 2,$id) as $p) { ?>
                    <div class="col-12 col-md-6">
                        <div class="card shadow-sm mb-4 post">
                            <div class="card-body">
                                <a href="detail.php?id=<?php echo $p['id'] ?>" class="link-primary text-decoration-none">
                                    <h4>
                                        <?php echo $p['title']; ?>
                                    </h4>
                                </a>
                                <div class="my-3">
                                    <i class="feather-user text-primary"></i>
                                    <?php echo user($p['user_id'])['name'] ?>
                                    <i class="feather-layers text-success"></i>
                                    <?php echo category($p['category_id'])['title'] ?>
                                    <i class="feather-calendar text-warning"></i>
                                    <?php echo date("j M Y", strtotime($p['created_at'])) ?>
                                </div>
                                <p>
                                    <?php echo short(strip_tags(html_entity_decode($p['description'])), 200) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_side_bar.php"; ?>
    </div>
</div>


<?php require_once "front_panel/footer.php"; ?>