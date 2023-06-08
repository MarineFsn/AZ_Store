<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <title>AZ_Store</title>
</head>

<body>
<?php
    include 'views/partials/header.php';
    include 'products.php';
?>

<?php foreach ($items as $item): ?>
    <div>
        <h3><?php echo $item['product']; ?></h3>
        <p>Price: $<?php echo $item['price']; ?></p>
        <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product']; ?>" width="200" height="200">
        <button class="add-to-cart-btn">Add to Cart</button>
        </div>
<?php endforeach; ?>

<?php
    include 'views/partials/footer.php';
?>
</body>

</html>