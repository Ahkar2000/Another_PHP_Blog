<?php
function con(){
    return mysqli_connect("localhost","root","","sample_blog");
}
$info = array(
    "name" => "Sample Blog",
    "short" => "SB",
    "description" => "Hello Welcome"
);
$role = ["Admin","Editor","User"];
$url ="http://{$_SERVER['HTTP_HOST']}/Back-End/5_sample_blog";
date_default_timezone_set('Asia/Yangon');