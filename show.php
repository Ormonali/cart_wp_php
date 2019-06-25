<?php
include('crud.php');
$product = getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $product['title'];?></title>
</head>
<body>
    <h1><?php echo $product['title'];?></h1>
    <p><?php echo $product['description'];?></p>
    <h3><?php echo $product['price'];?></h3>
    <button><a href="update.php?id=<?php echo $product['id'];?>">Обновить </a></button>
    <button><a href="crud.php?d=<?php echo $product['id'];?>">DELETE</a></button>
    <button><a href="index.php">Назад</a></button>
</body>
</html>