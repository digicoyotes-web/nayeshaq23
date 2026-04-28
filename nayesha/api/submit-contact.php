<?php
/**
 * Contact Form Submission Handler
 * Handles "Book Appointment" form submissions
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include database configuration
require_once '../config/database.php';

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get form data
    $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
    $phone_number = isset($_POST['phone_number']) ? trim($_POST['phone_number']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Validation
    $errors = [];
    
    if (empty($full_name)) {
        $errors[] = "Full name is required";
    }
    
    if (empty($phone_number)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match('/^[0-9+\-\s()]+$/', $phone_number)) {
        $errors[] = "Invalid phone number format";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    // If validation fails
    if (!empty($errors)) {
        echo json_encode([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors
        ]);
        exit;
    }
    
    // Database connection
    $database = new Database();
    $db = $database->getConnection();
    
    if ($db) {
        try {
            // Prepare SQL statement
            $query = "INSERT INTO contact_submissions 
                      (full_name, phone_number, email, message, submission_type) 
                      VALUES (:full_name, :phone_number, :email, :message, 'contact')";
            
            $stmt = $db->prepare($query);
            
            // Bind parameters
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            
            // Execute query
            if ($stmt->execute()) {
                
                // Send email notification (optional)
                $to = "info@nayesha.com";
                $subject = "New Appointment Request - Nayesha Healthcare";
                $email_message = "New appointment request received:\n\n";
                $email_message .= "Name: " . $full_name . "\n";
                $email_message .= "Phone: " . $phone_number . "\n";
                $email_message .= "Email: " . $email . "\n";
                $email_message .= "Message: " . $message . "\n";
                
                $headers = "From: noreply@nayesha.com\r\n";
                $headers .= "Reply-To: " . $email . "\r\n";
                
                @mail($to, $subject, $email_message, $headers);
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Thank you! Your appointment request has been submitted successfully. We will contact you soon.'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to submit form. Please try again.'
                ]);
            }
            
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Database connection failed'
        ]);
    }
    
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>
