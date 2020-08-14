<?php
require_once 'database.php';

function html_escape($html)
{
    return htmlspecialchars($html, ENT_HTML5, 'UTF-8');
}

function get_products()
{
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

function get_product($product_id)
{
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

function get_reviews()
{
    global $db;
    $query = 'SELECT * FROM reviews';
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

function get_review($review_id)
{
    global $db;
    $query = 'SELECT *
              FROM reviews
              WHERE id = :review_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':review_id', $review_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_reviews_for_product($product_id)
{
    global $db;
    $query = 'SELECT *
              FROM reviews
              WHERE product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function count_reviews_for_product($product_id)
{
    global $db;
    $query = 'SELECT COUNT(*)
              FROM reviews
              WHERE product_id = :product_id';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetchColumn();
        $statement->closeCursor();
        return (int) $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_review($review_data)
{
    global $db;
    $query = 'INSERT INTO reviews
                 (product_id, rating, name, email, text)
              VALUES
                 (:product_id, :rating, :name, :email, :text)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $review_data['product_id']);
        $statement->bindValue(':rating', $review_data['rating']);
        $statement->bindValue(':name', $review_data['name']);
        $statement->bindValue(':email', $review_data['email']);
        $statement->bindValue(':text', $review_data['text']);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function edit_review($review_id, $product_id, $name, $email, $text)
{
    global $db;
    $query = 'UPDATE reviews
              SET product_id = :product_id,
                  name = :name,
                  email = :email,
                  text = :text
              WHERE id = :review_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':review_id', $review_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':text', $text);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
