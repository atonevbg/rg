<?php
include './connection.php';

$sql1 = "SELECT * FROM product";
$product_query = mysqli_query($connection, $sql1);
while($product_row = mysqli_fetch_assoc($product_query)){
    $products[$product_row['id']] = $product_row;
}

$sql3 = "SELECT * FROM product2category";
$relation_query = mysqli_query($connection, $sql3);
while($relation_row = mysqli_fetch_assoc($relation_query)){
    $products[$relation_row['ProductId']]['relations'][] = $relation_row['CategoryId'];
}

$sql2 = "SELECT * FROM category";
$category_query = mysqli_query($connection, $sql2);
while($category_row = mysqli_fetch_assoc($category_query)){
    $categories[$category_row['id']] = $category_row;
}

foreach ($products as $product) {
    echo $product['title'].'<br>';    
    $relations = isset( $product['relations'] ) ? $product['relations'] : array() ;
    foreach( $relations as $category_id ) {
        if( isset($categories[$category_id]) ){
            echo $categories[$category_id]['title'].'<br>';
            
        }
    }     
}
