<?php 
include('crud.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);
    $forcart = array_filter($_POST);
    $onlykeys = array_keys($forcart);
    $keys = implode("','",$onlykeys);
    $query = mysqli_query(connect(),"SELECT `price` FROM `products` WHERE `title` in ('$keys')");
    $arr = getAllquery($query);
    $prices = array_column($arr,'price');
    $quantity = array_values($forcart);
    $prices = calculatePrices($prices,$quantity);
    $keys = implode(" ",$onlykeys);
    $prices = implode(" ",$prices);
    $quantity = implode(" ",$quantity);
    var_dump($keys);
    var_dump($quantity);
    var_dump($prices);
    $query = mysqli_query(connect(),"INSERT INTO `inCart` (`id`,`product_name`,`quantity`,`price`) VALUES (Null,'$keys','$quantity','$prices')");
    var_dump($query);
}
function inCart(){
    $query = mysqli_query(connect(),"SELECT * FROM `inCart`");
    $query = getAllquery($query);
    return $query;
}
