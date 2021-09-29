<?php

require_once('../helpers/database.php');
require_once('CRUD.php');

class Staff extends Database {

    public static function all() {
        $staff = self::query("SELECT * FROM staff");
        return $staff->fetchAll();
    }
}