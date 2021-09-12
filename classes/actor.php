<?php

require_once('./helpers/database.php');
require_once('CRUD.php');

class Actor extends Database 
{

    public static function all() 
    {
        $actors = self::query("SELECT DISTINCT a.actor_id AS actor_id, a.first_name AS actorFirstName, a.last_name AS actorLastName FROM actor AS a 
            LEFT JOIN film_actor AS fa ON fa.actor_id = a.actor_id 
            LEFT JOIN film AS f ON f.film_id = fa.film_id
            WHERE f.film_id = fa.film_id
            ORDER BY actorLastName");
        return $actors->fetchAll();
    }

    public static function findById(int $id) 
    {
        $actor = self::query("SELECT a.first_name AS actorFirstName, a.last_name AS actorLastName  FROM actor AS a
            LEFT JOIN film_actor AS fa ON a.actor_id = fa.actor_id
            LEFT JOIN film AS f ON f.film_id = fa.film_id
            WHERE f.film_id = $id");
        return $actor->fetchAll();
    }
}