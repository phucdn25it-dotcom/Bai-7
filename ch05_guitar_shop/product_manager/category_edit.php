<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Category</h1>

    <form action="." method="post" id="edit_category_form">
        <input type="hidden" name="action" value="update_category">
        <input type="hidden" name="category_id"
               value="<?php echo $category['categoryID']; ?>">

        <label>Name:</label>
        <input type="text" name="category_name"
               value="<?php echo htmlspecialchars($category['categoryName']); ?>">
        <input type="submit" value="Save Changes">
    </form>

    <p class="last_paragraph">
        <a href=".?action=list_categories">Cancel</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>
