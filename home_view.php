<?php
include 'view/header.php';
include 'view/sidebar.php';
?>
<section>
  <h1>Welcome to Yuppie</h1>
  <p>We have a great selection of products and we're constantly adding more to give you the best selection possible!</p>

  <?php foreach($result as $r) : ?>
    <p><?php echo $r['id']; ?></p>
  <?php endforeach; ?>

</section>

<?php include 'view/footer.php'; ?>