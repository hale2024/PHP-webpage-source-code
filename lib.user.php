<?php

require_once "lib.db.php";

/*
 * You can use db_connect(//your-db-name//) function to get mysqli connection.
 * For instance, db_connect("world") returns mysqli connection with "world" database.
 */

function register($userid, $password) {
    //Task #2-1
    $conn = db_connect("profiles");

    $userid = trim($userid);
    $password = trim($password);

    $select_query = "SELECT user_id FROM user WHERE user_id=?";
    
    if ($stmt = $conn -> prepare($select_query)) {
        $stmt -> bind_param("s", $userid);

        if ($stmt -> execute()) {
            $stmt -> store_result();

            $check_userid = "";
            $stmt -> bind_result($check_userid);
            $stmt -> fetch();

            if ($stmt -> num_rows == 1) {
                $stmt -> close();
                return -1;
            }
        }
    }

    if (strlen($password) <= 8) {
        return -1;
    }

    $insert_query = "INSERT INTO user (user_id, user_password) VALUES (?, ?)";

    if ($stmt = $conn -> prepare($insert_query)) {
        $stmt -> bind_param("ss", $userid, $password);

        if ($stmt -> execute()) {
            $stmt -> close();
            return 0;
        }
    }
}

function login($userid, $password) {
    //Task #2-2
    $conn = db_connect("profiles");

    $userid = trim($userid);
    $password = trim($password);

    $query = "SELECT user_id, user_password FROM user WHERE user_id=?";

    if ($stmt = $conn -> prepare($query)) {
        $stmt -> bind_param("s", $userid);

        if ($stmt -> execute()) {
            $stmt -> store_result();

            if ($stmt -> num_rows == 1) {
                $stmt -> bind_result($user_id, $user_password);
                
                if ($stmt -> fetch()) {
                    if ($password == $user_password) {
                        $stmt -> close();
                        return 0;
                    } else {
                        return -1;
                    }
                }
            } else {
                return -1;
            }
        }
    }
}
