<?php
require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$id = $_GET['id'];
$table = $_GET['table'];
if(ads_delete($table,$id)){
    linkTo("ads_list.php");
}