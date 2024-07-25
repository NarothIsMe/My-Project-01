<?php
// Define a class to manage database connections
class connDB {
    // Database connection parameters
    private $server = "mysql:host=localhost;dbname=testingdb";
    private $username = "root";
    private $password = "";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Set error mode to throw exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Set default fetch mode to associative array
    );
    protected $conn; // Database connection object
    
    // Method to open a database connection
    public function open() {
        try {
            // Create a new PDO instance with the specified parameters
            $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
            return $this->conn; // Return the connection object
        } catch (PDOException $e) {
            // Handle any connection errors and display an error message
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
    
    // Method to close the database connection
    public function close() {
        $this->conn = null; // Set the connection object to null, closing the connection
    }
}
?>
