<?php
include('crud.php');
$allProducts = getAllProduct()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Корзина</title>
</head>
<body>
    <div class="nav">
        <ul>
            <li class="dropdown"><a href="<?php $_SERVER['PHP_SELF']?>" class="dropbtn">Продукты</a>
            <div class="dropdown-content">
                <a href="/study/create.php">Добавить продукт</a>
            </div>
        </li>
            <li><a href="cart.php">Корзина</a></li>
        </ul>
    
    </div>
    <div class="content">
        <div class="products">
            <?php if(count($allProducts)>0):?>
            <?php foreach($allProducts as $product):?>
                <div class="product">
                    <div class="cartCheckbox">
                        <div>
                            <h2 class="product-name">
                                <a href="show.php?id=<?php echo $product['id']?>"><?php echo $product['title']?></a>
                            </h2>
                        </div>
                        <div class="checkboxshow">
                            <input type="checkbox" name="cart" id="<?php echo $product['id']?>" onclick="showElement(x=<?php echo $product['id']?>,y='<?php echo $product['title']?>')">
                        </div>
                    </div>
                    <p class="product-description"><?php echo $product['description']?></p>
                    <div class="price-link">
                        <div><p id="the">Цена: <?php echo $product['price']?> сомов</p></div>
                        <div><p><a href="show.php?id=<?php echo $product['id']?>"> Читать полностью</a></p></div>
                    </div>
                </div>
            <?php endforeach;?>
            <?php else:echo '<h1>Products have not found</h1>';?>
            <?php endif;?>
        </div>
        <div class="cart">
            <h1>Добавит в корзину</h1>
            <p>в колличестве</p>
            <form action="cartmethods.php" method="POST">
                <?php foreach($allProducts as $product):?>
                    <input type="number" id="<?php echo $product['title']?>" style="display:none" name="<?php echo $product['title']?>" placeholder="<?php echo $product['title']?>">
                    <br/>
                <?php endforeach;?>
                <button type="submit">Добавить</button>
            </form>
        </div>
        <div class="add-product">
            
        </div> 
    </div>
</body>
</html>
<script>
    function showElement(x,y) {
    // Get the checkbox
    var checkBox = document.getElementById(x);
    // Get the output text
    var text = document.getElementById(y);

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
        text.style.display = "block";
        text.setAttribute('required','');
    } else {
        text.style.display = "none";
    }
    }
</script> 