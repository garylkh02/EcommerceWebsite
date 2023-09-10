<script> 
    function StopEmptyForm() {
        var x = document.getElementById("uploadFile").value;
            if(x == "" || x == null){
                alert("Please select a photo");
                return false;
            }
        var x = document.getElementById("itemName").value;
            if (x == "" || x == null) {
                alert("Item name must be filled out");
                return false;
            }
        var x = document.getElementById("price").value;
            if (x == "" || x == null) {
                alert("Price must be filled out");
                return false;
            }
        var x = document.getElementById("originalPrice").value;
            if (x == "" || x == null) {
                alert("Original Price must be filled out");
                return false;
            }
            var x = document.getElementById("itemQuantity").value;
            if (x == "" || x == null) {
                alert("Item Quantity must be filled out");
                return false;
            }
        var x = document.getElementById("description").value;
            if (x == "" || x == null) {
                alert("Description must be filled out");
                return false;
            }
            
    }
</script>
<?php
include 'logtimeout.php';
require 'DatabaseAccess.php';
try{
    $pdo= new PDO($attr,$user,$pass,$opts);
}
catch(\PDOException $e){
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}


if (isset($_POST['itemName'])){
$valid = valid($_POST['itemName'], "/^[A-Za-z0-9 ]+$/");
$valid .= valid($_POST['price'], "/^[1-9]{1}[0-9]{0,}.[0-9]{2}$/");
$valid .= valid($_POST['originalPrice'], "/^[0-9]{1,}.[0-9]{2}$/");
$valid .= valid($_POST['itemQuantity'], "/^[0-9]+$/");
    if ($valid ==""){
        $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'imgs';
        $targetFilename = $uploadDir . DIRECTORY_SEPARATOR . $_FILES['uploadFile']['name'];
        $uploadInfo = $_FILES['uploadFile']; 
        $img_name = $_FILES['uploadFile']['name'];
    switch ($uploadInfo['error']) { 
        case UPLOAD_ERR_OK:
            mime_content_type($uploadInfo['tmp_name']);
            move_uploaded_file($uploadInfo['tmp_name'], $targetFilename);       
        case UPLOAD_ERR_NO_FILE:      
            echo 'No file was uploaded.';      
            break;
        default: 
            echo sprintf('Failed to upload [%s]: error code [%d].', $uploadInfo['name'], $uploadInfo['error']);    
            break; 
        }
        $stmt = $pdo->prepare('INSERT INTO `products` (`id`,`name`,`desc`,`price`,`rrp`,`qty`,`img`)VALUES(NULL,?,?,?,?,?,?)'); 
        $stmt-> execute(array($_POST['itemName'],$_POST['description'],$_POST['price'],$_POST['originalPrice'],$_POST['itemQuantity'],$img_name));         
        echo '<script type="text/javascript">',
        'alert("You have sucessfully added the product.");
        window.location.replace("index.php?page=EditProduct"); ',
        '</script>';
    }
}







function sanitise($pdo,$str){
    $str = htmlentities($str);
    return $pdo->quote($str);
}
function datavalid($data,$data_pattern,$errormessage){
    if(preg_match($data_pattern, $data)){
        return "";
    }
    else{
        return $errormessage;
    }
}
function valid($data,$data_pattern){
    if(!preg_match($data_pattern, $data)){
        return 1;
    }

}


?>

<?=h_header('AddProduct')?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS.css">
</head>

<div class="recentlyadded content-wrapper">
    <h2>Add Product</h2>
</div>
 
<div class="product content-wrapper" style="padding-top:10px">
    <img src="imgs/<?=$product['img']?>" width="500" height="545" alt="Your Photo will appear here.">
    <div>
        <table width="410px" border="0" cellpadding="0" cellspacing="5">
            <form method="post" enctype="multipart/form-data" name="Product" onsubmit="return StopEmptyForm()">
                <tr>
                    <td colpsan="3"><h2>Photo:</h2><td>
                </tr>
                <tr>
                    <td colspan="3"><input type="file" id="uploadFile" name="uploadFile"></td>
                </tr>
                <tr>
                    <td colspan="3"><h2>Item Name:</h2></td>
                </tr>
                <tr>
                    <td colspan="3"><input class ="name" name="itemName" id="itemName" style="font-size:34px;color:#394352;" value="<?php if(isset($_POST['itemName'])){echo $_POST['itemName'];}?>"></td>
                </tr>
                <tr>
                    <td colspan="3" style="color:red;font-size:12px">
                                <?php 
                                    if(isset($_POST['itemName'])){ 
                                    $validation = datavalid($_POST['itemName'], "/^[A-Za-z0-9 ]+$/" , "*Contain letters and numbers only"); 
                                    if($validation != ""){
                                    echo $validation;
                                   }
                                   else{
                                    echo "<br>";
                                   }
                                }else{
                                    echo "<br>";
                                }
                                ?>
                    </td>
                </tr>
                
                <tr style="text-align:left;">
                    <th><h2>Price:</h2></th>
                    <th><h2>Original Price:</h2></th>
                    <th><h2>Quantity:</h2></th>
                </tr>
                <tr>
                    <td><input class="price" name="price" id="price" style="width:129px;color:#394352;"value="<?php if(isset($_POST['price'])){echo $_POST['price'];}?>"></td>
                    <td><input style="width:129px;color:#394352;" name="originalPrice" id="originalPrice"class="rrp" value="<?php if(isset($_POST['originalPrice'])){echo $_POST['originalPrice'];}?>"></td>
                    <td><input style="width:129px;color:#394352;" name="itemQuantity" id="itemQuantity" class="price" value="<?php if(isset($_POST['itemQuantity'])){echo $_POST['itemQuantity'];}?>"></td>
                </tr>
                <tr>
                    <td style="color:red;font-size:12px">
                    <?php 
                        if(isset($_POST['price'])){ 
                            $validation = datavalid($_POST['price'], "/^[1-9]{1}[0-9]{0,}.[0-9]{2}$/" , "*Invalid Data Ex.:19.90"); 
                            if($validation != ""){
                                echo $validation;
                            }
                            else{
                                echo "<br>";
                            }
                        }else{
                            echo "<br>";
                        }
                    ?>
                    </td>
                    <td style="color:red;font-size:12px">
                    <?php 
                        if(isset($_POST['originalPrice'])){ 
                            $validation = datavalid($_POST['originalPrice'], "/^[0-9]{1,}.[0-9]{2}$/" , "*Invalid Data Ex.:19.90"); 
                            if($validation != ""){
                                echo $validation;
                            }
                            else{
                                echo "<br>";
                            }
                        }
                        else{
                            echo "<br>";
                        }
                    ?>
                    </td>
                    <td style="color:red;font-size:12px">
                    <?php 
                        if(isset($_POST['itemQuantity'])){ 
                            $validation = datavalid($_POST['itemQuantity'], "/^[0-9]+$/" , "*Whole Numbers only e.g:10"); 
                            if($validation != ""){
                                echo $validation;
                            }
                            else{
                                echo "<br>";
                            }
                        }
                        else{
                            echo "<br>";
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><h2>Description:</h2>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea class="description" name="description" id="description"style="width:400px;height:212px;resize:none" >
                        <?php if(isset($_POST['description'])){echo $_POST['description'];}?>    
                        </textarea>
                    </td>     
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right" ><input type="submit" class="addtocart" style="width:130px;"value="Upload"> </td>      
                </tr>    
            </form>
        </table>
    </div>
</div>
<?=h_footer()?>