<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$country = $_POST['country'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];


$errors = [];
if (Validator::isEmpty($first_name)) {
    $errors['frirst_name'] = 'Please provide a first name.';
}

if (Validator::isEmpty($last_name)) {
    $errors['last_name'] = 'Please provide a last name .';
}

if (Validator::isEmpty($country)) {
    $errors['country'] = 'Please provide a country.';
}

if (Validator::isEmpty($address)) {
    $errors['adress'] = 'Please provide an adress.';
}

if (Validator::isEmpty($phone_number)) {
    $errors['phone_number'] = 'Please provide a phone number.';
}

if (Validator::isEmpty($product_name)) {
    $errors['product_name'] = 'Please provide a product name.';
}

if (Validator::isEmpty($quantity)) {
    $errors['quantity'] = 'Please provide an quantity.';
}

if (Validator::isEmpty($price)) {
    $errors['price'] = 'Please provide a price.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$order = $db->query('select * from orders where product_name = :product_name', [
    'product_name' => $product_name
])->find();

if ($order) {

    header('location: /');
    exit();
} else {

    $order = $db->query('INSERT INTO orders(user_id, first_name, last_name, country, address, phone_number, product_name, quantity, price)
            VALUES(:user_id, :first_name, :last_name, :country, :address, :phone_number, :product_name, :quantity, :price)', [
        'user_id' => 5,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'country' => $country,
        'address' => $address,
        'phone_number' => $phone_number,
        'product_name' => $product_name,
        'quantity' => $quantity,
        'price' => $price,

    ]);

    header('location: /');
    exit();
}
