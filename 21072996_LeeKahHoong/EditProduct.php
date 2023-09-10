<?php
include 'logtimeout.php';

// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added');
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=h_header('Products')?>


<div class="products content-wrapper">
    <h1>Edit Products</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper" style="justify-content:flex-start;">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=changeproduct&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                RM <?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">RM <?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
        <a href="index.php?page=addproduct" class="product">
            <img src="imgs/add.png" width="200" height="200" alt="add icon">
            
            <span class="name">Add Product</span>
            <span class="price">
                RM 0.00
                <span class="rrp">RM 0.00</span>
            </span>
        </a>
    </div>
</div>

<?=h_footer()?>