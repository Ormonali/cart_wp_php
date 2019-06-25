<?php 
include('crud.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);
    $forcart = array_filter($_POST);
    $keys = array_keys($forcart);
    $keys = implode("','",$keys);
    $query = mysqli_query(connect(),"SELECT `price` FROM `products` WHERE `title` in ('$keys')");
    $arr = getAllquery($query);
    $prices = array_column($arr,'price');
    foreach($prices as $price){
        $price
    }
   //$price = (int) $arr['price'];
   // $price = (int) $forcart[26]*$price;
   // $query = mysqli_query(connect(),"INSERT INTO `inCart`(`id`,`product_id`,`quantity`,`price`) VALUES (Null,'$keys[0]','$forcart[26]','$price')");
    //$query = mysqli_fetch_array($query,MYSQLI_ASSOC);
    //var_dump($query);
    var_dump($prices);
}
