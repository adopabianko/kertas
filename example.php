<?php 

require_once('Log_activity.php');

$log = new Log_activity();
$log->createLog(['GET', '119.110.87.74', 'https://www.google.com?param=value', '{"status": "00"}']);
$log->createLog(['POST', '119.110.87.74', 'https://www.google.com/', '{"email": "ado@ganteng.com", "password": "admin123"}, {"status": "00"}']);
$log->createLog(['GET', '119.110.87.74', 'https://www.google.com?param=value', '{"status": "00"}']);
$log->createLog(['POST', '119.110.87.74', 'https://www.google.com/', '{"email": "ado@ganteng.com", "password": "admin123"}, {"status": "00"}']);
$log->createLog(['GET', '119.110.87.74', 'https://www.google.com?param=value', '{"status": "00"}']);
$log->createLog(['POST', '119.110.87.74', 'https://www.google.com/', '{"email": "ado@ganteng.com", "password": "admin123"}, {"status": "00"}']);