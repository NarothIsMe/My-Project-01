<?php
// Include the database connection class
include_once('db.php');

// Initialize an array to store output messages
$output = array('error' => false);

// Create an instance of connDB to establish a database connection
$database = new connDB();
$db = $database->open(); // Open the database connection

try {
    // Retrieve POST data
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];

    // Construct SQL query to update member's information
    $sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = '$id'";
    
    // Execute the SQL query
    if ($db->exec($sql)) {
        // Set success message if the member is updated successfully
        $output['message'] = 'Member updated successfully';
    } else {
        // Set error message if something went wrong during member update
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot update member';
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
