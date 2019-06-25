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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title><?php echo $product['title'];?></title>
</head>
<body>
    <div class="contentShow">
        <div class="info">
            <h1><?php echo $product['title'];?></h1>
            <p class="showDescription"><?php echo $product['description'];?></p>
            <h3><?php echo $product['price'];?></h3>
        </div>
        <div class="buttons">
            <button><a href="update.php?id=<?php echo $product['id'];?>">Обновить </a></button>
            <button><a href="crud.php?d=<?php echo $product['id'];?>">DELETE</a></button>
            <button><a href="index.php">Назад</a></button>
        </div>
    </div>
</body>
</html>