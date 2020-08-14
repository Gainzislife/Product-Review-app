<?php
require_once 'model/database.php';
require 'model/common.php';
include 'header.php';

$reviews = get_reviews();

?>

<h2>Admin page</h2>

<p><a href="admin_report.php">Report</a></p>

<table class="admin-table">
  <th>Metadata</th>
  <th>Review</th>
  <th>Options</th>
  <?php foreach ($reviews as $review) : ?>
    <tr>
      <td class="col-meta">
        <?php
        echo 'Review ID: ' . html_escape($review['id']) .
          '<br>Product ID: ' . html_escape($review['product_id']) .
          '<br>Name: ' . html_escape($review['name']) .
          '<br>Email: ' . html_escape($review['email']);
        ?>
      </td>
      <td class="col-body">
        <?php
        echo 'Rating: ' . html_escape($review['rating']) .
          '<br>Text:<br>' . html_escape($review['text']); ?>
      </td>
      <td class="col-edit">
        <a href="admin_edit.php?review_id=<?php echo html_escape($review['id']); ?>">Edit</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>