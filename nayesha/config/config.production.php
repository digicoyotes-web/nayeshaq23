<?php
/**
 * Production Configuration for Hostinger
 * Copy this to database.php and update with your actual credentials
 */

class Database {
    // Hostinger Database Configuration
    // UPDATE THESE VALUES WITH YOUR ACTUAL HOSTINGER DATABASE DETAILS
    
    private $host = "localhost";  // Usually "localhost" on Hostinger
    private $db_name = "u123456789_nayesha";  // Replace with your actual database name (includes Hostinger prefix)
    private $username = "u123456789_user";     // Replace with your actual database username
    private $password = "YOUR_STRONG_PASSWORD_HERE";  // Replace with your actual database password
    
    public $conn;

    // Get database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8mb4");
        } catch(PDOException $exception) {
            // In production, log errors instead of displaying them
            error_log("Database Connection Error: " . $exception->getMessage());
            
            // Display user-friendly message
            die("Sorry, we're experiencing technical difficulties. Please try again later.");
        }

        return $this->conn;
    }
}

// Production Settings
ini_set('display_errors', 0);  // Don't display errors to users
ini_set('log_errors', 1);       // Log errors to file
error_reporting(E_ALL);         // Report all errors to log

// Set timezone
date_default_timezone_set('Asia/Kolkata');
?>
