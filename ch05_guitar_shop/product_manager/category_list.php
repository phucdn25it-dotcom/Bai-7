<?php include '../view/header.php'; ?>
<main>
    <h1>Category List</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo htmlspecialchars($category['categoryName']); ?></td>
            <td>
                <a href=".?action=show_edit_category&amp;category_id=<?php echo $category['categoryID']; ?>">
                    Edit
                </a>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete"
                           onclick="return confirm('Delete this category?');">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Category</h2>
    <form action="." method="post" id="add_category_form">
        <input type="hidden" name="action" value="add_category">
        <label>Name:</label>
        <input type="text" name="category_name" required>
        <input type="submit" value="Add">
    </form>

    <p class="last_paragraph">
        <a href=".">List Products</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>
