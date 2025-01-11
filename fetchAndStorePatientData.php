<?php
// Include database connection
include 'dbConn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patientId = $_POST['patient_id'];

  if ($patientId) {
    // Fetch records from `patient_records` table
    $query1 = "SELECT name, age, sex, patient_id, address FROM patient_records WHERE patient_id = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $patientId);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $patientData = $result1->fetch_assoc();

    // Fetch records from `dentalrecords` table
    $query2 = "SELECT * FROM dentalrecords WHERE patientId = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $patientId);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $dentalData = $result2->fetch_all(MYSQLI_ASSOC);

    // Check if data exists
    if ($patientData) {
      echo json_encode([
        'status' => 'success',
        'patientData' => $patientData,
        'dentalData' => $dentalData
      ]);
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'No data found for the given patient ID.'
      ]);
    }

    // Close statements
    $stmt1->close();
    $stmt2->close();
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid patient ID.']);
  }

  // Close database connection
  $conn->close();
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
