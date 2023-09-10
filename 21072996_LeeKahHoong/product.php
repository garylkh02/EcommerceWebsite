<?php
include 'logtimeout.php';
?>
<script>
    function loginwarning() {
        if(!confirm("Please login to add the item to cart")) {
        return false;
         }
         window.location.replace("index.php?page=Login"); 
    }
</script>
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}

?>

<?=h_header('Product')?>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            RM <?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">RM <?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form method="post"  action="index.php?page=cart">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['qty']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <?php if(!empty($_SESSION['ID'])){?>
            <input type="submit" value="Add To Cart">
            <?php }else{?>
            <input type="button" value="Add To Cart"  class="addtocart" style="text-align:center;" onclick="return loginwarning();" >
            <?php }?>

        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=h_footer()?>