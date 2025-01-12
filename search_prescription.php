<?php
// Database connection
include("dbConn.php");

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['query'])) {
    $query = $conn->real_escape_string($_POST['query']);
    $sql = "SELECT Medicine FROM PrescriptionMedicines WHERE Medicine LIKE '%$query%' LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p onclick=\"selectMedicine('" . htmlspecialchars($row['Medicine']) . "')\" 
                    style='cursor: pointer; margin: 5px; padding: 5px; border-bottom: 1px solid #ddd;'>
                    " . htmlspecialchars($row['Medicine']) . "
                  </p>";
        }
    } else {
        echo "<p style='padding: 5px;'>No results found</p>";
    }
}
$conn->close();
