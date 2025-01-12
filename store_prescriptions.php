<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection
    include 'dbConn.php';

    // Decode the JSON data from POST
    $data = json_decode($_POST['medicines'], true);
    $patientId = $_POST['patientId'];

    // Check if data is valid
    if (!empty($data) && isset($patientId)) {
        foreach ($data as $item) {
            $medicineId = $item['id'];
            $medicineName = $item['medicine'];
            $dosage = $item['dosage'];
            $timing = $item['timing'] ?? null;
            $duration = $item['duration'];

            // Insert data into the prescriptions table
            $stmt = $conn->prepare("INSERT INTO prescriptions (patient_id, medicine_id, medicine_name, dosage, timing, duration) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissss", $patientId, $medicineId, $medicineName, $dosage, $timing, $duration);

            if (!$stmt->execute()) {
                echo json_encode(['status' => 'error', 'message' => 'Error saving data to the database']);
                exit;
            }
        }
        echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
    }
}
