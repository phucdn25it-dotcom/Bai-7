<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>

    <form action="." method="post" id="edit_product_form">
        <input type="hidden" name="action" value="update_product">
        <input type="hidden" name="product_id"
               value="<?php echo $product['productID']; ?>">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>"
                <?php if ($category['categoryID'] == $product['categoryID']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Code:</label>
        <input type="text" name="code"
               value="<?php echo htmlspecialchars($product['productCode']); ?>">
        <br>

        <label>Name:</label>
        <input type="text" name="name"
               value="<?php echo htmlspecialchars($product['productName']); ?>">
        <br>

        <label>List Price:</label>
        <input type="text" name="price"
               value="<?php echo htmlspecialchars($product['listPrice']); ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>

    <p class="last_paragraph">
        <a href=".?category_id=<?php echo $product['categoryID']; ?>">Cancel</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>
