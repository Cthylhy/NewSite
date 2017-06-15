<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    /*$sql = "CREATE TABLE posts (
    postid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    body VARCHAR(50) NOT NULL,
    created DATETIME NOT NULL,
    user VARCHAR(50) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Posts created successfully";*/
    /*$sql = "DROP TABLE users";
    $conn->exec($sql);*/
    $sql = "CREATE TABLE users (
    userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    isadmin BOOLEAN NOT NULL
    )";
    $conn->exec($sql);
    echo "Table Users created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    } 
