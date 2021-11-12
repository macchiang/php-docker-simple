<?php

echo "Hello from the docker yooooo container<br />";

$conn = new mysqli("db", "root", "example");

if ($conn->query("CREATE DATABASE IF NOT EXISTS company1")) {
    printf("Database company1 created successfully.<br />");
 }
 if ($conn->errno) {
    printf("Could not create database: %s<br />", $conn->error);
 }

$mysqli = mysqli_select_db ($conn, "company1");


$sql = "CREATE TABLE IF NOT EXISTS users( ".
"name VARCHAR(100), ".
"fav_color VARCHAR(100) ".
"); ";

if ($conn->query($sql)) {
    printf("Table users created successfully.<br />");
}
if ($conn->errno) {
    printf("Could not create table: %s<br />", $conn->error);
}

$sql = "INSERT INTO users (name, fav_color) VALUES('Lil Sneazy', 'Yellow')";
$result = $conn->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Nick Jonas', 'Brown')";
$result = $conn->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Maroon 5', 'Maroon')";
$result = $conn->query($sql);
$sql = "INSERT INTO users (name, fav_color) VALUES('Tommy Baker', '043A2B')";
$result = $conn->query($sql);


$sql = 'SELECT * FROM users';

if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->name . " " . $user->fav_color;
    echo "<br>";
}
