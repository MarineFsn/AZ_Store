<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="container_intro_text content-center">
        <h1 class="container_intro_text_title ml-16">SHOE THE<br> RIGHT <span class="blue_word">ONE</span>.</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-36 h-14 mt-2 ml-16">See our store</button>
    </div>
    
    <div class="container_intro_image">
        <img src="./Assets/img/shoe_one.png" alt="" class="container_intro_image_z0">
        <span class="container_intro_image_z1">NIKE</span>
    </div>
</section>
<h3 class="container_catalog_title ml-14"><span class="blue_word">Our</span> last products</h3>

<section class="container_catalog">

<?php foreach ($items as $item): ?>
    <div class="Catalog_element">
    <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['product']; ?>" width="200" height="200">
        <h3><?php echo $item['product']; ?></h3>
        <p>Price: $<?php echo $item['price']; ?></p>
        <form method="post" action="">
            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
        </form>
    </div>
<?php endforeach; ?>

</section>

<section class="container_details">
<img class="text-center w-80 m-auto" src="./Assets/img/shoe_two.png" alt="">
<h2 class="container_details_title">WE PROVIDE YOU <br>THE <span class="blue_word">BEST</span>QUALITY</h2>
<p class= "desciption_details text-center mt-6 w-2/4 m-auto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, sequi magni explicabo reiciendis praesentium tempore accusantium rerum laudantium, nobis voluptatum laborum consectetur.</p>
</section>

<section class="container_testimonials mt-10 mb-10">
    <div class="container_testimonials_card">
        <img class="container_testimonials_card_img" src="./Assets/img/image-emily.jpg"alt="">
        <span class="font-bold"> Emily from XYZ</span>
        <p class="w-3/5 m-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
        <div class="container_testimonials_card">
        <img class="container_testimonials_card_img" src="./Assets/img/image-thomas.jpg"alt="">
        <span class="font-bold"> Thomas from corporate</span>
        <p class="w-3/5 m-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
<div class="container_testimonials_card">
        <img class="container_testimonials_card_img" src="./Assets/img/image-jennie.jpg"alt="">
        <span class="font-bold"> Jennie from Nike</span>
        <p class="w-3/5 m-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nemo repudiandae explicabo hic nesciunt?</p>
</div>
        
</section>


<?php
    include 'views/partials/footer.php';
?>
</body>

</html>