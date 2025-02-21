<?php
define('BASE_URL', 'http://localhost/he/');



class conn {
    public $conn;

    public function __construct(){
        // Change these values to match your database configuration
        $servername = "localhost";
        $username = "root";  // Use your database username
        $password = "";      // Use your database password
        $dbname = "project_db";  // Use your database name

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>

<link rel="icon" href="./assets/favicon.ico" type="image/x-icon">