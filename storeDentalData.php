<?php
session_start();

// Include the database connection file
include 'dbConn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Decode JSON data from the request
  $patientId = $_POST['patientId'] ?? null;
  $dentalData = isset($_POST['dentalData']) ? json_decode($_POST['dentalData'], true) : [];

  if ($patientId && !empty($dentalData)) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO DentalRecords (patientId, toothId, price, surgery) VALUES (?, ?, ?, ?)");

    // Loop through the data and insert it into the database
    foreach ($dentalData as $record) {
      $toothId = $record['toothId'];
      $price = $record['selectedOptions'][0];
      $surgery = $record['selectedOptions'][1];

      // Bind parameters to the SQL query
      $stmt->bind_param("isds", $patientId, $toothId, $price, $surgery);
      $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    echo json_encode([
      'status' => 'success',
      'message' => 'Dental records saved successfully.'
    ]);
  } else {
    echo json_encode([
      'status' => 'error',
      'message' => 'Invalid data received.'
    ]);
  }
}
