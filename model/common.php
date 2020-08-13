<?php
require_once 'database.php';

function html_escape($html) {
    return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
}

function get_products() {
    global $db;
    $query = 'SELECT * FROM products';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT *
              FROM products
              WHERE id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function count_reviews_for_product($product_id) {
    global $db;
    $query = "SELECT COUNT(*)
              FROM reviews
              WHERE id = :product_id";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetchColumn();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
  }