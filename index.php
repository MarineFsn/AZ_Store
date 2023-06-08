<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet" type="text/css">
    <title>AZ_Store</title>
</head>

<body>
<?php
    include 'products.php';
?>

<?php
include 'views/partials/header.php';

// Function to add the product to the cart
function addToCart($product)
{
    // Retrieve the current cart data from the JSON file
    $cartData = file_get_contents('chart.json');
    $cart = json_decode($cartData, true);

    // Add the product to the cart
    $cart[] = $product;

    // Save the updated cart data to the JSON file
    file_put_contents('chart.json', json_encode($cart));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the product details from the submitted form
    $productId = $_POST['product_id'];
    $selectedProduct = null;

    // Find the selected product by its ID
    foreach ($items as $item) {
        if ($item['id'] == $productId) {
            $selectedProduct = $item;
            break;
        }
    }

    // Add the product to the cart
    if ($selectedProduct) {
        $productToAdd = [
            'id' => $selectedProduct['id'],
            'product' => $selectedProduct['product'],
            'price' => $selectedProduct['price'],
            'image_url' => $selectedProduct['image_url']
        ];
        addToCart($productToAdd);
    }
}
?>

<?php foreach ($items as $item): ?>
    <div>
        <h3><?php echo $item['product']; ?></h3>
        <p>Price: $<?php echo $item['price']; ?></p>
        <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product']; ?>" width="200" height="200">
        <form method="post" action="">
            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
<?php endforeach; ?>

<?php
    include 'views/partials/footer.php';
?>
</body>

</html>