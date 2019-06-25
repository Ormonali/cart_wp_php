<?php 
include('crud.php');
if(!isset($_GET['u']) && $_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);
    $forcart = array_filter($_POST);
    $keys = array_keys($forcart);
    $prices = getprices($keys);
    $quantity = array_values($forcart);
    $prices = calculatePrices($prices,$quantity);
    for($i=0;$i<count($keys);$i++){
        $query = mysqli_query(connect(),"INSERT INTO `inCart` (`id`,`product_name`,`quantity`,`price`) VALUES (Null,'$keys[$i]','$quantity[$i]','$prices[$i]')");
    }
    goback();
}
if(isset($_GET['d'])){
    deleteInCart($_GET['d']);
    goback();
}

if(isset($_GET['u'])){
    
    updateInCart();
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
    $updateNeededid=explode(',',$_GET['u']);
    $keys=array_filter(array_keys($_POST));
    $updatesQuantity = array_values($_POST);
    for($i=0;$i<count($updatesQuantity);$i++){
        if(empty($updatesQuantity[$i])){
            unset($updatesQuantity[$i]);
            unset($updateNeededid[$i]);
            unset($keys[$i]);
        }
    }
    $updatesQuantity = array_values($updatesQuantity);
    $updateNeededid = array_values($updateNeededid);
    $keys = array_values($keys);
    $prices = getprices($keys);
    $prices = calculatePrices($prices,$updatesQuantity);
    var_dump($prices);
    var_dump($updateNeededid);
    var_dump($updatesQuantity);
    for($i=0;$i<count($updatesQuantity);$i++){
        $query = mysqli_query(connect(),"UPDATE `inCart` SET `quantity`=$updatesQuantity[$i], `price`=$prices[$i] WHERE `id`=$updateNeededid[$i]");
    }
    goback();
}

function getprices($keys){
    $implodekeys = implode("','",$keys);
    $query = mysqli_query(connect(),"SELECT `price` FROM `products` WHERE `title` in ('$implodekeys')");
    $arr = getAllquery($query);
    $prices = array_column($arr,'price');
    return $prices;
}

function calculatePrices($a,$b){
    $reversei = count($a);
    $price=array();
    for($i=0;$i<count($a);$i++){
        $reversei--;
        $price[] = $a[$reversei]*$b[$i];
    }
    return $price;
}