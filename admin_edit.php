<?php
require_once 'model/database.php';
require 'model/common.php';
include 'header.php';

// Get the review ID
if (isset($_GET['review_id'])) {
  $review_id = $_GET['review_id'];
} else {
  $review_id = 0;
}

// Get the review data from the database
$review = get_review($review_id);

// If the form is submitted
if (!empty($_POST) && isset($_POST)) {

  $product_id = filter_input(INPUT_POST, 'product-id', FILTER_VALIDATE_INT);
  $name = filter_input(INPUT_POST, 'review-name');
  $email = filter_input(INPUT_POST, 'review-email');
  $text = filter_input(INPUT_POST, 'review-text');

  edit_review($review_id, $product_id, $name, $email, $text);
  header("Refresh: 0"); // Easy form reset
  header("Location: admin.php");
}

?>

<div class="review-form">
  <h2>Edit product review</h2>
  <form method="POST" name="review-form">
    <p>
    <label for="product-id">Product ID:</label>
      <input type="text" id="product-id" name="product-id" value="<?php echo $review['product_id']; ?>">
    </p>
    <p>
      <label for="review-name">Name:</label>
      <input type="text" id="review-name" name="review-name" value="<?php echo $review['name']; ?>">
    </p>
    <p>
      <label for="review-email">Email:</label>
      <input type="email" id="review-email" name="review-email" value="<?php echo $review['email']; ?>">
    </p>
    <p>
      <label for="review-text">Edit the review:</label><br>
      <textarea id="review-text" name="review-text" rows="8" cols="70"><?php echo trim($review['text']); ?></textarea>
    </p>
    <input type="submit" value="Save">
    <input type="reset" value="Reset">
  </form>
</div>

<?php include 'footer.php'; ?>