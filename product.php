<?php
require 'model/common.php';
include 'header.php';

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

if ($_POST) {
    $review_data = array(
        'product_id' => $product_id,
        'rating' => $_POST['rating'],
        'name' => $_POST['review-name'],
        'email' => $_POST['review-email'],
        'text' => $_POST['review-text']
    );
}
?>

<h1><?php echo $product_name; ?></h1>
<div id="left_column">
    <p><img src="#" alt="Image of product" /></p>
</div>

<div id="right_column">
    <h2>Description</h2>
    <?php echo $description; ?>
</div>

<form method="POST">
    <p>
        <label for="review-name">Name:</label>
        <input type="text" id="review-name" name="review-name" value="<?php echo html_escape($review_data['name']); ?>">
    </p>
    <p>
        <label for="review-email">Website:</label>
        <input type="text" id="review-email" name="review-email" value="<?php echo html_escape($review_data['email']); ?>">
    </p>
    <p>
        <label for="review-rating">Rating:</label>
        <input type="radio" id="review-rating" name="review-rating" value="<?php echo html_escape($review_data['rating']); ?>">
    </p>
    <p>
        <label for="review-text">Write a review:</label>
        <textarea type="text" id="review-text" name="review-text" rows="8" cols="70">
      <?php echo html_escape($review_data['text']); ?>
    </textarea>
    </p>
    <input type="submit" value="Submit review">
</form>

<?php include 'footer.php'; ?>