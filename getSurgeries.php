<?php
include 'dbConn.php';

// Fetch surgeries data from the 'surgeries' table
$sql = "SELECT * FROM surgeries";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
  // Store the data in an associative array
  $surgeries = [];
  while ($row = $result->fetch_assoc()) {
    $surgeries[] = $row;
  }

  // Return the data as JSON
  echo json_encode(['success' => true, 'data' => $surgeries]);
} else {
  // Return an error if no data is found
  echo json_encode(['success' => false, 'message' => 'No surgeries found']);
}

// Close the connection
$conn->close();
