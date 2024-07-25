<?php
// Include the database connection class
include_once('db.php');

// Initialize an array to store output messages
$output = array('error' => false);

// Create an instance of connDB to establish a database connection
$database = new connDB();
$db = $database->open(); // Open the database connection

try {
    // Retrieve the ID of the member from the POST data
    $id = $_POST['id'];

    // Prepare and execute a SQL query to select the member's details based on the ID
    $stmt = $db->prepare("SELECT * FROM members WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Fetch the data of the member
    $output['data'] = $stmt->fetch();
} catch(PDOException $e) {
    // Catch any exceptions and set error message
    $output['error'] = true;
    $output['message'] = $e->getMessage();
}

// Close the database connection
$database->close();

// Encode the output array to JSON format and output it
echo json_encode($output);
?>
