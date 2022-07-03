<?php

require_once "lib.db.php";

/*
 * You can use db_connect(//your-db-name//) function to get mysqli connection.
 * For instance, db_connect("world") returns mysqli connection with "world" database.
 */

 function create($userid) {
    //Task 3-1
    $conn = db_connect("profiles");

    $select_query = "SELECT profile_id FROM profile WHERE user_id=$userid";
    
    $result = $conn -> query($select_query);
    
    if ($result -> num_rows > 0) {
        return -1;
    }

    $insert_query = "INSERT INTO profile (user_id) VALUES ($userid)";

    if ($conn -> query($insert_query)) {
        return 0;
    } else {
        return -1;
    }
 }

 function modify($userid, $name, $info) {
    //Task 3-2
    $conn = db_connect("profiles");

    $select_query = "SELECT profile_id FROM profile WHERE user_id=$userid";
    
    $result = $conn -> query($select_query);
    
    if ($result -> num_rows == 0) {
        return -1;
    }

    $update_query = "UPDATE profile SET profile_name = $name', profile_info = $info WHERE user_id=$userid";

    if ($conn -> query($update_query)) {
        return 0;
    } else {
        return -1;
    }
 }

 function remove($userid) {
    //Task 3-3
    $conn = db_connect("profiles");

    $select_query = "SELECT profile_id FROM profile WHERE user_id=$userid";
    
    $result = $conn -> query($select_query);
    
    if ($result -> num_rows == 0) {
        return -1;
    }

    $delete_query = "DELETE FROM profile WHERE user_id=$userid";

    if ($conn -> query($delete_query)) {
        return 0;
    } else {
        return -1;
    }
 }

 function get_profile($userid) {
    //Task 3-4
    $conn = db_connect("profiles");

    $search_profile_query = "SELECT profile_id FROM profile WHERE user_id=$userid";
    
    $result = $conn -> query($search_profile_query);
    
    if ($result -> num_rows == 0) {
        return -1;
    }

    $get_details_query = "SELECT profile_name, profile_info FROM profile WHERE user_id=$userid";

    if ($result = $conn -> query($get_info_query)) {
        $row = $result -> fetch_assoc();

        return $row;
    } else {
        return -1;
    }
 }
