<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$users = $db->query('SELECT users.name, users.created_at, max(orders.last_purchase) as last_purchase, count(*) as purchases
FROM users 
INNER JOIN orders ON users.id = orders.user_id
group by users.id
order by purchases desc, max(orders.last_purchase) desc')->get();


view('order/index.view.php', [
    'users' => $users
]);
