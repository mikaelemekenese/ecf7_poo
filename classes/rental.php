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
        $rental = self::query("SELECT f.film_id AS id, f.title AS title, f.release_year AS year, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, a.first_name AS actorFirstName, a.last_name AS actorLastName FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN film_actor AS fa ON fa.film_id = f.film_id 
            LEFT JOIN actor AS a ON a.actor_id = fa.actor_id
            WHERE f.film_id = $id");
        return $rental->fetch();
    }
}