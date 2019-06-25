<?php
include('cartmethods.php');
$get = inCart();

$product_names = array_column($get,'product_name');
$inCartId = array_column($get,'id');
$quantity = array_column($get,'quantity');
$price = array_column($get,'price');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Корзина</title>
</head>
<body>
    <div class="nav">
            <ul>
                <li class="dropdown"><a href="index.php" class="dropbtn">Продукты</a>
                <div class="dropdown-content">
                    <a href="/study/create.php">Добавить продукт</a>
                </div>
            </li>
                <li><a href="cart.php">Корзина</a></li>
            </ul>
    </div>
        <div class="content">
            <div class="products">
                <div class="inCart">
                    <?php if(!empty($product_names)):?>
                        <?php for($i=0;$i<count($product_names);$i++):?>
                            <div class="cartItems">
                                <h1><?php echo $product_names[$i]?></h1>
                                <a href="cartmethods.php?d=<?php echo $inCartId[$i]?>">Удалить</a>
                                <input type="number" value="<?php echo $quantity[$i]?>">
                                <p><?php echo $price[$i]?></p>
                            </div>
                        <?php endfor;?>
                    <?php else:echo '<p>CART IS EMPTY</p>'?>
                    <?php endif;?>
                    <button><a href="index.php">назад</a></button>
                </div>
            </div>
            <div class="cart">
            </div>
        </div>
</body>
</html>