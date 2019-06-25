<?php
include('cartmethods.php');
$get = inCart();

$product_names = array_column($get,'product_name');
$inCartId = array_column($get,'id');
$updateID = implode(",",$inCartId);
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
                <li class="dropdown"><a href="cart.php">Корзина</a>
                    <div class="dropdown-content">
                        <a href="index.php">Добавить в корзину</a>
                    </div>
                </li>
            </ul>
    </div>
    <h1>Ваша Корзина</h1>
        <div class="content">
            <div class="products">
                    <?php if(!empty($product_names)):?>
                        <?php for($i=0;$i<count($product_names);$i++):?>
                            <div class="cartItems product">
                                <h1><?php echo $product_names[$i]?></h1>
                                <p>Колличество: <?php echo $quantity[$i]?></p>
                                <p>Цена: <?php echo $price[$i]?></p>
                                <a href="cartmethods.php?d=<?php echo $inCartId[$i]?>">Удалить</a>
                                <div class="checkboxshow">
                                    изменить колличество ?<input type="checkbox" name="cart" id="<?php echo $inCartId[$i]?>" onclick="showElement(x=<?php echo $inCartId[$i]?>,y='<?php echo $product_names[$i]?>')">
                                </div>
                            </div>
                        <?php endfor;?>
                    <?php else:echo '<p>CART IS EMPTY</p>'?>
                    <?php endif;?>
                    <button><a href="index.php">назад</a></button>
            </div>
            <div class="cart">
                <h1>Обновить корзину</h1>
                <p>Выберите продукт и нажмите на чекбокс</p>
                <form action="cartmethods.php?u=<?php print($updateID)?>" method="POST" id="cartFormUpdate">
                    <?php foreach($product_names as $product):?>
                        <input type="number" id="<?php echo $product?>" style="display:none" name="<?php echo $product?>" placeholder="<?php echo $product?>">
                        <br/>
                    <?php endforeach;?>
                    <button type="submit">Обновить</button>
                </form>
            </div>
        </div>
        <script src="showElement.js"></script>
</body>
</html>