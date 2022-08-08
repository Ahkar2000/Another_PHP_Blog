<?php include "core/auth.php"; ?>
<?php include "core/is_admin.php" ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visitors</li>
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
                        <i class=" feather-eye me-1"></i>Visitors List
                    </h4>
                    <a href="#" class="btn btn-outline-secondary maximizeBtn">
                        <i class=" feather-maximize-2"></i>
                    </a>
                </div>
                <hr>
                <table class=" table table-hover mt-3 mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Viewed Posts</th>
                            <th>Control</th>
                            <th>Device</th>
                            <th>Visited</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (visitors() as $c) {
                        ?>
                            <tr>
                                <td>Guest</td>
                                <td><?php echo post($c['post_id'])['title'] ?></td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" href="<?php echo $url?>/post_detail.php?id=<?php echo $c['post_id']?>">View Post</a>
                                </td>
                                <td><?php echo $c['device'] ?></td>
                                <td class="text-nowrap"><?php echo showtime($c['created_at']) ?></td>
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