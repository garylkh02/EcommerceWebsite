<?php
include 'logtimeout.php';
require 'DatabaseAccess.php';
try{
    $pdo= new PDO($attr,$user,$pass,$opts);
}
catch(\PDOException $e){
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}

if (isset($_POST['CustID'])) {
    $stmt = $pdo->query('DELETE FROM cust_info WHERE CustID='. $_POST['CustID']);
    if(! $stmt){
        die('Error:' . mysqli_error());
    }
    echo '<script type="text/javascript">',
    'alert("You have sucessfully deleted the customer.");
    window.location.replace("index.php?page=editcustomer"); ',
    '</script>';
    }
?>