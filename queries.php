<?php
include './connection.php';

$sql1 = "SELECT * FROM product";
$product_query = mysqli_query($connection, $sql1);
while($product_row = mysqli_fetch_assoc($product_query)){
    $products[] = $product_row;
}

$sql2 = "SELECT * FROM category";
$category_query = mysqli_query($connection, $sql2);
while($category_row = mysqli_fetch_assoc($category_query)){
    $categories[] = $category_row;
}

$sql3 = "SELECT * FROM product2category";
$relation_query = mysqli_query($connection, $sql3);
while($relation_row = mysqli_fetch_assoc($relation_query)){
    $relations[] = $relation_row;
}

foreach($products as $product) {
    $products[$product['id']] = $product;
    foreach ($product as $key => $value) {
        echo '<b>'.$key.'</b>: '. $value;
        echo '<br>';
    }
    echo '<br>';
}

echo '<hr>';

foreach($categories as $category) {
    $categories[$category['id']] = $category;
    foreach ($category as $key => $value) {
        echo '<b>'.$key.'</b>: '. $value;
        echo '<br>';
    }
    echo '<br>';
}

echo '<hr>';

foreach($relations as $relation) {
    $relations[$relation['id']] = $relation;
    foreach ($relation as $key => $value) {
        echo '<b>'.$key.'</b>: '. $value;
        echo '<br>';
    }
    echo '<br>';
}

