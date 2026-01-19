<?php
include 'php/validation.php';
require_once 'vendor/autoload.php';
$validator = new CheckoutValidation();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalCode = $_POST['PostalCode'];
    $phone = $_POST['phone'];
    $paymentType = $_POST['paymentType'];
    $validator->validateNameSurname($name, $surname);
    $validator->validateAddress($address);
    $validator->validateCity($city);
    $validator->validatePhoneNumber($phone);
    $validator->validatePostalCode($postalCode);


    if (empty($validator->getEmailErr()) && empty($validator->getNameErr()) && empty($validator->getAddressErr()) && empty($validator->getCityErr()) && empty($validator->getPCodeErr()) && empty($validator->getPhoneErr())) {
        if ($paymentType === 'Stripe') {

            \Stripe\Stripe::setApiKey('sk_test_51PL9rsP3T9Vo3uW19tdhUPNsfEwv678WIhQHzsXc7qHwwt6tOdJ2YWt1A3ZhwDf4BfCXQM9W4bFK1QytG1950l1C00WmIZKFId'); // Set your Stripe secret key

            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Your Product Name',
                            ],
                            'unit_amount' => 2000,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => 'https://localhost/success.php',
                'cancel_url' => 'https://yourdomain.com/cancel.php',
            ]);


            header("Location: " . $checkout_session->url);
            exit;
        } else {

            $validator->setOrder("Checkout completed. Payment Type: $paymentType");

            $to = "adealluhani@gmail.com";
            $subject = "New Order Received";
            $body = "Name: $name\nSurname: $surname\nEmail: $email\nAddress: $address\nCity: $city\nPostal Code: $postalCode\nPhone: $phone\nPayment Type: $paymentType";


            if (!mail($to, $subject, $body)) {
                throw new Exception("Error: Unable to send email. Please try again later.");
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkout.css">
    <title>Document</title>
</head>

<body>
    <div id="big" style=" z-index: 6000; display: block">
        <div class="form-popup" id="myForm" style="border-radius: 15px;">
            <form method="POST" class="form-container">
                <h4>Contact information</h4>
                <input type="email" id="checkout-email" placeholder="Email" name="email">
                <span style="color:red"><?php echo $validator->getEmailErr(); ?></span>
                <h4>Shipping address</h4>
                <div style="display: flex;">
                    <input type="text" id="checkout-name" placeholder="Name" name="name">
                    <input type="text" id="checkout-surname" placeholder="Surname" name="surname">
                </div>
                <span style="color:red;"><?php echo $validator->getNameErr(); ?></span>
                <input type="text" id="adress" placeholder="Adress" name="address">
                <span style="color:red"><?php echo $validator->getAddressErr(); ?></span>
                <input type="text" id="pcode" placeholder="Postal Code" name="PostalCode">
                <span style="color:red"><?php echo $validator->getPCodeErr() ?></span>
                <input type="text" id="_city" placeholder="City" name="city">
                <span style="color:red"><?php echo $validator->getCityErr(); ?></span>
                <br>
                <select id="paymentType" name="paymentType" onchange="change_placeholder(this)">
                    <option value="">Select Payment Type</option>
                    <option value="Stripe">Stripe</option>
                    <option value="Cash">Cash on Delivery</option>
                </select>

                <select id="mySelect" onchange="change_placeholder(this)">
                    <option value="">Select your country...</option>
                    <option value="Albania">Albania</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="North Macedonia">North Macedonia</option>
                    <option value="Serbia">Serbia</option>
                </select>
                <input type="tel" id="phone" name="phone" placeholder="Phone number" style="margin-top: 10px;">
                <span style="color:red"><?php echo $validator->getPhoneErr(); ?></span>
                <br>
                <div>
                    <input type="checkbox" value="" id="save-info">
                    <label for="save-info" style="color:#201c1c">Save this information for next time</label>
                </div>
                </br>
                <button type="submit" name="submit" class="btn">Submit</button>
                <a href="./index.php"> <button type="button" class="btn cancel">Close</button></a>
                <span style="color:green"><?php echo $validator->getOrder(); ?></span>
            </form>
        </div>
    </div>
    <script src="checkout.js"></script>
</body>

</html>