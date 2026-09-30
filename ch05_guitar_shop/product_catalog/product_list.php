<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <?php include '../view/categories_nav.php'; ?>
    </aside>

    <section>
        <h1><?php echo htmlspecialchars($category_name); ?></h1>
        <nav>
            <ul>
                <?php foreach ($products as $product) : ?>
                <li>
                    <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>">
                        <?php echo htmlspecialchars($product['productName']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </section>
</main>
<?php include '../view/footer.php'; ?>
