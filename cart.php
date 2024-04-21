<?php
// Fillimi i sesionit
session_start();

// Nëse nuk ka një shportë blerjesh, krijoni një array të ri për të
if (!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}

// Shtimi i një artikulli në shportën blerjesh
function add_to_cart($product_id, $product_name, $price, $quantity) {
    if (!isset($_SESSION['shopping_cart'][$product_id])) {
        $_SESSION['shopping_cart'][$product_id] = array(
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity
        );
    } else {
        // Nëse artikulli është tashmë në shportë, rriteni sasinë
        $_SESSION['shopping_cart'][$product_id]['quantity'] += $quantity;
    }
}

// Testimi i funksionit shto në shportë
add_to_cart(1, 'Libër', 20, 2); // Shto 2 libra në shportë
add_to_cart(2, 'Pilot', 5, 1);   // Shto 1 pilot në shportë

// Fshirja e një artikulli nga shporta blerjesh
function remove_from_cart($product_id) {
    if (isset($_SESSION['shopping_cart'][$product_id])) {
        unset($_SESSION['shopping_cart'][$product_id]);
    }
}

// Testimi i funksionit largo nga shporta
remove_from_cart(1); // Hiq librin nga shporta
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        width: 60%;
        margin: auto;
        padding: 20px;
    }
    h1 {
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Shopping Cart</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($_SESSION['shopping_cart'] as $product_id => $product_info): ?>
        <tr>
            <td><?php echo $product_info['product_name']; ?></td>
            <td>$<?php echo $product_info['price']; ?></td>
            <td><?php echo $product_info['quantity']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>