<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $categories = get_categories();
        $category_id = !empty($categories) ? $categories[0]['categoryID'] : 0;
    }

    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    include('product_list.php');

} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id or category id.';
        include('../errors/error.php');
    } else {
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
        exit();
    }

} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('product_add.php');

} else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = trim(filter_input(INPUT_POST, 'code'));
    $name = trim(filter_input(INPUT_POST, 'name'));
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    if ($category_id == NULL || $category_id == FALSE ||
            $code == '' || $name == '' || $price === NULL || $price === FALSE || $price < 0) {
        $error = 'Invalid product data. Check all fields and try again.';
        include('../errors/error.php');
    } else {
        add_product($category_id, $code, $name, $price);
        header("Location: .?category_id=$category_id");
        exit();
    }

} else if ($action == 'show_edit_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);

    if ($product_id == NULL || $product_id == FALSE) {
        $error = 'Missing or incorrect product id.';
        include('../errors/error.php');
    } else {
        $product = get_product($product_id);
        if ($product === false) {
            $error = 'Product not found.';
            include('../errors/error.php');
        } else {
            $categories = get_categories();
            include('product_edit.php');
        }
    }

} else if ($action == 'update_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $code = trim(filter_input(INPUT_POST, 'code'));
    $name = trim(filter_input(INPUT_POST, 'name'));
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    if ($product_id == NULL || $product_id == FALSE ||
            $category_id == NULL || $category_id == FALSE ||
            $code == '' || $name == '' || $price === NULL || $price === FALSE || $price < 0) {
        $error = 'Invalid product data. Check all fields and try again.';
        include('../errors/error.php');
    } else {
        update_product($product_id, $category_id, $code, $name, $price);
        header("Location: .?category_id=$category_id");
        exit();
    }

} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');

} else if ($action == 'add_category') {
    $category_name = trim(filter_input(INPUT_POST, 'category_name'));

    if ($category_name == '') {
        $error = 'Invalid category name. Check the name and try again.';
        include('../errors/error.php');
    } else {
        add_category($category_name);
        header('Location: .?action=list_categories');
        exit();
    }

} else if ($action == 'show_edit_category') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE) {
        $error = 'Missing or incorrect category id.';
        include('../errors/error.php');
    } else {
        $category = get_category($category_id);
        if ($category === false) {
            $error = 'Category not found.';
            include('../errors/error.php');
        } else {
            include('category_edit.php');
        }
    }

} else if ($action == 'update_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $category_name = trim(filter_input(INPUT_POST, 'category_name'));

    if ($category_id == NULL || $category_id == FALSE || $category_name == '') {
        $error = 'Invalid category data. Check the name and try again.';
        include('../errors/error.php');
    } else {
        update_category($category_id, $category_name);
        header('Location: .?action=list_categories');
        exit();
    }

} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

    if ($category_id == NULL || $category_id == FALSE) {
        $error = 'Missing or incorrect category id.';
        include('../errors/error.php');
    } else if (get_product_count_by_category($category_id) > 0) {
        $error = 'Cannot delete this category because it still contains products. Delete or move the products first.';
        include('../errors/error.php');
    } else {
        delete_category($category_id);
        header('Location: .?action=list_categories');
        exit();
    }
}
?>
