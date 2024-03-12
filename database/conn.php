<?php

    function database() {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "dms_db";

        $mysqli = new mysqli($hostname, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $mysqli->set_charset("utf8");

        return $mysqli;
    }
?>
