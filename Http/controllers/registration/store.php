<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = $db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

header('location:' . '/');
exit();
