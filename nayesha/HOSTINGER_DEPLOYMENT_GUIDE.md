# Nayesha Healthcare - Hostinger Deployment Guide

## 🚀 Complete Step-by-Step Deployment Instructions

### Prerequisites
- Hostinger hosting account (Premium or Business plan recommended)
- Domain name configured
- FTP/File Manager access
- MySQL database access

---

## Step 1: Prepare Hostinger Account

### 1.1 Login to Hostinger
1. Go to https://www.hostinger.com
2. Login to your account
3. Go to "Hosting" section

### 1.2 Access Control Panel (hPanel)
1. Click on your hosting plan
2. You'll see the hPanel dashboard

---

## Step 2: Create MySQL Database

### 2.1 Create Database
1. In hPanel, go to **"Databases"** → **"MySQL Databases"**
2. Click **"Create New Database"**
3. Database Name: `nayesha_healthcare` (or any name you prefer)
4. Click **"Create"**

### 2.2 Create Database User
1. Scroll down to **"MySQL Users"**
2. Click **"Create New User"**
3. Username: `nayesha_user` (or any name)
4. Password: Create a strong password (save it!)
5. Click **"Create"**

### 2.3 Add User to Database
1. Scroll to **"Add User to Database"**
2. Select User: `nayesha_user`
3. Select Database: `nayesha_healthcare`
4. Click **"Add"**
5. Grant **ALL PRIVILEGES**
6. Click **"Make Changes"**

### 2.4 Note Database Details
Write down these details (you'll need them):
```
Database Host: localhost (or provided by Hostinger)
Database Name: u123456789_nayesha (Hostinger adds prefix)
Database User: u123456789_user
Database Password: [your password]
```

---

## Step 3: Import Database Structure

### 3.1 Access phpMyAdmin
1. In hPanel, go to **"Databases"** → **"phpMyAdmin"**
2. Click **"Access phpMyAdmin"**
3. Login (credentials auto-filled)

### 3.2 Import SQL File
1. Select your database from left sidebar
2. Click **"Import"** tab at top
3. Click **"Choose File"**
4. Select `database/setup.sql` from your computer
5. Click **"Go"** at bottom
6. Wait for success message

### 3.3 Verify Tables
1. Click on your database name
2. You should see 3 tables:
   - `contact_submissions`
   - `vc_consultations`
   - `admin_users`

---

## Step 4: Upload Website Files

### Option A: Using File Manager (Recommended for beginners)

#### 4.1 Access File Manager
1. In hPanel, go to **"Files"** → **"File Manager"**
2. Navigate to `public_html` folder
3. Delete default files (index.html, etc.)

#### 4.2 Upload Files
1. Click **"Upload Files"** button
2. Select ALL files from your `nayesha` folder
3. Upload everything (may take 5-10 minutes)
4. Wait for upload to complete

#### 4.3 Verify Structure
Your `public_html` should have:
```
public_html/
├── api/
│   ├── submit-contact.php
│   └── submit-vc-consultation.php
├── config/
│   └── database.php
├── database/
│   └── setup.sql
├── js/
│   └── form-handler.js
├── nayesha demo/
├── index.html
├── about.html
├── (all other HTML files)
├── (all image files)
└── .htaccess
```

### Option B: Using FTP (FileZilla)

#### 4.1 Get FTP Credentials
1. In hPanel, go to **"Files"** → **"FTP Accounts"**
2. Note down:
   - FTP Host: ftp.yourdomain.com
   - FTP Username: your username
   - FTP Password: your password
   - Port: 21

#### 4.2 Connect with FileZilla
1. Download FileZilla from https://filezilla-project.org
2. Open FileZilla
3. Enter FTP credentials
4. Click **"Quickconnect"**

#### 4.3 Upload Files
1. Navigate to `public_html` on right side (server)
2. Select your local `nayesha` folder on left side
3. Drag all files to `public_html`
4. Wait for upload to complete

---

## Step 5: Configure Database Connection

### 5.1 Edit database.php
1. In File Manager, navigate to `public_html/config/`
2. Right-click `database.php`
3. Click **"Edit"**
4. Update these lines:

```php
private $host = "localhost";  // Usually localhost on Hostinger
private $db_name = "u123456789_nayesha";  // Your actual database name
private $username = "u123456789_user";     // Your actual username
private $password = "your_strong_password"; // Your actual password
```

5. Click **"Save Changes"**

---

## Step 6: Configure Email Settings

### 6.1 Update Email Addresses
1. Edit `api/submit-contact.php`
2. Find line 62: `$to = "info@nayesha.com";`
3. Change to your actual email: `$to = "your-email@yourdomain.com";`
4. Save file

5. Edit `api/submit-vc-consultation.php`
6. Find line 62: `$to = "info@nayesha.com";`
7. Change to your actual email
8. Save file

### 6.2 Configure SMTP (Recommended)
For better email delivery, use Hostinger's SMTP:

1. In hPanel, go to **"Emails"**
2. Create email account: `noreply@yourdomain.com`
3. Note SMTP settings:
   - SMTP Host: smtp.hostinger.com
   - SMTP Port: 587
   - Username: noreply@yourdomain.com
   - Password: [email password]

4. Update PHP files to use SMTP (optional but recommended)

---

## Step 7: Update .htaccess for Production

### 7.1 Enable HTTPS Redirect
1. Edit `.htaccess` file
2. Uncomment these lines (remove #):

```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

3. Save file

---

## Step 8: Test Your Website

### 8.1 Access Your Website
1. Open browser
2. Go to: `https://yourdomain.com`
3. Website should load properly

### 8.2 Test Forms
1. Click **"Book Appointment"** button
2. Fill out the form
3. Submit
4. You should see success message
5. Check database in phpMyAdmin for the entry

6. Test **"Book Free VC Consultation"** form
7. Fill and submit
8. Verify in database

### 8.3 Check Email
1. Check your email inbox
2. You should receive notification emails
3. If not, check spam folder

---

## Step 9: SSL Certificate (HTTPS)

### 9.1 Enable Free SSL
1. In hPanel, go to **"Security"** → **"SSL"**
2. Find your domain
3. Click **"Install SSL"**
4. Select **"Free SSL"** (Let's Encrypt)
5. Click **"Install"**
6. Wait 5-10 minutes for activation

### 9.2 Force HTTPS
Already configured in .htaccess (Step 7)

---

## Step 10: Final Checks

### ✅ Checklist:
- [ ] Website loads at https://yourdomain.com
- [ ] All pages are accessible
- [ ] Images are loading properly
- [ ] Navigation menu works
- [ ] Contact form submits successfully
- [ ] VC Consultation form works
- [ ] Database receives submissions
- [ ] Email notifications are sent
- [ ] SSL certificate is active (green padlock)
- [ ] Mobile responsive design works

---

## Common Issues & Solutions

### Issue 1: Database Connection Failed
**Solution:**
- Verify database credentials in `config/database.php`
- Check database name has Hostinger prefix (u123456789_)
- Ensure database user has ALL PRIVILEGES

### Issue 2: Forms Not Submitting
**Solution:**
- Check browser console for JavaScript errors
- Verify `js/form-handler.js` is loaded
- Check API endpoints are accessible
- Review PHP error logs in hPanel

### Issue 3: Images Not Loading
**Solution:**
- Verify image files are uploaded
- Check file paths are correct
- Ensure file permissions are set to 644

### Issue 4: Email Not Sending
**Solution:**
- Configure SMTP instead of PHP mail()
- Check email address is correct
- Verify Hostinger email account exists
- Check spam folder

### Issue 5: 500 Internal Server Error
**Solution:**
- Check .htaccess syntax
- Review PHP error logs
- Verify file permissions (folders: 755, files: 644)
- Check PHP version compatibility

---

## Performance Optimization

### 1. Enable Caching
Add to .htaccess:
```apache
# Browser Caching
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

### 2. Enable Compression
Already configured in .htaccess

### 3. Optimize Images
- Use compressed images
- Consider WebP format
- Use lazy loading

---

## Security Recommendations

### 1. Change Admin Password
```sql
-- In phpMyAdmin, run:
UPDATE admin_users 
SET password = '$2y$10$YOUR_NEW_HASHED_PASSWORD' 
WHERE username = 'admin';
```

### 2. Secure config Directory
Add to `config/.htaccess`:
```apache
Order deny,allow
Deny from all
```

### 3. Regular Backups
1. In hPanel, go to **"Files"** → **"Backups"**
2. Create weekly backups
3. Download and store safely

### 4. Update PHP Version
1. In hPanel, go to **"Advanced"** → **"PHP Configuration"**
2. Select PHP 8.0 or higher
3. Save changes

---

## Monitoring & Maintenance

### 1. Check Form Submissions
- Login to phpMyAdmin regularly
- Review `contact_submissions` table
- Review `vc_consultations` table

### 2. Monitor Email Delivery
- Check email notifications are being sent
- Review bounce rates
- Update email settings if needed

### 3. Review Error Logs
1. In hPanel, go to **"Advanced"** → **"Error Logs"**
2. Check for PHP errors
3. Fix any issues found

---

## Support Contacts

### Hostinger Support
- Live Chat: Available 24/7 in hPanel
- Email: support@hostinger.com
- Knowledge Base: https://support.hostinger.com

### Website Support
- Email: info@nayesha.com
- Phone: +91 8454831188

---

## Post-Deployment Tasks

### 1. Google Search Console
1. Go to https://search.google.com/search-console
2. Add your website
3. Submit sitemap

### 2. Google Analytics
1. Create Google Analytics account
2. Add tracking code to all pages
3. Monitor traffic

### 3. Social Media
1. Update social media links
2. Share website launch
3. Add social media meta tags

---

## Congratulations! 🎉

Your Nayesha Healthcare website is now live on Hostinger!

**Website URL:** https://yourdomain.com

Remember to:
- Test all forms regularly
- Monitor database submissions
- Keep backups updated
- Update content as needed
- Respond to inquiries promptly

---

## Quick Reference

### Database Access
- phpMyAdmin: hPanel → Databases → phpMyAdmin
- Tables: contact_submissions, vc_consultations, admin_users

### File Access
- File Manager: hPanel → Files → File Manager
- FTP: Use FileZilla with credentials from hPanel

### Email Configuration
- Email Accounts: hPanel → Emails
- SMTP: smtp.hostinger.com:587

### SSL Certificate
- SSL Management: hPanel → Security → SSL
- Force HTTPS: Enabled in .htaccess

---

**Need Help?** Contact Hostinger support 24/7 or refer to this guide!
