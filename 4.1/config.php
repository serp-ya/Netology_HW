<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=lesson_4.1', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>