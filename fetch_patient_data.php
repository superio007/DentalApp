<?php
include 'dbConn.php';

// Set default offset and limit values
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

// Fetch data from the database with pagination
$sql = "SELECT * FROM `patient_records` LIMIT $offset, $limit";
$result = $conn->query($sql);

// Initialize an array to store the data
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);
