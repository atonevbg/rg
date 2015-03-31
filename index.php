<?php
include './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RG</title>
    </head>
    <body>
        <?php
            $sql = "SELECT * FROM category ";
            $query = mysqli_query($connection, $sql);
            while( $row = mysqli_fetch_assoc( $query ) ) {
                echo 'Category - '.$row['title'].'<br>';
                $sql1 = "SELECT COUNT(*) as `Productcounts` FROM product2category WHERE CategoryId=$row[id]";
                $query1 = mysqli_query($connection, $sql1);
                $row1= mysqli_fetch_assoc($query1);
                echo 'Products - '.$row1['Productcounts'].'<br>';
            }
            echo '<hr>';
            $sql2 = "SELECT * FROM product";
            $query2 = mysqli_query($connection, $sql2);
            while($row2 = mysqli_fetch_assoc($query2)){
                echo 'Product - '. $row2['title'].' <br> ';
                echo 'price - '.$row2['price'].'<br>'; 
                $sql3 = "SELECT * FROM product2category WHERE productid = $row2[id]";
                $query3 = mysqli_query($connection, $sql3);
                    while($row3 = mysqli_fetch_assoc($query3)){
                        $sql4 = "SELECT * FROM category WHERE id = $row3[CategoryId]";
                        $query4 = mysqli_query($connection, $sql4);
                        $row4 = mysqli_fetch_assoc($query4);
                        echo  $row4['title'].'<br>';
                    }
             echo '<hr>';
             }
            ?>
    </body>
</html>
