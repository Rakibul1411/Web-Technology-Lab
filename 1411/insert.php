<?php
// Include the database configuration file
require_once 'includes/congfig.php'; // Make sure the correct file name is used

// Demo user data
$email = 'demo@example.com'; // Email for the demo user
$password = 'demo123'; // Demo password

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert the new demo user
$sql = "INSERT INTO users (email, password) VALUES (?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Check if the statement preparation was successful
if ($stmt === false) {
    echo "Error preparing the SQL query: " . $conn->error;
    exit;
}

// Bind parameters and execute the query
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Demo user inserted successfully!";
} else {
    echo "Error inserting demo user: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
