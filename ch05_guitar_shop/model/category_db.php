<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category($category_id) {
    global $db;
    $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

function get_category_name($category_id) {
    $category = get_category($category_id);
    return $category ? $category['categoryName'] : '';
}

function add_category($category_name) {
    global $db;
    $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

function update_category($category_id, $category_name) {
    global $db;
    $query = 'UPDATE categories SET categoryName = :category_name
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function get_product_count_by_category($category_id) {
    global $db;
    $query = 'SELECT COUNT(*) FROM products WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $statement->execute();
    $count = $statement->fetchColumn();
    $statement->closeCursor();
    return (int) $count;
}
?>
