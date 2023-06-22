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
    $items = getItemsOutOfStock();
    ?>
    <ol id="items-in-stock">
        <?php $i = 0; foreach($items as $item) : ?>
            <li id="item<?= $i++ ?>">
                <?= $item['name'] ?>
            </li>
        <?php endforeach; ?>
    </ol>
    <input id="show-previous-request-button" type="submit" value="Show previous result for this query">
    <script> 
        document.getElementById("show-previous-request-button").onclick = () => {
            if(!localStorage.result)
            {
                alert("No requests in history");
            }
            else
            {
                alert(JSON.parse(localStorage.result));          
            }
        }    
        window.onunload = () => {
            var resultArray = [];
            for(let i = 0; i < document.getElementById("items-in-stock").childElementCount; i++)
            {
                resultArray.push(document.getElementById(`item${i}`).innerText);
            }
            localStorage.setItem('result', JSON.stringify(resultArray));
        }
    </script>
</body>
</html>