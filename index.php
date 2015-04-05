<?php
include './connection.php';

$sql = "SELECT p.id as `ProdID`,c.id as `CatID`, c.title as `CatTitle`,p.title as `ProdTitle`,p.price as `Price`
        FROM category as c
        INNER JOIN product2category as pc on pc.categoryid = c.id
        INNER JOIN product as p ON p.id = pc.productid";
$query = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($query)){
    $data[$row['ProdID']]['ProdTitle'] = $row['ProdTitle'];
    $data[$row['ProdID']]['Price'] = $row['Price'];
    $data[$row['ProdID']]['categories'][$row['CatID']] = $row['CatTitle'];
}
echo '<table border="1"><tr><td>Products</td><td>Categories</td><td>Price</td></tr>';
foreach ($data as $value) {
    $ar = array();
    echo '<tr><td>' . $value['ProdTitle'] . '</td>';
    foreach ($value['categories'] as $v) {
        $ar[] = $v;
    }
        echo '<td>'.implode(',', $ar) . '</td>';
    echo '<td>'.$value['Price'].'</td></tr>';
}
echo '</table>';
