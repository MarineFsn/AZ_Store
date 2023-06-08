<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZ_Store</title>
</head>

<body>
<?php
include 'views/partials/header.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data and display the thank you message
    // Empty the shopping cart
    file_put_contents('chart.json', '[]'); // Empty the cart by overwriting it with an empty array
    echo '<h1>Thank you for your order!</h1>';
    include 'views/partials/footer.php';
    exit; // Stop executing the rest of the page
}
?>

<!-- Your HTML code for the checkout page -->

<h1>Checkout</h1>

<form method="post" action="">
    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
    </div>
    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
    </div>
    <div>
        <label for="zip_code">Zip Code:</label>
        <input type="number" id="zip_code" name="zip_code" required>
    </div>
    <div>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>
    </div>
    <button type="submit">Place Order</button>
</form>

<!-- Your HTML code continues -->

<?php
include 'views/partials/footer.php';
?>
</body>

</html>