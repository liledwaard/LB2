<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LB2</title>
</head>
<body>
    <?php
    include "database.php";
    $min = $_GET['min'] == null ? 0 : $_GET['min'];
    $max = $_GET['max'] == null ? 10000 : $_GET['max'];
    ?>
    <select name="" id="publishers">
        <?php foreach(getListOfCollection() -> distinct("vendor") as $publisher): ?>
            <option><?=$publisher?></option>
        <?php endforeach; ?>
    </select>
    <a id="publisher-link" href=""> get</a>
    <ol id="item-by-price">
        <?php $i = 0; foreach(getByPrice($min, $max) as $item) : ?>
            <li id="item<?= $i++ ?>">
                Name: <?= $item['name'] ?>, Price: <?= $item['price'] ?>
            </li>
        <?php endforeach; ?>
    </ol>
    <form action="index.php">
        <input type="text" name="min" id="min" placeholder="min">
        <input type="text" name="max" id="max" placeholder="max">
        <input type="submit" value="get">
    </form>
    <br>
    <a href="outOfStock.php">Out of stock</a>
    <script>
        var publisherLink = document.getElementById("publisher-link");
        publisherLink.onclick = () => {
            publisherLink.href = `vendors.php?vendor=${document.getElementById('publishers').value}`;
        }
    </script>
</body>
</html>