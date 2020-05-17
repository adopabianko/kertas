<?php 

require_once('Kertas.php');

$kertas = new Kertas();
$kertas->create(['GET', '127.0.0.1', 'https://www.example.com?param=value', '{"status": "00"}']);
$kertas->create(['POST', '127.0.0.1', 'https://www.example.com/login', '{"email": "adopabianko@gmail.com", "password": "admin123"}, {"status": "00"}']);
$kertas->create(['GET', '127.0.0.1', 'https://www.example.com?param=value', '{"status": "00"}']);
$kertas->create(['POST', '127.0.0.1', 'https://www.example.com/login', '{"email": "adopabianko@gmail.com", "password": "admin123"}, {"status": "00"}']);
$kertas->create(['GET', '127.0.0.1', 'https://www.example.com?param=value', '{"status": "00"}']);
$kertas->create(['POST', '127.0.0.1', 'https://www.example.com/login', '{"email": "adopabianko@gmail.com", "password": "admin123"}, {"status": "00"}']);