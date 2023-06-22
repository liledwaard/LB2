<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->lb2var5->mouses;
function getListOfCollection()
{
    global $collection;
    return $collection;
}
function getByPrice($min, $max)
{
    global $collection;
    $result = $collection->find(['price' => ['$gte' => (int)$min, '$lte' => (int)$max]]);
    return $result;
}
function getItemsOutOfStock()
{
    global $collection;
    $result = $collection->find(['count' => 0]);
    return $result;
}
function getByVendor($vendor)
{
    global $collection;
    $result = $collection->find(['vendor' => $vendor]);
    return $result;
}
?>