<?php require_once "core/auth.php"; ?>
<?php require_once "template/header.php"; ?>
<?php
if (isset($_POST['transfer'])) {
    if (transfer()) {
        linkTo("wallet.php");
    }
}
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
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
                        <i class=" feather-dollar-sign me-1"></i> Wallet
                    </h4>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="feather-user"></i> You have $<?php echo user($_SESSION['user']['id'])['money'] ?>
                    </a>
                </div>
                <hr>
                <form method="post">
                    <div class=" form-check-inline d-flex">
                        <select name="to_user" id="" class="form-control me-2 w-25" required>
                            <option value="0" selected disabled>Select User</option>
                            <?php foreach (users() as $u) { ?>
                                <?php if ($u['id'] != $_SESSION['user']['id']) { ?>
                                    <option value="<?php echo $u['id'] ?>"><?php echo $u['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="number" name="amount" class="form-control w-25 me-2" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>" placeholder="Enter Amount" required>
                        <input type="text" name="description" class="form-control w-25 me-2" placeholder="Say Something">
                        <button class="btn btn-primary" name="transfer">Transfer</button>
                    </div>
                </form>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
                        <?php foreach(transitions() as $t){?>
                            <tr>
                                <td><?php echo $t['id']?></td>
                                <td><?php echo user($t['from_user'])['name']?></td>
                                <td><?php echo user($t['to_user'])['name']?></td>
                                <td><?php echo $t['amount']?></td>
                                <td><?php echo $t['description']?></td>
                                <td><?php echo date("d-m-Y / h:i",strtotime($t['created_at']))?></td>
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