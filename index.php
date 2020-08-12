<?php
require_once 'model/database.php';

$query = 'SELECT * FROM products';

try {  
  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $stmt->closeCursor();
} catch (PDOException $e) {
  $error_message = $e->getMessage();
  display_db_error($error_message);
}


include 'home_view.php';