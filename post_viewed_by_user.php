<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php
$id = $_GET['id'];
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/user_list.php">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Posts Viewed
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
        <div class="mb-4 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary">
                            <i class=" feather-user me-1"></i>Posts Viewed By <?php echo user($_GET['id'])['name'] ?>
                        </h4>
                        <a href="#" class="btn btn-outline-secondary maximizeBtn">
                            <i class=" feather-maximize-2"></i>
                        </a>
                    </div>
                    <hr>
                    <table class=" table table-hover">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Posted By</th>
                                <th class="text-nowrap">Post Title</th>
                                <th class="text-nowrap">Post Description</th>
                                <th class="text-nowrap">Seen at</th>
                                <th class="text-nowrap">View Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(viewer_count_by_user($id) as $v){?>
                                <tr>
                                    <td>
                                        <?php 
                                            echo user(post($v['post_id'])['user_id'])['name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo post($v['post_id'])['title'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo short(strip_tags(html_entity_decode(post($v['post_id'])['description']))) ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo showtime($v['created_at']);
                                        ?>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="post_detail.php?id=<?php echo $v['post_id']?>" class="btn btn-primary btn-sm">
                                            Go to Post
                                        </a>
                                    </td>
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