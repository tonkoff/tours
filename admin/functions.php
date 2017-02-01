<?php
function getAllUsers($connection) {
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($connection, $sql);
    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

function loggedIn(){
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1 || !isset($_SESSION['user'])) {
       return false;
    }
    return true;
}

function getUserByUsername($username, $connection) {
    $sql = "SELECT * FROM `users` WHERE `username` = '{$username}'";

    $result = mysqli_query($connection, $sql);
    $users = array();
    WhiLe ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}

function insertUser($data, $connection) {
    $password = sha1($data['password']);
    $sql = "
        INSERT INTO users
        SET 
          `username` = '{$data['username']}',
          `password` = '{$password}',
          `email`    = '{$data['email']}',
          `description` = '{$data['description']}'
    ";

    return mysqli_query($connection, $sql);
}

function updateUser($id, $data, $connection) {
    $sql = "
        UPDATE users
        SET 
          `username` = '{$data['username']}',
          `email`    = '{$data['email']}',
          `description` = '{$data['description']}'
        WHERE
          `id` = '{$id}'        
    ";

    return mysqli_query($connection, $sql);
}




function getUserById($id, $connection) {
    $sql = "SELECT * FROM `users` WHERE `id` = '{$id}'";

    $result = mysqli_query($connection, $sql);
    $users = array();
    WhiLe ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

function getTourById($id, $connection) {
    $sql = "SELECT * FROM `tours` WHERE `id` = '{$id}'";

    $result = mysqli_query($connection, $sql);
    $tours = array();
    WhiLe ($row = mysqli_fetch_assoc($result)) {
        $tours[] = $row;
    }
    return $tours;
}

function deleteUser($id, $connection) {
    $sql = "DELETE FROM users Where id = '{$id}' ";
    mysqli_query($connection, $sql);
}

function deleteTour($id, $connection) {
    $sql = "DELETE FROM tours Where id = '{$id}' ";
    mysqli_query($connection, $sql);
}

function getAllCategories($connection) {
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($connection, $sql);
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    
    return $categories;
}

function insertCategory($connection, $data) {
    $sql = "
        INSERT INTO categories
        SET 
          `name` = '{$data['name']}',
          `description` = '{$data['description']}'
    ";

    return mysqli_query($connection, $sql);
}

function getAllTours($connection) {
    $sql = "
    SELECT
    t.id, t.name, t.description, t.image,
    c.id as category_id, c.name as category_name,
     c.description as category_description
    FROM  tours as t
    JOIN categories as c ON  c.id = t.category_id
    ORDER BY t.id DESC
    ";
    
    $result = mysqli_query($connection, $sql);
    
    $tours = array();
    while($row = mysqli_fetch_assoc($result)) {
        $tours[] = $row;
    } 
    
    return $tours;
}

/*  SELECT
    t.id, t.name, t.description, t.image,
    c.id as category_id, c.name as category_name, c.description as category_description
    FROM  tours as t
    LEFT JOIN categories as c ON  c.id = t.category_id
 * */

function insertTour($connection, $data)
{
    $sql = "
        INSERT INTO tours
        SET 
          `name` = '{$data['name']}',
          `description` = '{$data['description']}',
          `image` = '{$data['image']}',
          `category_id` = '{$data['category_id']}'
        
    ";

    return mysqli_query($connection, $sql);

}

?>


