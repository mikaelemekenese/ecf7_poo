<?php

require_once('./helpers/database.php');
require_once('CRUD.php');

class Film extends Database {

    public static function all() {
        $films = self::query('SELECT * FROM film');
        return $films->fetchAll();
    }
}