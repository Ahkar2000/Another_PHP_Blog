</div>
           
           
           
           </div>
       </section>
<script src="<?php echo $url;?>/assets/js/jquery.js"></script>
<script src="<?php echo $url;?>/assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo $url;?>/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url;?>/assets/vendor/chart_js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo $url;?>/assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    let current = location.href;
    $(".menu-item-link").each(function(){
        let links = $(this).attr("href");
        if (current == links){
            $(this).addClass("active");
        }
    });
</script>
</body>
</html>