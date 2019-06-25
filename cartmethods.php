<?php 
include('crud.php');
if(!isset($_GET['u']) && $_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);
    $forcart = array_filter($_POST);
    $keys = array_keys($forcart);
    $implodekeys = implode("','",$keys);
    $query = mysqli_query(connect(),"SELECT `price` FROM `products` WHERE `title` in ('$implodekeys')");
    $arr = getAllquery($query);
    $prices = array_column($arr,'price');
    $quantity = array_values($forcart);
    $prices = calculatePrices($prices,$quantity);
    var_dump($keys);
    var_dump($quantity);
    var_dump($prices);
    for($i=0;$i<count($keys);$i++){
        $query = mysqli_query(connect(),"INSERT INTO `inCart` (`id`,`product_name`,`quantity`,`price`) VALUES (Null,'$keys[$i]','$quantity[$i]','$prices[$i]')");
    }
    goback();
}
if(isset($_GET['d'])){
    deleteInCart($_GET['d']);
    goback();
}
function inCart(){
    $query = mysqli_query(connect(),"SELECT * FROM `inCart`");
    $query = getAllquery($query);
    return $query;
}

function deleteInCart($id){
    $remove = mysqli_query(connect(),"DELETE FROM `inCart` WHERE `id`= $id");
}

function updateInCart(){

}
