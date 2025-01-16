<?php
// Include database connection
include 'dbConn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patientId = $_POST['patient_id'];
  $type = $_POST['type'];

  if ($patientId) {
    // Fetch records from `patient_records` table
    $query1 = "SELECT name, age, sex, patient_id,reason, address FROM patient_records WHERE patient_id = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $patientId);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $patientData = $result1->fetch_assoc();

    // Fetch records from `dentalrecords` table
    if($type == "invoice"){
      $query2 = "SELECT * FROM dentalrecords WHERE patientId = ?";
      $stmt2 = $conn->prepare($query2);
      $stmt2->bind_param("i", $patientId);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      $dentalData = $result2->fetch_all(MYSQLI_ASSOC);
    }elseif($type == "prescription"){
      $query2 = "SELECT DISTINCT * FROM `prescriptions` WHERE patient_id = ?";
      $stmt2 = $conn->prepare($query2);
      $stmt2->bind_param("i", $patientId);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      $prescriptionData = $result2->fetch_all(MYSQLI_ASSOC);
    }

    // Check if data exists
    if (isset($patientData) && isset($dentalData)) {
      echo json_encode([
        'status' => 'success',
        'patientData' => $patientData,
        'dentalData' => $dentalData
      ]);
    } elseif(isset($patientData) && isset($prescriptionData)) {
      echo json_encode([
        'status' => 'success',
        'patientData' => $patientData,
        'prescriptionData' => $prescriptionData
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
