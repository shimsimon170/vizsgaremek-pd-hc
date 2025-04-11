<?php
header('Content-Type: application/json');

$dataFile = 'jsons/food.json';

if (file_exists($dataFile)) {
    $data = file_get_contents($dataFile);
    echo $data;
} else {
    echo json_encode(['error' => 'Data not found']);
}
?>