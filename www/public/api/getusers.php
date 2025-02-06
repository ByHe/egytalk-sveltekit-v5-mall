<?php
/**
 * Hämtar användarlistan om användaren är inloggad
 * 
 * @return array $result Innehåller användarlistan om användaren är inloggad, annars tom array
 */
session_start();
$result= [];
$statusCode = 401;

if (isset($_SESSION['uid'])){
   include('../../model/DbEgyTalk.php');
   $db = new DbEgyTalk();
   $result = $db->getUsers();
   $statusCode = 200;
}

http_response_code($statusCode);
header('Content-Type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);