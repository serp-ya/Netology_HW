<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=lesson_4.2', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

