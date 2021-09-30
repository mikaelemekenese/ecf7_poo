<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Rental extends Database {

    public static function all() {
        $rentals = self::query("SELECT r.rental_id AS 'id', cs.first_name AS 'name', cs.last_name AS 'last_name', cs.email AS 'email', a2.address AS 'address', f.title AS 'movie', r.rental_date AS 'rental_date', r.return_date AS 'return_date', s.first_name AS 'staff_firstname', s.last_name AS 'staff_lastname', ctr1.country AS 'store' FROM rental AS r
            LEFT JOIN customer AS cs ON r.customer_id = cs.customer_id
            LEFT JOIN inventory AS i ON r.inventory_id = i.inventory_id
            LEFT JOIN staff AS s ON r.staff_id = s.staff_id
            LEFT JOIN store AS st ON s.store_id = st.store_id
            LEFT JOIN address AS a1 ON s.address_id = a1.address_id
            LEFT JOIN address AS a2 ON cs.address_id = a2.address_id
            LEFT JOIN film AS f ON i.film_id = f.film_id
            LEFT JOIN city AS ct1 ON ct1.city_id = a1.city_id
            LEFT JOIN city AS ct2 ON ct2.city_id = a2.city_id
            LEFT JOIN country AS ctr1 ON ct1.country_id = ctr1.country_id
            LEFT JOIN country AS ctr2 ON ct2.country_id = ctr2.country_id
            WHERE r.return_date IS NULL
            ORDER BY r.rental_date DESC;");
        return $rentals->fetchAll();
    }

    public static function findById(int $id) {
        $rental = self::query("SELECT r.rental_id AS 'id', cs.first_name AS 'name', cs.last_name AS 'last_name', cs.email AS 'email', a2.address AS 'address', f.title AS 'movie', r.rental_date AS 'rental_date', r.return_date AS 'return_date', s.first_name AS 'staff_firstname', s.last_name AS 'staff_lastname', ctr1.country AS 'store', r.inventory_id AS 'inventory_id', r.customer_id AS 'customer_id', r.staff_id AS 'staff_id' FROM rental AS r
            LEFT JOIN customer AS cs ON r.customer_id = cs.customer_id
            LEFT JOIN inventory AS i ON r.inventory_id = i.inventory_id
            LEFT JOIN staff AS s ON r.staff_id = s.staff_id
            LEFT JOIN store AS st ON s.store_id = st.store_id
            LEFT JOIN address AS a1 ON s.address_id = a1.address_id
            LEFT JOIN address AS a2 ON cs.address_id = a2.address_id
            LEFT JOIN film AS f ON i.film_id = f.film_id
            LEFT JOIN city AS ct1 ON ct1.city_id = a1.city_id
            LEFT JOIN city AS ct2 ON ct2.city_id = a2.city_id
            LEFT JOIN country AS ctr1 ON ct1.country_id = ctr1.country_id
            LEFT JOIN country AS ctr2 ON ct2.country_id = ctr2.country_id
            WHERE r.return_date IS NULL AND r.rental_id = $id
            ORDER BY r.rental_date DESC");
        return $rental->fetch();
    }

    public static function create($params) {
        $rental = self::query("INSERT INTO rental (rental_date, inventory_id, customer_id, return_date, staff_id)
            VALUES (:rental_date, :inventory_id, :customer_id, :return_date, :staff_id)", $params);
        return $rental;
    }

    public static function update($id) {
        $rental = self::query("UPDATE rental SET return_date = :rental_date WHERE rental_id = $id");
        return $rental;
    }
}