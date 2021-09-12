<?php

require_once('./helpers/database.php');
require_once('CRUD.php');

class Category extends Database {

    public static function all() {
        $categories = self::query("SELECT DISTINCT c.category_id AS cat_id, c.name AS cat_name FROM category AS c
            LEFT JOIN film_category AS fc ON fc.category_id = c.category_id
            LEFT JOIN film AS f ON f.film_id = fc.film_id");
        return $categories->fetchAll();
    }

    public static function findById($id) {
        $category = self::query("SELECT c.category_id AS cat_id, c.name AS cat_name FROM category AS c
            LEFT JOIN film_category AS fc ON fc.category_id = c.category_id
            LEFT JOIN film AS f ON f.film_id = fc.film_id
            WHERE category_id = $id LIMIT 1");
        return $category->fetch();
    }
}