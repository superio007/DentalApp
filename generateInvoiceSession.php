<?php
session_start();
// Read the raw input
$rawInput = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($rawInput, true);
// $_SESSION['Data'] = $data;
$dataArray = json_decode($data, true);

$_SESSION['patientData'] = $dataArray['patientData'];
$_SESSION['dentalData'] = $dataArray['dentalData'];

// Check if data is received
if ($data) {
  // Send the received data back as a response for verification
  header('Content-Type: application/json');
  echo json_encode([
    'status' => 'success',
    'message' => 'Data received successfully.',
    'receivedData' => $dataArray
  ]);
} else {
  // Handle missing or invalid data
  header('Content-Type: application/json');
  echo json_encode([
    'status' => 'error',
    'message' => 'No data received or invalid JSON.'
  ]);
}
