<?php

function db_connect($dbname) {
    $conn = @new mysqli("localhost", "root", "rootpw", $dbname);
    if ($conn->connect_error) {
        return NULL;
    }
    return $conn;
}
