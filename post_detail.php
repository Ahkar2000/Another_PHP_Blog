<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php
$id = $_GET['id'];
$current = post($id);
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $current['title'] ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
        <div class="mb-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary">
                            <i class=" feather-info me-1"></i>Post Detail
                        </h4>
                        <div class="">
                            <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                                <i class=" feather-plus-circle"></i>
                            </a>
                            <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                                <i class=" feather-list"></i>
                            </a>
                        </div>
                    </div>
                    <hr>
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
        <div class="mb-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary">
                            <i class=" feather-users me-1"></i>Post Viewers
                        </h4>
                        <a href="#" class="btn btn-outline-secondary maximizeBtn">
                            <i class=" feather-maximize-2"></i>
                        </a>
                    </div>
                    <hr>
                    <table class=" table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Device</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(viewerCountByPost($id) as $v){?>
                                <tr>
                                    <td>
                                        <?php 
                                            if($v['user_id']==0){
                                                echo "Guest";
                                            }else{
                                                echo user($v['user_id'])['name'];
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $v['device']?></td>
                                    <td class="text-nowrap"><?php echo showtime($v['created_at'])?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $('.table').dataTable({
        "order": [0, 'desc']
    });
</script>