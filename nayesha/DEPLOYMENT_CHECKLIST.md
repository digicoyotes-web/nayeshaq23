# 🚀 Hostinger Deployment Checklist

## Pre-Deployment (Do Before Upload)

### ✅ Files Ready
- [ ] All HTML files are present
- [ ] All images are uploaded
- [ ] PHP files are configured
- [ ] JavaScript files are included
- [ ] CSS files are linked

### ✅ Configuration Files
- [ ] `config/database.php` - Ready to update with Hostinger credentials
- [ ] `api/submit-contact.php` - Email address updated
- [ ] `api/submit-vc-consultation.php` - Email address updated
- [ ] `.htaccess` - HTTPS redirect ready

---

## Hostinger Setup (Do on Hostinger)

### ✅ Database Setup
- [ ] MySQL database created
- [ ] Database user created
- [ ] User added to database with ALL PRIVILEGES
- [ ] Database credentials noted down
- [ ] SQL file imported via phpMyAdmin
- [ ] 3 tables verified (contact_submissions, vc_consultations, admin_users)

### ✅ File Upload
- [ ] All files uploaded to `public_html`
- [ ] Folder structure is correct
- [ ] File permissions set (folders: 755, files: 644)
- [ ] `.htaccess` file uploaded

### ✅ Configuration
- [ ] `config/database.php` updated with Hostinger credentials
- [ ] Email addresses updated in API files
- [ ] Domain name configured
- [ ] SSL certificate installed

---

## Testing (Do After Upload)

### ✅ Website Access
- [ ] Website loads at https://yourdomain.com
- [ ] All pages are accessible
- [ ] No 404 errors
- [ ] Images load properly
- [ ] CSS styles applied correctly

### ✅ Navigation
- [ ] Home page works
- [ ] About Us page works
- [ ] Services dropdown works
- [ ] All hospital project pages work
- [ ] Achievement page works
- [ ] FAQs page works
- [ ] Blog page works

### ✅ Forms Testing
- [ ] "Book Appointment" modal opens
- [ ] Contact form submits successfully
- [ ] Success message displays
- [ ] Data saved in database (check phpMyAdmin)
- [ ] Email notification received

- [ ] "Book Free VC Consultation" modal opens
- [ ] VC form submits successfully
- [ ] Success message displays
- [ ] Data saved in database
- [ ] Email notification received

### ✅ Mobile Testing
- [ ] Website responsive on mobile
- [ ] Forms work on mobile
- [ ] Navigation menu works on mobile
- [ ] Images scale properly

### ✅ Security
- [ ] HTTPS enabled (green padlock)
- [ ] SSL certificate active
- [ ] Database connection secure
- [ ] Admin password changed
- [ ] Error messages don't reveal sensitive info

---

## Post-Deployment

### ✅ SEO & Analytics
- [ ] Google Search Console setup
- [ ] Google Analytics installed
- [ ] Sitemap submitted
- [ ] Meta tags added

### ✅ Performance
- [ ] Page load speed tested
- [ ] Images optimized
- [ ] Caching enabled
- [ ] Compression enabled

### ✅ Monitoring
- [ ] Error logs checked
- [ ] Form submissions monitored
- [ ] Email delivery verified
- [ ] Backup schedule set

---

## Quick Reference

### Hostinger Login
- URL: https://www.hostinger.com
- Username: [your username]
- Password: [your password]

### Database Details
- Host: localhost
- Database: u123456789_nayesha
- Username: u123456789_user
- Password: [your password]

### FTP Details
- Host: ftp.yourdomain.com
- Username: [your username]
- Password: [your password]
- Port: 21

### Email Configuration
- SMTP Host: smtp.hostinger.com
- SMTP Port: 587
- Email: noreply@yourdomain.com

---

## Emergency Contacts

### Hostinger Support
- Live Chat: 24/7 in hPanel
- Email: support@hostinger.com

### Website Support
- Email: info@nayesha.in
- Phone: +91 8454831188

---

## Common Commands

### Check PHP Version
```php
<?php phpinfo(); ?>
```

### Test Database Connection
```php
<?php
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();
echo $db ? "Connected!" : "Failed!";
?>
```

### Clear Cache
In hPanel: Advanced → Clear Cache

---

## Troubleshooting Quick Fixes

### Website Not Loading
1. Check domain DNS settings
2. Clear browser cache
3. Check .htaccess syntax

### Forms Not Working
1. Check browser console
2. Verify API endpoints
3. Check database connection
4. Review PHP error logs

### Email Not Sending
1. Verify email address
2. Check spam folder
3. Configure SMTP
4. Test with different email

---

**Status:** Ready for Deployment ✅

**Last Updated:** April 28, 2026

**Deployment Date:** _____________

**Deployed By:** _____________

---

## Notes

_Add any deployment notes here:_

---

**🎉 Good luck with your deployment!**
