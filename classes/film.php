<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Film extends Database {

    public static function all() {
        $films = self::query("SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, COUNT(r.rental_date) AS rent, COUNT(r.return_date) AS ret FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN inventory AS i ON f.film_id = i.film_id
            LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id
            LEFT JOIN store AS s ON s.store_id = i.store_id
            LEFT JOIN staff AS stf ON s.manager_staff_id = stf.staff_id
            LEFT JOIN address AS a ON s.address_id = a.address_id
			LEFT JOIN city AS cty ON cty.city_id = a.city_id
			LEFT JOIN country AS ctry ON cty.country_id = ctry.country_id
            GROUP BY id");
        return $films->fetchAll();
    }

    public static function search(string $search) {
        
        $sql = "SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, COUNT(r.rental_date) AS rent, COUNT(r.return_date) AS ret FROM film AS f 
        LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
        LEFT JOIN category AS c ON c.category_id = fc.category_id
        LEFT JOIN inventory AS i ON f.film_id = i.film_id
        LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id
        LEFT JOIN store AS s ON s.store_id = i.store_id
        LEFT JOIN staff AS stf ON s.manager_staff_id = stf.staff_id
        LEFT JOIN address AS a ON s.address_id = a.address_id
        LEFT JOIN city AS cty ON cty.city_id = a.city_id
        LEFT JOIN country AS ctry ON cty.country_id = ctry.country_id
        WHERE f.title LIKE '%$search%'
        GROUP BY id";

        $query = self::query($sql);

        return $query->fetchAll();
    }

    public static function findById(int $id) {
        $movie = self::query("SELECT f.film_id AS id, f.title AS title, f.release_year AS year, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, a.first_name AS actorFirstName, a.last_name AS actorLastName FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN film_actor AS fa ON fa.film_id = f.film_id 
            LEFT JOIN actor AS a ON a.actor_id = fa.actor_id
            WHERE f.film_id = $id");
        return $movie->fetch();
    }

    public static function findByStore($id) {
        $films = self::query("SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, COUNT(r.rental_date) AS rent, COUNT(r.return_date) AS ret, cty.city AS city, ctry.country AS country FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN inventory AS i ON f.film_id = i.film_id
            LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id
            LEFT JOIN store AS s ON s.store_id = i.store_id
            LEFT JOIN staff AS stf ON s.manager_staff_id = stf.staff_id
            LEFT JOIN address AS a ON s.address_id = a.address_id
            LEFT JOIN city AS cty ON cty.city_id = a.city_id
            LEFT JOIN country AS ctry ON cty.country_id = ctry.country_id
            WHERE s.store_id = $id
            GROUP BY id");
        return $films->fetchAll();
    }

    public static function findByCategory($id) {
        $films = self::query("SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, f.length AS duration, f.rating AS rating, f.rental_rate AS price, COUNT(r.rental_date) AS rent, COUNT(r.return_date) AS ret, cty.city AS city, ctry.country AS country FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN inventory AS i ON f.film_id = i.film_id
            LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id
            LEFT JOIN store AS s ON s.store_id = i.store_id
            LEFT JOIN staff AS stf ON s.manager_staff_id = stf.staff_id
            LEFT JOIN address AS a ON s.address_id = a.address_id
            LEFT JOIN city AS cty ON cty.city_id = a.city_id
            LEFT JOIN country AS ctry ON cty.country_id = ctry.country_id
            WHERE c.category_id = $id
            GROUP BY id");
        return $films->fetchAll();
    }

    public static function findByActor($id) {
        $films = self::query("SELECT f.film_id AS id, f.title AS title, f.description AS description, c.name AS category, act.first_name AS actorFirstName, act.last_name AS actorLastName, f.length AS duration, f.rating AS rating, f.rental_rate AS price, COUNT(r.rental_date) AS rent, COUNT(r.return_date) AS ret, cty.city AS city, ctry.country AS country FROM film AS f 
            LEFT JOIN film_category AS fc ON fc.film_id = f.film_id 
            LEFT JOIN category AS c ON c.category_id = fc.category_id
            LEFT JOIN film_actor AS fa ON fa.film_id = f.film_id 
            LEFT JOIN actor AS act ON fa.actor_id = act.actor_id
            LEFT JOIN inventory AS i ON f.film_id = i.film_id
            LEFT JOIN rental AS r ON i.inventory_id = r.inventory_id
            LEFT JOIN store AS s ON s.store_id = i.store_id
            LEFT JOIN staff AS stf ON s.manager_staff_id = stf.staff_id
            LEFT JOIN address AS a ON s.address_id = a.address_id
            LEFT JOIN city AS cty ON cty.city_id = a.city_id
            LEFT JOIN country AS ctry ON cty.country_id = ctry.country_id
            WHERE act.actor_id = $id
            GROUP BY id");
        return $films->fetchAll();
    }
}