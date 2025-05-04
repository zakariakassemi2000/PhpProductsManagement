<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .add-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .no-products {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Products List</h1>
    <a href="ctrl.class.php?action=productForm" class="add-link">+ Add Product</a>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['num']; ?></td>
                        <td><?= htmlspecialchars($product['name']); ?></td>
                        <td><?= htmlspecialchars($product['description']); ?></td>
                        <td><?= date('M d, Y', strtotime($product['date'])); ?></td>
                        <td><?= htmlspecialchars($product['price']); ?> DH</td>
                        <td><?= $product['type'] == 'W' ? 'Weight' : 'Unit'; ?></td>
                        <td>
                            <a href="ctrl.class.php?action=deleteProduct&num=<?= $product['num']; ?>" onclick="return confirm('Delete this product?')">
                                <img src="images/delete.png" width="30">
                            </a>
                            <a href="ctrl.class.php?action=editProduct&num=<?= $product['num']; ?>" onclick="return confirm('Edit this product?')">
                                <img src="images/edit.png" width="30">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-products">No products found.</div>
    <?php endif; ?>
</body>
</html>
