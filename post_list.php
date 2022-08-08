<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4 col-xl-12">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-list me-1"></i>Post List
                    </h4>
                    <div class="">
                        <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                            <i class=" feather-plus-circle"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary maximizeBtn">
                            <i class=" feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table class=" table table-hover mt-3 mb-0 table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php if ($_SESSION['user']['role'] == 0) { ?>
                                <th>User</th>
                            <?php } ?>
                            <th>Viewers Count</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (posts() as $c) {
                        ?>
                            <tr>
                                <td><?php echo $c['id'] ?></td>
                                <td><?php echo short($c['title']) ?></td>
                                <td><?php echo short(strip_tags(html_entity_decode($c['description']))) ?></td>
                                <td class=" text-nowrap"><?php echo category($c['category_id'])['title'] ?></td>
                                <?php if ($_SESSION['user']['role'] == 0) { ?>
                                    <td class=" text-nowrap"><?php echo user($c['user_id'])['name'] ?></td>
                                <?php } ?>
                                <td>
                                    <?php echo count(viewerCountByPost($c['id'])); ?>
                                </td>
                                <td class=" text-nowrap">
                                    <a href="post_detail.php?id=<?php echo $c['id'] ?>" class="btn btn-sm btn-outline-info"><i class="feather-info fa-fw"></i></a>
                                    <a href="post_delete.php?id=<?php echo $c['id'] ?>" onclick="return confirm('Are you sure to Delete this?')" class="btn btn-sm btn-outline-danger"><i class="feather-trash-2 fa-fw"></i></a>
                                    <a href="post_edit.php?id=<?php echo $c['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="feather-edit-2 fa-fw"></i></a>
                                </td>
                                <td class=" text-nowrap"><?php echo showtime($c['created_at']) ?></td>
                            </tr>
                        <?php } ?>
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