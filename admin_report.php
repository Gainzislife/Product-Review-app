<?php
require_once 'model/database.php';
require 'model/common.php';
include 'header.php';

$reviews = get_reviews();
$products = get_products();

$total_rating = 0;
$total_reviews = 0;

foreach ($reviews as $review) {
  $total_rating += $review['rating'];
  $total_reviews++;
}

$avg_rating = ceil($total_rating / $total_reviews);

$total_products = 0;

foreach ($products as $product) {
  $total_products++;
}

?>

<h2>Report</h2>

<table class="report-table">
  <th>Category</th>
  <th>Value</th>
  <tr>
    <td>
      Total reviews:
    </td>
    <td>
      <?php echo $total_reviews; ?>
    </td>
  </tr>
  <tr>
    <td>
      Average Rating:
    </td>
    <td>
      <?php echo $avg_rating; ?>
    </td>
  </tr>
  <tr>
    <td>
      Total products:
    </td>
    <td>
      <?php echo $total_products; ?>
    </td>
  </tr>
</table>

<?php include 'footer.php'; ?>