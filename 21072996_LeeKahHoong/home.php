<?php
include 'logtimeout.php';
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=h_header('Home')?>

<div class="featured">
    <h2 style="font-family:Helvetica;">Welcome to Green Stuff</h2>
    <p style="font-family:'Monaco';text-shadow: 2px 2px #023020">A Marketplace for Recycled Products</p>
</div>

<br>
<br>
<div class="recentlyadded content-wrapper">
    <h2>What's Trending?</h2>
</div>
<br>
<br>
<div class="col">
      <iframe width="710" height="400"
      src="https://www.youtube.com/embed/_6xlNyWPpB8?autoplay=1&mute=1">
      </iframe>
      <h2>What really happens to the plastic you throw away by Emma Bryce</h2>
      <p style="text-align: center;">Did you know what happens to the plastic after you throwing it away? <br>Here's a video by TED-Ed on YouTube. <br> Hope you like it! :)</p>
    </div>
    <br>
    <br>

<style>
  .col {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>


<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
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
    </div>
</div>

<?=h_footer()?>
