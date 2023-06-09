<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<?php
include 'views/partials/header.php';

// Function to remove a product from the cart
function removeFromCart($productId)
{
    // Retrieve the current cart data from the JSON file
    $cartData = file_get_contents('chart.json');
    $cart = json_decode($cartData, true);

    // Find the product by its ID and remove it from the cart
    foreach ($cart as $index => $product) {
        if ($product['id'] == $productId) {
            unset($cart[$index]);
            break;
        }
    }

    // Reindex the cart array
    $cart = array_values($cart);

    // Save the updated cart data to the JSON file
    file_put_contents('chart.json', json_encode($cart));
}

// Check if the remove button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_product_id'])) {
    $productId = $_POST['remove_product_id'];
    removeFromCart($productId);
}

// Retrieve the cart data from the JSON file
$cartData = file_get_contents('chart.json');
$cart = json_decode($cartData, true);
?>

<!-- Your HTML code for the shopping cart page -->

<h1>Shopping Cart</h1>

<?php if (!empty($cart)): ?>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?php echo $item['product']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="remove_product_id" value="<?php echo $item['id']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button onclick="window.location.href='checkout.php'">Go to Checkout</button>

<?php else: ?>
    <p>Your shopping cart is empty.</p>
<?php endif; ?>

<!-- Your HTML code continues -->

<?php
include 'views/partials/footer.php';
?>
</body>
</html>