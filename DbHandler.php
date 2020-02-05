<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "FarmManagerPhpDB";

$conn = mysqli_connect($serverName, $username, $password, $dbName) or die(mysqli_error($conn));

//form variables
$id = 0;
$name = '';
$type = '';
$update = false;

if(isset($_POST['save'])) {
    saveAnimal();
}

if(isset($_GET['delete'])) {
    deleteAnimal($_GET['delete']);
}

if(isset($_GET['edit'])) {
    setAnimalToEdit($_GET['edit']);
}

if(isset($_POST['update'])) {
    editAnimal();
}

function saveAnimal() {
    global $conn;
    $name = $_POST['name'];
    $type = $_POST['type'];

    $query = "INSERT INTO animal (name, type) VALUES ('$name', '$type');";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}

function getAnimals() {
    global $conn;
    $query = "SELECT * FROM animal;";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $animals = [];
    while($animal = mysqli_fetch_assoc($result)) {
        array_push($animals, $animal);
    }
    return $animals;
}

function deleteAnimal($id) {
    global $conn;
    $query = "DELETE FROM animal WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
}

function setAnimalToEdit($newId) {
    global $conn, $name, $type, $update, $id;
    $query = "SELECT * FROM animal WHERE id = $newId";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(count($result) == 1) {
        $animal = mysqli_fetch_assoc($result);
        $id = $animal['id'];
        $name = $animal['name'];
        $type = $animal['type'];
        $update = true;
    }
}

function editAnimal() {
    global $conn;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];

    $query = "UPDATE animal SET name = '$name', type = '$type' WHERE id = $id;";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}