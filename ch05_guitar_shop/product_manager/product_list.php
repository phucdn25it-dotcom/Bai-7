<?php include '../view/header.php'; ?>
<main>
    <h1>Product List</h1>

    <aside>
        <h2>Categories</h2>
        <?php include '../view/categories_nav.php'; ?>
    </aside>

    <section>
        <h2><?php echo htmlspecialchars($category_name); ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo htmlspecialchars($product['productCode']); ?></td>
                <td><?php echo htmlspecialchars($product['productName']); ?></td>
                <td class="right"><?php echo number_format($product['listPrice'], 2); ?></td>
                <td>
                    <a href="?action=show_edit_product&amp;product_id=<?php echo $product['productID']; ?>">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_product">
                        <input type="hidden" name="product_id"
                               value="<?php echo $product['productID']; ?>">
                        <input type="hidden" name="category_id"
                               value="<?php echo $product['categoryID']; ?>">
                        <input type="submit" value="Delete"
                               onclick="return confirm('Delete this product?');">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="?action=show_add_form">Add Product</a></p>
        <p class="last_paragraph">
            <a href="?action=list_categories">List Categories</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
