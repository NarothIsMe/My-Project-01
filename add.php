<?php
// Include the database connection class
include_once('db.php');

// Initialize an array to store output messages
$output = array('error' => false);

// Create an instance of connDB to establish a database connection
$database = new connDB();
$db = $database->open(); // Open the database connection

try {
    // Use a prepared statement to prevent SQL injection
    $stmt = $db->prepare("INSERT INTO members (firstname, lastname, address) VALUES (:firstname, :lastname, :address)");

    // If-else statement executing the prepared statement
    if ($stmt->execute(array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':address' => $_POST['address']))) {
        // Set success message if the member is added successfully
        $output['message'] = 'Member added successfully';
    } else {
        // Set error message if something went wrong during member addition
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot add member';
    } 
            
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
