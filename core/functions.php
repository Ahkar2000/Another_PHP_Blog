<?php
//common start

function alert($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}
function runquery($sql){
    if(mysqli_query(con(),$sql)){
        return true;
    }else{
        die("Query fail : ".mysqli_connect_error());
    }
}
function redirect($l){
    header("location:$l");
}
function linkTo($l){
    echo "<script>location.href='$l'</script>";
}
function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}
function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}
function showtime($timestamp,$format = "d-m-y"){
    return date($format,strtotime($timestamp));
}
function count_total($table,$condition=1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNT(id)'];
}
function short($str,$length='50'){
    return substr($str,0,$length)."...";
}
function text_filter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripslashes($text);
    return $text;
}
//common end

//auth start

function register(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $spass = password_hash($password,PASSWORD_DEFAULT);
    if($password==$cpassword){
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$spass')";
    if(runquery($sql)){
        redirect("login.php");
    };
    }else{
        return alert("Password do not match!");
    }
}
function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    if(!$row){
         return alert("Email or Password do not match!");
    }else{
        if(!password_verify($password,$row['password'])){
            return alert("Email or Password do not match!");
        }else{
            session_start();
            $_SESSION['user'] = $row;
            redirect('dashboard.php');
        }
    }
}
//auth end

//user start

function user($id){
    $sql = "SELECT * FROM users WHERE id='$id'";
    return fetch($sql);
}
function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

//user end

//category start

function category_add(){
    $title = text_filter(strip_tags($_POST['title']));
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if(runquery($sql)){
        linkTo("category_add.php");
    }
}
function category($id){
    $sql = "SELECT * FROM categories WHERE id='$id'";
    return fetch($sql);
}
function categories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}
function category_delete($id){
    $sql = "DELETE FROM categories WHERE id=$id";
    return runquery($sql);
}
function category_update(){
    $title = $_POST['title'];
    $id = $_POST['id'];
    $sql = "UPDATE categories SET title='$title' WHERE id='$id' ";
    return runquery($sql);
}
function category_pin_to_top($id){
    $sql = "UPDATE categories SET ordering='0'";
    mysqli_query(con(),$sql);
    $sql = "UPDATE categories SET ordering='1' WHERE id='$id' ";
    return runquery($sql);
}
function category_remove_pin(){
    $sql = "UPDATE categories SET ordering='0'";
    return runquery($sql);
}
function isCategory($id){
    if(category($id)){
        return $id;
    }else{
        die ("Category Invalid");
    }
}
//category end

//post start
function post_add(){
    $title = text_filter($_POST['title']);
    $description = text_filter($_POST['description']);
    $category_id = isCategory($_POST['category_id']);
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO posts (title,description,category_id,user_id) VALUES ('$title','$description','$category_id','$user_id')";
    if(runquery($sql)){
        linkTo("post_add.php");
    }
}
function post($id){
    $sql = "SELECT * FROM posts WHERE id='$id'";
    return fetch($sql);
}
function posts(){
    if($_SESSION['user']['role'] == 2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id='$current_user_id'";
    }else{
        $sql = "SELECT * FROM posts";
    }
    return fetchAll($sql);
}
function post_delete($id){
    $sql = "DELETE FROM posts WHERE id=$id";
    return runquery($sql);
}
function post_update(){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $sql = "UPDATE `posts` SET `title`='$title',`description`='$description',`category_id`='$category_id' WHERE id='$id' "; 
    return runquery($sql);
}
//post end

//front panel start

function fposts($orderCol="id",$orderType="DESC"){
    $sql = "SELECT * FROM posts ORDER BY $orderCol $orderType";
    return fetchAll($sql);
}
function fcategories(){
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}
function fpostsByCat($category_id,$limit="99999",$post_id=0){
    $sql = "SELECT * FROM posts WHERE category_id='$category_id' AND id!='$post_id' ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}
function fsearch($searchkey){
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchkey%' OR description LIKE '%$searchkey%' ORDER BY id DESC";
    return fetchAll($sql);
}
function fsearch_by_date($start,$end){
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchAll($sql);
}
//front panel end

//user viewer count start

function viewer_record($user_id,$post_id,$device){
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    return runquery($sql);
}
function viewerCountByPost($postId){
    $sql = "SELECT * FROM viewers WHERE post_id = '$postId'";
    return fetchAll($sql);
}
function viewer_count_by_user($userId){
    $sql = "SELECT * FROM viewers WHERE user_id = '$userId'";
    return fetchAll($sql);
}

//user viewer count end

//ads start
function ads_list($table,$id){
    $sql = "SELECT * FROM $table WHERE id='$id'";
    return fetch($sql);
}
function ads_all($table){
    $sql = "SELECT * FROM $table";
    return fetchAll($sql);
}
function ads($name,$start,$end){
    $today = date("Y-m-d");
    $sql = "SELECT * FROM $name WHERE $start <= '$today' AND $end >'$today' LIMIT 1";
    return fetchAll($sql);
}
function ads_one_add(){
    $order_name = $_POST['owner_name_one'];
    $photo_link = $_POST['photo_link_one'];
    $link = $_POST['link_one'];
    $start = $_POST['start_one'];
    $end = $_POST['end_one'];
    $sql = "INSERT INTO ads_one (owner_name_one,photo_one,link_one,start_one,end_one) VALUES ('$order_name','$photo_link','$link','$start','$end')";
    if(runquery($sql)){
        linkTo("ads_list.php");
    }
}
function ads_two_add(){
    $order_name = $_POST['owner_name_two'];
    $photo_link = $_POST['photo_link_two'];
    $link = $_POST['link_two'];
    $start = $_POST['start_two'];
    $end = $_POST['end_two'];
    $sql = "INSERT INTO ads_two (owner_name_two,photo_two,link_two,start_two,end_two) VALUES ('$order_name','$photo_link','$link','$start','$end')";
    if(runquery($sql)){
        linkTo("ads_list.php");
    }
}
function ads_delete($table,$id){
    $sql = "DELETE FROM $table WHERE id=$id";
    return runquery($sql);
}
function ads_update($tb){
    $id = $_POST['id'];
    $name = $_POST["owner_name_$tb"];
    $photo = $_POST["photo_link_$tb"];
    $link = $_POST["link_$tb"];
    $start = $_POST["start_$tb"];
    $end = $_POST["end_$tb"];
    $sql = "UPDATE `ads_$tb` SET `owner_name_$tb`='$name',`photo_$tb`='$photo',`link_$tb`='$link',`start_$tb`='$start',`end_$tb`='$end' WHERE id='$id'"; 
    return runquery($sql);
}
//ads end

//payment start

function transfer(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    //from user money update
    $fromUserDetail = user($from);
    if($fromUserDetail['money']>=$amount){
        $leftMoney = $fromUserDetail['money'] - $amount;
        $sql = "UPDATE users SET money=$leftMoney WHERE id='$from'";
        mysqli_query(con(),$sql);
    
        //to user money update
        $toUserDetail = user($to);
        $newMoney =  $toUserDetail['money'] + $amount;
        $sql = "UPDATE users SET money=$newMoney WHERE id='$to'";
        mysqli_query(con(),$sql);
    
        //add to transition table
        $sql = "INSERT INTO transition (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
        runquery($sql);
    }
    linkTo('wallet.php');
}
function transitions(){
    $user_id = $_SESSION['user']['id'];
    if($_SESSION['user']['role']==0){
        $sql = "SELECT * FROM transition ORDER BY id DESC";
        return fetchAll($sql);
    }else{
        $sql = "SELECT * FROM transition WHERE from_user=$user_id OR to_user=$user_id";
        return fetchAll($sql);
    }
}
function transition($id){
    $sql = "SELECT * FROM transition";
    return fetchAll($sql);
}
//payment endfunction transfer


//dashboard function start

function dashboard_posts($limit){
    if($_SESSION['user']['role'] == 2){
        $current_user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE user_id='$current_user_id' ORDER BY id DESC LIMIT $limit";
    }else{
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
    }
    return fetchAll($sql);
}


//dashboard function end


//visitors start

function visitors(){
    $sql = "SELECT * FROM viewers WHERE user_id='0'";
    return fetchAll($sql);
}

//visitors end


//api start

function apiOutput($arr){
    echo json_encode($arr);
}

//api end