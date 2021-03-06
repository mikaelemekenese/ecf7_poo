<?php

class Database {

    const servername = "localhost";
    const username = "root";
    const password = "";
    const database = "sakila";

    public static $conn;

    public static function connect() {
        try {
            if (empty(self::$conn)) {
                $conn = new PDO("mysql:host=" . self::servername . ";dbname=" . self::database, self::username, self::password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn = $conn;
            }

            return self::$conn;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected static function query($sql, $params = []) {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute($params);

            return $stmt;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected static function insert($table, $params) {
        $columns = array_keys($params);
        $queries = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . $next;
        }, '');
        $values = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . ':' . $next;
        }, '');
        $stmt = self::query("INSERT INTO $table ($queries) VALUES ($values)", $params);

        return self::$conn->lastInsertId();
    }

    public static function create($params) {
        $columns = array_keys($params);
        $queries = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . $next;
        }, '');
        $values = array_reduce($columns, function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . ':' . $next;
        }, '');
        return self::query("INSERT INTO " . static::$table . " ($queries) VALUES ($values)", $params);
    }

    public static function update($params) {
        $queries = array_reduce($columns, function($prev, $next, $index) {
            echo $index;
            return $prev . ($prev ? ', ' : '') . $next;
        }, '');
    
        die();
        return $this->query("UPDATE ". static::$table . " SET $queries WHERE id=" . $this->id, $params);
    }
    
    public static function delete() {
        return $this->query("DELETE FROM " . static::$table . " WHERE id=" . $this->id);
    }
}