# Nayesha Healthcare - Database Setup Guide

## Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- phpMyAdmin (optional, for easy database management)

## Database Setup Instructions

### Step 1: Create Database
1. Open phpMyAdmin or MySQL command line
2. Run the SQL file located at: `database/setup.sql`
3. This will create:
   - Database: `nayesha_healthcare`
   - Table: `contact_submissions` (for Book Appointment forms)
   - Table: `vc_consultations` (for VC Consultation bookings)
   - Table: `admin_users` (for future admin panel)

### Step 2: Configure Database Connection
1. Open `config/database.php`
2. Update the following credentials if needed:
   ```php
   private $host = "localhost";
   private $db_name = "nayesha_healthcare";
   private $username = "root";
   private $password = "";
   ```

### Step 3: Set Up Email Notifications (Optional)
1. Open `api/submit-contact.php` and `api/submit-vc-consultation.php`
2. Update the email address on line:
   ```php
   $to = "info@nayesha.in"; // Change to your email
   ```
3. Configure your server's mail settings (SMTP recommended for production)

### Step 4: Test the Forms
1. Open your website in a browser
2. Click "Book Appointment" button
3. Fill out the form and submit
4. Check the database to verify the submission was saved
5. Repeat for "Book Free VC Consultation" form

## Database Tables Structure

### contact_submissions
- `id` - Auto-increment primary key
- `full_name` - VARCHAR(255)
- `phone_number` - VARCHAR(20)
- `email` - VARCHAR(255)
- `message` - TEXT
- `submission_type` - VARCHAR(50) - Default: 'contact'
- `created_at` - TIMESTAMP
- `status` - VARCHAR(20) - Default: 'new'

### vc_consultations
- `id` - Auto-increment primary key
- `full_name` - VARCHAR(255)
- `phone_number` - VARCHAR(20)
- `email` - VARCHAR(255)
- `hospital_organization` - VARCHAR(255)
- `preferred_date` - DATE
- `message` - TEXT
- `created_at` - TIMESTAMP
- `status` - VARCHAR(20) - Default: 'pending'

## API Endpoints

### Contact Form Submission
- **URL:** `api/submit-contact.php`
- **Method:** POST
- **Parameters:**
  - `full_name` (required)
  - `phone_number` (required)
  - `email` (required)
  - `message` (optional)

### VC Consultation Submission
- **URL:** `api/submit-vc-consultation.php`
- **Method:** POST
- **Parameters:**
  - `full_name` (required)
  - `phone_number` (required)
  - `email` (required)
  - `hospital_organization` (optional)
  - `preferred_date` (optional)
  - `message` (optional)

## Security Recommendations

1. **Change Default Admin Password**
   - Default username: `admin`
   - Default password: `admin123`
   - Change immediately after setup!

2. **Enable HTTPS**
   - Use SSL certificate for secure data transmission
   - Update form action URLs to use HTTPS

3. **Input Validation**
   - Server-side validation is already implemented
   - Consider adding CAPTCHA for spam protection

4. **Database Security**
   - Use strong database passwords
   - Limit database user permissions
   - Regular backups

5. **Email Configuration**
   - Use SMTP instead of PHP mail() function
   - Configure SPF and DKIM records

## Troubleshooting

### Forms not submitting
1. Check browser console for JavaScript errors
2. Verify API endpoints are accessible
3. Check PHP error logs
4. Ensure database connection is working

### Database connection failed
1. Verify MySQL service is running
2. Check database credentials in `config/database.php`
3. Ensure database exists
4. Check user permissions

### Email not sending
1. Check server mail configuration
2. Verify email address is correct
3. Check spam folder
4. Consider using SMTP service (Gmail, SendGrid, etc.)

## Production Deployment

1. Update database credentials
2. Enable error logging (disable display_errors)
3. Set up SSL certificate
4. Configure proper email service
5. Add CAPTCHA to forms
6. Set up regular database backups
7. Monitor form submissions

## Support

For issues or questions:
- Email: info@nayesha.in
- Phone: +91 8454831188
