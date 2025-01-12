<?php
// Database connection
include("dbConn.php");

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $query = $conn->real_escape_string($_POST['query']);
    $sql = "SELECT id, medicine, dosage, timing, duration 
            FROM prescriptionmedicines 
            WHERE medicine LIKE '%$query%' 
            LIMIT 10";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}
$conn->close();
