<?php

$connection = mysqli_connect('localhost', 'root', '', 'rg');
if(!$connection){
    echo 'no database';
    exit;
}

mysqli_set_charset($connection, 'utf8');
