<?php
/**
 * VC Consultation Form Submission Handler
 * Handles "Book Free VC Consultation" form submissions
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
    $hospital_organization = isset($_POST['hospital_organization']) ? trim($_POST['hospital_organization']) : '';
    $preferred_date = isset($_POST['preferred_date']) ? trim($_POST['preferred_date']) : '';
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
            $query = "INSERT INTO vc_consultations 
                      (full_name, phone_number, email, hospital_organization, preferred_date, message) 
                      VALUES (:full_name, :phone_number, :email, :hospital_organization, :preferred_date, :message)";
            
            $stmt = $db->prepare($query);
            
            // Bind parameters
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':hospital_organization', $hospital_organization);
            $stmt->bindParam(':preferred_date', $preferred_date);
            $stmt->bindParam(':message', $message);
            
            // Execute query
            if ($stmt->execute()) {
                
                // Send email notification (optional)
                $to = "info@nayesha.in";
                $subject = "New VC Consultation Request - Nayesha Healthcare";
                $email_message = "New VC consultation request received:\n\n";
                $email_message .= "Name: " . $full_name . "\n";
                $email_message .= "Phone: " . $phone_number . "\n";
                $email_message .= "Email: " . $email . "\n";
                $email_message .= "Hospital/Organization: " . $hospital_organization . "\n";
                $email_message .= "Preferred Date: " . $preferred_date . "\n";
                $email_message .= "Message: " . $message . "\n";
                
                $headers = "From: noreply@nayesha.in\r\n";
                $headers .= "Reply-To: " . $email . "\r\n";
                
                @mail($to, $subject, $email_message, $headers);
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Thank you! Your VC consultation request has been submitted successfully. We will contact you soon to schedule the consultation.'
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
