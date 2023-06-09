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

<section class="container_intro">
    <div class="container_intro_text">
        <h1 class="container_intro_text_title">SHOE THE RIGHT ONE</h1>
        <button class= "container_intro_text_btn">see our store</button>
    </div>
    
    <div class="container_title_image">
        <img src="./Assets/img/shoe_one.png" alt="">
    </div>
</section>

<section class="container_catalog">
<?php foreach ($items as $item): ?>
    <div class="Catalog_element>
        <h3><?php echo $item['product']; ?></h3>
        <p>Price: $<?php echo $item['price']; ?></p>
        <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product']; ?>" width="200" height="200">
        <form method="post" action="">
            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
<?php endforeach; ?>
</section>

<section class="container_details">
<img class="object-center" src="./Assets/img/shoe_two.png" alt="">
<h2>WE PROVIDE YOU THE BEST QUALITY</h2>
<p class= "desciption_details">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, sequi magni explicabo reiciendis praesentium tempore accusantium rerum laudantium, nobis voluptatum laborum consectetur.</p>
</section>

<section class="container_testimonials">
    <div class="container_testimonials_emily">
        <img class="emily_img" src="./Assets/img/image-emily.jpg"alt="">
        <span> Emily from XYZ</span>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
        <div class="container_testimonials_thomas">
        <img class="thomas_img" src="./Assets/img/image-thomas.jpg"alt="">
        <span> Thomas from corporate</span>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
<div class="container_testimonials_jennie">
        <img class="jennie_img" src="./Assets/img/image-jennie.jpg"alt="">
        <span> Jennie from Nike</span>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
        
</section>


<?php
    include 'views/partials/footer.php';
?>
</body>

</html>