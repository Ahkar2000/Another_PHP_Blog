</head>
<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg bg-primary navbar-dark my-3 rounded">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo $url?>/index.php">Sample Blog</a>
                            </ul>
                            <form class="d-flex" role="search" action="<?php echo $url;?>/search.php" method="post">
                                <input class="form-control me-2" name="key" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-light" name="searchBtn" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <?php foreach(ads('ads_one','start_one','end_one') as $a){?>
                    <a href="<?php echo $a['link_one']?>" target="_blink">
                        <img src="<?php echo $a['photo_one']?>" alt="" class="w-100 mb-3 rounded shadow">
                    </a>
                <?php }?>
            </div>
            <div class="col-12">
                <?php foreach(ads('ads_two','start_two','end_two') as $a){?>
                    <a href="<?php echo $a['link_two']?>" target="_blink">
                        <img src="<?php echo $a['photo_two']?>" alt="" class="w-100 mb-3 rounded shadow">
                    </a>
                <?php }?>
            </div>
        </div>
    </div>