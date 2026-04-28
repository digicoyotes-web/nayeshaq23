<?php
/**
 * Database Connection Test
 * Upload this file to test your database connection on Hostinger
 * Access: https://yourdomain.com/test-connection.php
 * DELETE THIS FILE AFTER TESTING!
 */

// Include database configuration
require_once 'config/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007eca;
            border-bottom: 3px solid #007eca;
            padding-bottom: 10px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #dc3545;
            margin: 20px 0;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #17a2b8;
            margin: 20px 0;
        }
        .test-item {
            padding: 10px;
            margin: 10px 0;
            border-left: 3px solid #007eca;
            background: #f8f9fa;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Nayesha Healthcare - System Test</h1>
        
        <div class="warning">
            <strong>⚠️ Security Warning:</strong> Delete this file after testing!
        </div>

        <?php
        // Test 1: PHP Version
        echo '<div class="test-item">';
        echo '<strong>✓ PHP Version:</strong> ' . phpversion();
        if (version_compare(phpversion(), '7.4.0', '>=')) {
            echo ' <span style="color: green;">✓ Compatible</span>';
        } else {
            echo ' <span style="color: red;">✗ Update Required</span>';
        }
        echo '</div>';

        // Test 2: PDO Extension
        echo '<div class="test-item">';
        echo '<strong>✓ PDO Extension:</strong> ';
        if (extension_loaded('pdo')) {
            echo '<span style="color: green;">✓ Installed</span>';
        } else {
            echo '<span style="color: red;">✗ Not Installed</span>';
        }
        echo '</div>';

        // Test 3: PDO MySQL Driver
        echo '<div class="test-item">';
        echo '<strong>✓ PDO MySQL Driver:</strong> ';
        if (extension_loaded('pdo_mysql')) {
            echo '<span style="color: green;">✓ Installed</span>';
        } else {
            echo '<span style="color: red;">✗ Not Installed</span>';
        }
        echo '</div>';

        // Test 4: Database Connection
        echo '<h2>Database Connection Test</h2>';
        
        try {
            $database = new Database();
            $db = $database->getConnection();
            
            if ($db) {
                echo '<div class="success">';
                echo '<strong>✓ Database Connection Successful!</strong><br>';
                echo 'Connected to database successfully.';
                echo '</div>';
                
                // Test 5: Check Tables
                echo '<h3>Database Tables Check</h3>';
                
                $tables = ['contact_submissions', 'vc_consultations', 'admin_users'];
                $allTablesExist = true;
                
                foreach ($tables as $table) {
                    echo '<div class="test-item">';
                    echo '<strong>Table: ' . $table . '</strong> - ';
                    
                    try {
                        $stmt = $db->query("SELECT 1 FROM $table LIMIT 1");
                        echo '<span style="color: green;">✓ Exists</span>';
                    } catch (PDOException $e) {
                        echo '<span style="color: red;">✗ Not Found</span>';
                        $allTablesExist = false;
                    }
                    echo '</div>';
                }
                
                if ($allTablesExist) {
                    echo '<div class="success">';
                    echo '<strong>✓ All Required Tables Exist!</strong>';
                    echo '</div>';
                } else {
                    echo '<div class="error">';
                    echo '<strong>✗ Some Tables Missing!</strong><br>';
                    echo 'Please import database/setup.sql via phpMyAdmin.';
                    echo '</div>';
                }
                
                // Test 6: Test Insert
                echo '<h3>Database Write Test</h3>';
                try {
                    $testQuery = "INSERT INTO contact_submissions 
                                  (full_name, phone_number, email, message, submission_type) 
                                  VALUES ('Test User', '1234567890', 'test@test.com', 'Test message', 'test')";
                    $db->exec($testQuery);
                    
                    // Delete test record
                    $db->exec("DELETE FROM contact_submissions WHERE submission_type = 'test'");
                    
                    echo '<div class="success">';
                    echo '<strong>✓ Database Write Test Successful!</strong><br>';
                    echo 'Can insert and delete records.';
                    echo '</div>';
                } catch (PDOException $e) {
                    echo '<div class="error">';
                    echo '<strong>✗ Database Write Test Failed!</strong><br>';
                    echo 'Error: ' . $e->getMessage();
                    echo '</div>';
                }
                
            } else {
                echo '<div class="error">';
                echo '<strong>✗ Database Connection Failed!</strong><br>';
                echo 'Could not connect to database.';
                echo '</div>';
            }
            
        } catch (Exception $e) {
            echo '<div class="error">';
            echo '<strong>✗ Database Connection Error!</strong><br>';
            echo 'Error: ' . $e->getMessage() . '<br><br>';
            echo '<strong>Troubleshooting:</strong><br>';
            echo '1. Check config/database.php credentials<br>';
            echo '2. Verify database exists in phpMyAdmin<br>';
            echo '3. Ensure database user has proper privileges<br>';
            echo '4. Check if database name includes Hostinger prefix (u123456789_)';
            echo '</div>';
        }

        // Test 7: File Permissions
        echo '<h2>File Permissions Test</h2>';
        
        $directories = ['api', 'config', 'js', 'database'];
        foreach ($directories as $dir) {
            echo '<div class="test-item">';
            echo '<strong>Directory: /' . $dir . '</strong> - ';
            if (is_readable($dir)) {
                echo '<span style="color: green;">✓ Readable</span>';
            } else {
                echo '<span style="color: red;">✗ Not Readable</span>';
            }
            echo '</div>';
        }

        // Test 8: Email Function
        echo '<h2>Email Function Test</h2>';
        echo '<div class="test-item">';
        echo '<strong>mail() function:</strong> ';
        if (function_exists('mail')) {
            echo '<span style="color: green;">✓ Available</span>';
        } else {
            echo '<span style="color: red;">✗ Not Available</span>';
        }
        echo '</div>';

        // Summary
        echo '<h2>Summary</h2>';
        echo '<div class="info">';
        echo '<strong>System Status:</strong><br>';
        echo 'PHP Version: ' . phpversion() . '<br>';
        echo 'Server: ' . $_SERVER['SERVER_SOFTWARE'] . '<br>';
        echo 'Document Root: ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
        echo 'Current Time: ' . date('Y-m-d H:i:s');
        echo '</div>';
        ?>

        <div class="warning">
            <strong>⚠️ Important:</strong> Delete this file (test-connection.php) after testing for security!
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="index.html" style="background: #007eca; color: white; padding: 10px 30px; text-decoration: none; border-radius: 5px;">
                Go to Website
            </a>
        </div>
    </div>
</body>
</html>
