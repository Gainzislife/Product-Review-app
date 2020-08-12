<?php
require '../model/product_db.php';

// Get the product ID
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
} else {
    $product_id = 0;
}

$product = get_product($product_id);
$product_name = $product['name'];
$description = $product['description'];

// TODO: images
//$image_alt = 'Image filename: ' . $image_filename;
?>

<h1><?php echo $product_name; ?></h1>
<div id="left_column">
    <p><img src="#" alt="Image of product" /></p>
</div>

<div id="right_column">
    <h2>Description</h2>
    <?php echo $description; ?>
</div>
