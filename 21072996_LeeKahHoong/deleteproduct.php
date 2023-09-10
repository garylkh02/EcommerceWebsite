<?php
include 'logtimeout.php';
require 'DatabaseAccess.php';
try{
    $pdo= new PDO($attr,$user,$pass,$opts);
}
catch(\PDOException $e){
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}

if (isset($_POST['id'])) {
    $stmt = $pdo->query('DELETE FROM products WHERE id='. $_POST['id']);
    if(! $stmt){
        die('Error:' . mysqli_error());
    }
    echo '<script type="text/javascript">',
    'alert("You have sucessfully deleted the product.");
    window.location.replace("index.php?page=EditProduct"); ',
    '</script>';
    }
?>