<?php

//make connection
function connect(){
    $connection = mysqli_connect('127.0.0.1','orion','456398','cart');
    return $connection;
}
//add product to db
if($_SERVER['PHP_SELF']=='/study/crud.php'){
    if(!isset($_GET['u']) && $_SERVER['REQUEST_METHOD']=='POST'){
        if(verify($_POST)==1){
            postProduct();
            
        }else{
            goback();
        }
    }

    if(isset($_GET['u'])){
        if(verify($_POST)==1){
            updateProduct($_GET['u']);
            redirectToIndex('updated');
        }else{
            goback();
        }
    }

    if(isset($_GET['d'])){
        deleteProduct($_GET['d']);
        redirectToIndex('deleted');
    }
}


//CRUD methods
function postProduct(){
    $form = $_POST;
    $name = $form["name"];
    $desc = $form["description"];
    $price = $form['price'];  
    $sql = "INSERT INTO products (`id`,`title`,`description`,`price`) VALUES (Null,'$name', '$desc',$price)";
    if(mysqli_query(connect(),$sql)){
        redirectToIndex('stored');
    }else{
        echo mysqli_error(connect());
    };
}

function getAllProduct(){
    $getAll = mysqli_query(connect(),"SELECT * FROM `products` ORDER BY `id` DESC");
    //$row = mysqli_fetch_array($getAll,MYSQLI_ASSOC);
    $api=[];
    while($row = mysqli_fetch_array($getAll,MYSQLI_ASSOC)){
        $api[]=$row;
    };
    if(empty($api)){
        return $api;
    }else{
        return $api;
    }
    mysqli_close(connect());
}

function getProduct($id){
    $get = mysqli_query(connect(),"SELECT * FROM `products` WHERE `id`= $id");
    $getThat = mysqli_fetch_array($get,MYSQLI_ASSOC);
    return $getThat;
}

function updateProduct($id){
    $update = $_POST;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sql = mysqli_query(connect(),"UPDATE `products` SET `title`='$name',`description`='$description',`price`=$price WHERE `id`=$id");
    mysqli_close(connect());
}

function deleteProduct($id){
    $remove = mysqli_query(connect(),"DELETE FROM `products` WHERE `id`= $id");
}

//some small functions
function redirectToIndex($message){
    if(!empty($message)){
        echo 'Successfully '.$message;
    };
    header("Refresh:1; url=index.php");
}
function goback()
{
	header("Location: {$_SERVER['HTTP_REFERER']}");
}
function verify($data){
    $check = array_filter($data);
    if(count($check)==count($data)){
        return 1;
    }else{
        return 0;
    }
}
function getAllquery($query){
    $arr =array();
    for($i=0;$i<$query->num_rows;$i++){
        $arr[] =mysqli_fetch_assoc($query);
    }
    return $arr;
}
function calculatePrices($a,$b){
    $reversei = count($a)-1;
    $price=array();
    for($i=0;$i<count($a);$i++){
        $price[] = $a[$reversei]*$b[$i];
        $reversei--;
    }
    return $price;
}