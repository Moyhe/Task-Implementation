<?php

namespace Core;

use PDO;

class Database
{
    public $connection;

    public function __construct($config, $username = 'Mohye', $password = '123456789')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}
