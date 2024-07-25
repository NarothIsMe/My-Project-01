<?php
// Include the database connection class
include_once('db.php');

// Create an instance of connDB to establish a database connection
$database = new connDB();
$db = $database->open(); // Open the database connection

try {
    // SQL query to select all columns from the members table
    $sql = 'SELECT * FROM members';
    // Execute the SQL query and iterate over the result set
    foreach ($db->query($sql) as $row) {
        // Output HTML table row with data from each row in the result set
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
                <!-- Edit button with data-id attribute containing the member's ID -->
                <button class="btn btn-success btn-sm edit" data-id="<?php echo $row['id']; ?>">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <!-- Delete button with data-id attribute containing the member's ID -->
                <button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            </td>
        </tr>
<?php 
    }
} catch(PDOException $e) {
    // Catch any exceptions and display an error message
    echo "There is some problem in connection: " . $e->getMessage();
}

// Close the database connection
$database->close();
?>
