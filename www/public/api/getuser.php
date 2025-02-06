<?php
/**
 * Hämtar användarlistan om användaren är inloggad
 * 
 * @return array $result Innehåller användarlistan om användaren är inloggad, annars tom array
 */
session_start();
$result = null;

// Egen kod!
// $_SESSION['uid'] skall kontrolleras

header('Content-Type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);