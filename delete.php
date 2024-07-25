<?php
// Include the database connection class
include_once('db.php');

// Initialize an array to store output messages
$output = array('error' => false);

// Create an instance of connDB to establish a database connection
$database = new connDB();
$db = $database->open(); // Open the database connection

try {
    // Construct SQL query to delete the member based on the provided ID
    $sql = "DELETE FROM members WHERE id = '".$_POST['id']."'";

    // Execute the SQL query
    if ($db->exec($sql)) {
        // Set success message if the member is deleted successfully
        $output['message'] = 'Member deleted successfully';
    } else {
        // Set error message if something went wrong during member deletion
        $output['error'] = true;
        $output['message'] = 'Something went wrong. Cannot delete member';
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
