<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Store extends Database {

    public static function all() {
        $stores = self::query("SELECT DISTINCT s.store_id AS id, a.address AS address, c.city AS city, ctr.country AS country FROM store AS s
            LEFT JOIN address AS a ON s.address_id = a.address_id
            LEFT JOIN city AS c ON c.city_id = a.city_id
            LEFT JOIN country AS ctr ON c.country_id = ctr.country_id;");
        return $stores->fetchAll();
    }

    public static function findById($id) {
        $store = self::query("SELECT DISTINCT s.store_id AS id, a.address AS address, c.city AS city, ctr.country AS country FROM store AS s
            LEFT JOIN address AS a ON s.address_id = a.address_id
            LEFT JOIN city AS c ON c.city_id = a.city_id
            LEFT JOIN country AS ctr ON c.country_id = ctr.country_id
            WHERE s.store_id = $id;");
        return $store->fetch();
    }
}