<?php
function pdo_connect_mysql(){
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'web';

    try{
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        exit('Unable to connect to database!');
    }
}

function h_header($title) {
    // Get the amount of items in the shopping cart, this will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(!isset($_SESSION['ID'])){
echo <<<EOT

<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="layoutt.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://kit.fontawesome.com/e92e19955e.js" crossorigin="anonymous"></script>
    </head>
	<body>
        <header>
            <div class="content-wrapper">
            <a href="index.php" class="lg"><img src="./imgs/logo.svg"  alt="Green Stuff Logo" width="225" height="90"></a>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=aboutus">About Us</a>
                    <a href="index.php?page=products">All Products</a>
                    <a href="index.php?page=storelocations">Store Locations</a>
                    <a href="index.php?page=Contact">Contact</a>
                    <a href="index.php?page=Sign Up" hidden></a>
                    <a href="index.php?page=Sucessfull" hidden></a>
                    <a href="index.php?page=logoutpage" hidden></a>
                </nav>             
                    <div class="link-icons">
                        <a href="index.php?page=Login">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    </div>
            </div>
        </header>
        <main>

EOT;
}
if(isset($_SESSION['ID']) && $_SESSION['ID']==1){
    echo <<<EOT

<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="layoutt.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://kit.fontawesome.com/e92e19955e.js" crossorigin="anonymous"></script>
    </head>
	<body>
        <header>
            <div class="content-wrapper">
            <a href="index.php" class="lg"><img src="./imgs/logo.svg"  alt="Green Stuff Logo" width="225" height="90"></a>
               <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=aboutus">About Us</a>
                    <a href="index.php?page=products">All Products</a>
                    <a href="index.php?page=storelocations">Store Locations</a>
                    <a href="index.php?page=Contact">Contact</a>
                    <a href="index.php?page=EditProduct">Edit Product</a>
                    <a href="index.php?page=Sucessfull" hidden></a>
                    <a href="index.php?page=changeproduct" hidden></a>
                    <a href="index.php?page=changecustomer" hidden></a>
                    <a href="index.php?page=editcustomer">Edit Customer</a>
                    <a href="index.php?page=logoutpage" hidden></a>
                    
                </nav>
               
                    <div class="link-icons">
                        <a href="index.php?page=addadmin">
                        <i class="fa-solid fa-user-plus"></i>
                        </a>
                        <a href="index.php?page=logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                        <a href="index.php?page=cart">                      
                            <i class="fas fa-shopping-cart"></i>
                            <span>$num_items_in_cart</span>
                        </a>
                    </div>
            </div>
        </header>
        <main>

EOT;
}
if(isset($_SESSION['ID']) && $_SESSION['ID']==2){
    echo <<<EOT

<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="layoutt.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://kit.fontawesome.com/e92e19955e.js" crossorigin="anonymous"></script>
    </head>
	<body>
        <header>
            <div class="content-wrapper">
            <a href="index.php" class="lg"><img src="./imgs/logo.svg"  alt="Green Stuff Logo" width="225" height="90"></a>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=aboutus">About Us</a>
                    <a href="index.php?page=products">All Products</a>
                    <a href="index.php?page=storelocations">Store Locations</a>
                    <a href="index.php?page=Contact">Contact</a>
                    <a href="index.php?page=Sucessfull" hidden></a>
                    <a href="index.php?page=logoutpage" hidden></a>
                    
                </nav>
               
                    <div class="link-icons">
                        <a href="index.php?page=logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                        <a href="index.php?page=cart">                      
                            <i class="fas fa-shopping-cart"></i>
                            <span>$num_items_in_cart</span>
                        </a>
                    </div>
            </div>
        </header>
        <main>

EOT;
}
}

function h_footer() {
$year = date('Y');
if(!isset($_SESSION['ID'])){
echo <<<EOT
        </main>

<footer>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="footer">
  <div class="fd">
  <div class="list">
    <h5>GREEN STUFF</h5>
    <br>
    <ul>
      <li><a href="index.php">Home</a></li>  
      <li><a href="index.php?page=aboutus">About Us</a></li>
      <li><a href="index.php?page=storelocations">Store Locations</a></li>
      <li><a href="index.php?page=Contact">Contact</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PRODUCTS</h5>
    <br>
    <ul>
      <li><a href="index.php?page=product&id=9">Red Wreath</a></li>
      <li><a href="index.php?page=product&id=8">Pen Holder</a></li>
      <li><a href="index.php?page=product&id=7">Light Bulb Vase</a></li>
      <li><a href="index.php?page=product&id=6">Candle Holder</a></li>
      <li><a href="index.php?page=product&id=5">Paper Mache Lamp</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PROFILE</h5>
    <br>
    <ul>
      <li><a href="index.php?page=Login">Sign In</a></li>
      <li><a href="index.php?page=Sign%20Up">Sign Up</a></li>
    </ul>
  </div>

  
  <div class="list smedia">
    <h5>SOCIAL MEDIA</h5>
    <br>
    <ul>
      <li><img src="./imgs/fb.png" width="32" style="width: 32px;"></li>
      <li><img src="./imgs/insta.png" width="32" style="width: 32px;"></li>
    </ul>
  </div>
  <div class="cf"></div>

  <p style="color:rgb(245, 243, 243);">&nbsp&nbspCopyright &copy; $year Green Stuff. All rights reserved.</p>

</div>
</div>
</footer>







    </body>
</html>
EOT;
}
if(isset($_SESSION['ID']) && $_SESSION['ID']==1){
    echo <<<EOT
        </main>

<footer>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="footer">
  <div class="fd">
  <div class="list">
    <h5>GREEN STUFF</h5>
    <br>
    <ul>
      <li><a href="index.php">Home</a></li>  
      <li><a href="index.php?page=aboutus">About Us</a></li>
      <li><a href="index.php?page=storelocations">Store Locations</a></li>
      <li><a href="index.php?page=Contact">Contact</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PRODUCTS</h5>
    <br>
    <ul>
      <li><a href="index.php?page=product&id=9">Red Wreath</a></li>
      <li><a href="index.php?page=product&id=8">Pen Holder</a></li>
      <li><a href="index.php?page=product&id=7">Light Bulb Vase</a></li>
      <li><a href="index.php?page=product&id=6">Candle Holder</a></li>
      <li><a href="index.php?page=product&id=5">Paper Mache Lamp</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PROFILE</h5>
    <br>
    <ul>
      <li><a href="index.php?page=cart">View Cart</a></li>
      <li><a href="index.php?page=editcustomer">Edit Customer</a></li>
      <li><a href="index.php?page=EditProduct">Edit Product</a></li>
      <li><a href="index.php?page=addadmin">Add Admin</a></li>
    </ul>
  </div>

  
  <div class="list smedia">
    <h5>SOCIAL MEDIA</h5>
    <br>
    <ul>
      <li><img src="./imgs/fb.png" width="32" style="width: 32px;"></li>
      <li><img src="./imgs/insta.png" width="32" style="width: 32px;"></li>
    </ul>
  </div>
  <div class="cf"></div>

  <p style="color:rgb(245, 243, 243);">&nbsp&nbspCopyright &copy; $year Green Stuff. All rights reserved.</p>

</div>
</div>
</footer>







    </body>
</html>
EOT;

}
if(isset($_SESSION['ID']) && $_SESSION['ID']==2){
    echo <<<EOT
        </main>

<footer>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="footer">
  <div class="fd">
  <div class="list">
    <h5>GREEN STUFF</h5>
    <br>
    <ul>
      <li><a href="index.php">Home</a></li>  
      <li><a href="index.php?page=aboutus">About Us</a></li>
      <li><a href="index.php?page=storelocations">Store Locations</a></li>
      <li><a href="index.php?page=Contact">Contact</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PRODUCTS</h5>
    <br>
    <ul>
      <li><a href="index.php?page=product&id=9">Red Wreath</a></li>
      <li><a href="index.php?page=product&id=8">Pen Holder</a></li>
      <li><a href="index.php?page=product&id=7">Light Bulb Vase</a></li>
      <li><a href="index.php?page=product&id=6">Candle Holder</a></li>
      <li><a href="index.php?page=product&id=5">Paper Mache Lamp</a></li>
    </ul>
  </div>
  <div class="list">
    <h5>PROFILE</h5>
    <br>
    <ul>
      <li><a href="index.php?page=cart">View Cart</a></li>
    </ul>
  </div>

  
  <div class="list smedia">
    <h5>SOCIAL MEDIA</h5>
    <br>
    <ul>
      <li><img src="./imgs/fb.png" width="32" style="width: 32px;"></li>
      <li><img src="./imgs/insta.png" width="32" style="width: 32px;"></li>
    </ul>
  </div>
  <div class="cf"></div>

  <p style="color:rgb(245, 243, 243);">&nbsp&nbspCopyright &copy; $year Green Stuff. All rights reserved.</p>

</div>
</div>
</footer>







    </body>
</html>
EOT;
}
}

?>