<?php
require_once 'functions.php';
require "./vendor/autoload.php";

session_start();

spl_autoload_register(function($name) {
    $file = dirname(__DIR__) . '/core/' . $name . '.class.php';
    if (!file_exists($file)) {
        throw new Exception('Autoload class: File ' . $file . ' not found');
    }
    require $file;
});