<?php
// Include database connection file
include('dbConn.php'); // Replace with your database connection script

// Check if the request is an AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract patient_id and selectedTeethData from the request
    $patient_id = $data['patient_id'];
    $selectedTeethData = $data['selectedTeethData'];

    // Prepare an SQL query to insert data into the `treatmentplan` table
    $sql = "INSERT INTO treatmentplan (PatientId, Tooth_Name, Treatment, Price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Loop through selectedTeethData and insert each record
    foreach ($selectedTeethData as $tooth) {
        $toothId = $tooth['toothId'];
        $price = $tooth['selectedOptions'][0];
        $treatment = $tooth['selectedOptions'][1];

        // Bind parameters and execute the query
        $stmt->bind_param("isss", $patient_id, $toothId, $treatment, $price);
        $stmt->execute();
    }

    // Check for errors
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Treatment plan added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add treatment plan.']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
