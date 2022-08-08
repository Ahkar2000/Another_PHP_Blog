<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<!-- content area start -->
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-3 status-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class=" feather-eye h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 fw-bolder">
                            <span class="counter-up">
                                <?php echo count_total('viewers') ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Total Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-3 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class=" feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 fw-bolder">
                            <span class="counter-up">
                                <?php echo count_total('posts') ?>
                            </span>
                        </p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-3 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class=" feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 fw-bolder">
                            <span class="counter-up"><?php echo count_total('categories') ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-3 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class=" feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 fw-bolder">
                            <span class="counter-up"><?php echo count_total('users') ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-end">
    <div class="col-12 col-xl-7 mb-4">
        <div class="card overflow-hidden shadow">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class=" mb-0">Visitors</h4>
                    <div>
                        <img src="<?php echo $url ?>/assets/img/user/avatar1.jpg" alt="" class=" ov-img rounded-circle">
                        <img src="<?php echo $url ?>/assets/img/user/avatar2.jpg" alt="" class=" ov-img rounded-circle">
                        <img src="<?php echo $url ?>/assets/img/user/avatar3.jpg" alt="" class=" ov-img rounded-circle">
                        <img src="<?php echo $url ?>/assets/img/user/avatar4.jpg" alt="" class=" ov-img rounded-circle">
                        <img src="<?php echo $url ?>/assets/img/user/avatar5.jpg" alt="" class=" ov-img rounded-circle">
                    </div>
                </div>
                <canvas id="ov" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-5 mb-4">
        <div class="card">
            <div class="card-body overflow-hidden shadow">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h4 class=" mb-0">Category / Posts</h4>
                        <div>
                            <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                        </div>
                    </div>
                    <canvas id="op" height="217"></canvas>
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 col-xl-12">
        <div class="card overflow-hidden sub-table shadow">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4 class="ms-2 mb-0">Recent Posts</h4>
                    <div>
                        <?php
                            $current_user_id = $_SESSION['user']['id'];
                            $post_total = count_total('posts');
                            $current_user_posts = count_total('posts', "user_id='$current_user_id'");
                            $current_user_percentage = floor(($current_user_posts / $post_total) * 100);
                        ?>
                        <small>Your Posts : <?php echo $post_total;?></small>
                        <div class="progress" style="width: 300px; height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $current_user_percentage?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
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
                    foreach (dashboard_posts(5) as $c) {
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
<!-- content area end -->
<?php include "template/footer.php"; ?>
<script src="<?php echo $url; ?>/assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/chart_js/Chart.min.js"></script>
<script>
    $('.counter-up').counterUp({
        'delay': 10,
        'time': 1000
    });
    <?php
    $dateArr = [];
    $visitorsRate = [];
    $transitionRate = [];
    $today = date("Y-m-d");

    for ($i = 0; $i < 10; $i++) {
        $date = date_create($today);
        date_sub($date, date_interval_create_from_date_string("$i days"));
        $current = date_format($date, "Y-m-d");
        array_push($dateArr, $current);
        $result = count_total('viewers', "CAST(created_at AS DATE) = '$current'");
        array_push($visitorsRate, $result);
        $transitons = count_total('transition', "CAST(created_at AS DATE) = '$current'");
        array_push($transitionRate, $transitons);
    }
    ?>
    let dateArr = <?php echo json_encode($dateArr) ?>;
    let visitorsRate = <?php echo json_encode($visitorsRate) ?>;
    let transitionRate = <?php echo json_encode($transitionRate) ?>;
    const ov = document.getElementById('ov').getContext('2d');
    const myChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [{
                    label: 'Posts Viewed',
                    data: visitorsRate,
                    backgroundColor: [
                        '#0d6efd30',
                    ],
                    borderColor: [
                        '#0d6efd',
                    ],
                    borderWidth: 1,
                    tension: 0
                },
                {
                    label: 'Transitions Rate',
                    data: transitionRate,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1,
                    tension: 0
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    beginAtZero: true,

                }],
                xAxes: [{
                    display: false,
                    gridLines: [{
                        display: false
                    }]
                }]
            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        }
    });
    <?php
    $cartName = [];
    $countPosts = [];
    foreach (categories() as $c) {
        array_push($cartName, $c['title']);
        array_push($countPosts, count_total('posts', "category_id={$c['id']}"));
    }
    //php arr to js arr
    ?>
    let catArr = <?php echo json_encode($cartName); ?>;
    let countArr = <?php echo json_encode($countPosts); ?>;

    const op = document.getElementById('op').getContext('2d');
    const chart2 = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: catArr,
            datasets: [{
                label: '# of Votes',
                data: countArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        },

    });
</script>