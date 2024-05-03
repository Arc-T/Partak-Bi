<?php

namespace App\Http\Utilities;

use PDO;
use Exception;

class DatabaseUtility{


public static function checkDatabaseConnection($params): bool{

    $url = "mysql:host={$params['host']};port={$params['port']};dbname={$params['database']};charset=utf8mb4";

    $options = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        // PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
    ];

    try {

        $pdo = new PDO($url, $params['username'], $params['password'], $options);

        return true;

    } catch (Exception $e) {

        return false;
    }
}

}
