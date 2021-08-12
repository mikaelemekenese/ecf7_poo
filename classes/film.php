<?php

require_once('database.php');
require_once('CRUD.php');

class Film extends Database {

    /*
     * Set the attributes mapping the columns
     */
    public $id;
    public $titre;
    public $description;
    public $disponible;
    public $id_rayon;

    function __construct($params) {
        // Insert post and set the ID
        var_dump($params); die();
        if (isset($params['id'])) {
            var_dump($params); die();
            $this->id = self::insert('posts', $params);
        }

        // Set the attributes from the params
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    /*
     * Get all the films
     * 
     * @return array
     */
    public static function all() {
        $films = array_map(function ($film) {
            return new Film($film);
        }, self::fetchAll('films'));

        return $films;
    }
}