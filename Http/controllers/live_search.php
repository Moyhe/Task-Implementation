<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$search = $_REQUEST['search'];

$results = $db->query('select name from users where name LIKE :name ', [
    'name' => '%' . $search . '%',
])->get();


?>

<div class="max-w-7xl py-6">
    <ul>
        <?php foreach ($results as $result) : ?>
            <li class="border border-violet-300 px-2 py-2 mb-2">
                <?= htmlspecialchars($result['name']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

</div>