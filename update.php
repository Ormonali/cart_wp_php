<?php
include('crud.php');
$data = getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="title">Добавление продукта</h1>
    <form action="crud.php?u=<?php echo $data['id'] ?>" method="POST">
        <p>Название продукта:<input type="text" class="name" name="name" value="<?php echo $data['title']?>"></p>
        <textarea name="description" cols="30" rows="10" placeholder="Описание:"><?php echo $data['description']?></textarea>
        <p>Цена:<input type="number" name="price" value="<?php echo $data['price']?>"></p>
        <button type="submit"><p>Изменить продукт</p></button>
    </form>

</body>
</html>