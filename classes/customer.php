<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Customer extends Database {

    public static function all() {
        $customers = self::query("SELECT c.customer_id AS id, c.first_name AS name, c.last_name AS last_name, c.email AS email, a.address AS address FROM customer AS c
        LEFT JOIN address AS a ON c.address_id = a.address_id
        LEFT JOIN city AS ct ON ct.city_id = a.city_id
        LEFT JOIN country AS ctr ON ctr.country_id = ct.country_id
        ORDER BY c.last_name;");
        return $customers->fetchAll();
    } 
}