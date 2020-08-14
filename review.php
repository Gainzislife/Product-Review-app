<?php
require_once 'model/database.php';
require 'model/common.php';
include 'header.php';

$products = get_products();

if ($_POST) {
  $submit_review = array(
      'product_id' => filter_input(INPUT_POST, 'review-product', FILTER_VALIDATE_INT),
      'rating' => filter_input(INPUT_POST, 'review-rating', FILTER_VALIDATE_INT),
      'name' => filter_input(INPUT_POST, 'review-name'),
      'email' => filter_input(INPUT_POST, 'review-email'),
      'text' => filter_input(INPUT_POST, 'review-text'),
  );

  add_review($submit_review);
  header("Refresh: 0");
  header("Location: .");
}
?>

<div class="review-form">
    <h2>Review a product</h2>
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
          <label for="product-list">Choose a product:</label>
          <select id="product-list" name="review-product">
            <?php foreach ($products as $product) : ?>
              <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
            <?php endforeach; ?>
          </select>
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
            <textarea type="text" id="review-text" name="review-text" rows="8" cols="70"></textarea>
        </p>
        <input type="submit" value="Submit review">
    </form>
</div>

<?php include 'footer.php'; ?>