<?php
include 'logtimeout.php';

// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM cust_info ORDER BY CustID');
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_customer = $pdo->query('SELECT * FROM cust_info')->rowCount();
?>

<?=h_header('EditCustomer')?>


<div class="products content-wrapper">
    <h1>Edit Customer</h1>
    <p><?=$total_customer?> Customer</p>
    <div class="products-wrapper" style="justify-content:flex-start;">
        <?php foreach ($customers as $customer): ?>
        <a href="index.php?page=changecustomer&CustID=<?=$customer['CustID']?>" class="product">
            <img src="imgs/profile.png" width="200" height="200" alt="profile icon">
            <span class="name"><?=$customer['Last_name']?></span>
            <span class="price">
            <?=$customer['Email']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=h_footer()?>