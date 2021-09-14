<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Rental extends Database {

    public static function all() {
        $rentals = self::query("SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price FROM film AS f 
            LEFT JOIN inventory AS i ON f.film_id = i.film_id
            LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id");
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