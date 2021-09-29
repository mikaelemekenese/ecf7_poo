<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Inventory extends Database {

    public static function findById(int $id) {
        $inventory = self::query("SELECT i.inventory_id, i.film_id, f.title AS 'title' FROM inventory AS i
            LEFT JOIN film AS f ON f.film_id = i.film_id WHERE i.film_id = $id");
        return $inventory->fetchAll();
    }
}