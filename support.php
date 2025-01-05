<?php
session_start();

// Get the raw POST data
$input = file_get_contents('php://input');

// Decode the JSON data
$data = json_decode($input, true);

if ($data) {
    // Save the data in the session
    $_SESSION['TreatmentData'] = $data;

    // Send a response back to the JavaScript
    echo json_encode(['success' => true]);
} else {
    // Send an error response
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
