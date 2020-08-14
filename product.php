<?php
require_once 'model/database.php';
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

$review_count = count_reviews_for_product($product_id);

$product_reviews = get_reviews_for_product($product_id);

if ($_POST) {
    $submit_review = array(
        'product_id' => $product_id,
        'rating' => filter_input(INPUT_POST, 'review-rating', FILTER_VALIDATE_INT),
        'name' => filter_input(INPUT_POST, 'review-name'),
        'email' => filter_input(INPUT_POST, 'review-email'),
        'text' => filter_input(INPUT_POST, 'review-text'),
    );

    add_review($submit_review);
    header("Refresh: 0");
}
?>

<h1><?php echo $product_name; ?></h1>
<div id="left_column">
    <p><img src="https://via.placeholder.com/150" alt="Image of product" /></p>
</div>

<div id="right_column">
    <h2>Description</h2>
    <?php echo $description; ?>
</div>

<h3>
    <?php if ($review_count == 1) : ?>
        <?php echo $review_count; ?> review
    <?php else : ?>
        <?php echo $review_count; ?> reviews
    <?php endif; ?>
</h3>

<div class="reviews">
    <?php foreach ($product_reviews as $review) : ?>
        <hr>
        <div class="review">
            <div class="review-meta">
                <b><?php echo html_escape($review['name']) ?></b> - Rating: <?php echo html_escape($review['rating']); ?>
            </div>
            <div class="review-body">
                <?php echo html_escape($review['text']); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<hr>
<div class="review-form">
    <h2>Review this product</h2>
    <form method="POST" name="review-form">
        <p>
            <label for="review-name">Name:</label>
            <input type="text" id="review-name" name="review-name" value="">
        </p>
        <p>
            <label for="review-email">Email:</label>
            <input type="email" id="review-email" name="review-email" value="">
        </p>
        <p>
            <label for="review-rating">Rating:</label>
            <input type="radio" id="rating-1" name="review-rating" value="1">
            <label for="rating-1">1</label>
            <input type="radio" id="rating-2" name="review-rating" value="2">
            <label for="rating-2">2</label>
            <input type="radio" id="rating-3" name="review-rating" value="3">
            <label for="rating-3">3</label>
            <input type="radio" id="rating-4" name="review-rating" value="4">
            <label for="rating-4">4</label>
            <input type="radio" id="rating-5" name="review-rating" value="5">
            <label for="rating-5">5</label>
        </p>
        <p>
            <label for="review-text">Write a review:</label><br>
            <textarea id="review-text" name="review-text" rows="8" cols="70"></textarea>
        </p>
        <input type="submit" value="Submit review">
    </form>
</div>

<?php include 'footer.php'; ?>