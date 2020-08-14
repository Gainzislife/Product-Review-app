<?php include 'header.php'; ?>
<section>
  <h1>Welcome to Yuppie</h1>
  <p>We have a great selection of products and we're constantly adding more to give you the best selection possible!</p>

  <?php foreach($products as $product) : ?>
    <h2><?php echo html_escape($product['name']); ?></h2>
    <p><?php echo html_escape($product['description']); ?></p>
    <div class="view-product">
      <a href="product.php?product_id=<?php echo $product['id']; ?>">View product</a>
    </div>
  <?php endforeach; ?>

</section>

<?php include 'footer.php'; ?>