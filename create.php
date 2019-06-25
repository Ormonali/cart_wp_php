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
    
    <form action="/study/crud.php" method="POST">
        <p>Название продукта:<input type="text" class="name" name="name"></p>
        <textarea name="description" cols="30" rows="10" placeholder="Описание:"></textarea>
        <p>Цена:<input type="number" name="price"></p>
        <button type="submit"><p>Добавить продукт</p></button>
    </form>

</body>
</html>