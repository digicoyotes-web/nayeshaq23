# Nayesha Healthcare Website

> Professional healthcare consultancy website with database integration and form management

![Nayesha Healthcare](Trust%20&%20Legacy%20Focus.webp)

## 🌟 Features

- ✅ **7 Dedicated Hospital Project Pages** with image galleries
- ✅ **Database Integration** for form submissions
- ✅ **AJAX Form Handling** with real-time validation
- ✅ **Email Notifications** on form submissions
- ✅ **Responsive Design** - Mobile, Tablet, Desktop
- ✅ **SEO Optimized** with proper meta tags
- ✅ **Security Features** - SQL injection prevention, XSS protection
- ✅ **Production Ready** for Hostinger deployment

---

## 📋 Table of Contents

- [Features](#features)
- [Hospital Project Pages](#hospital-project-pages)
- [Technology Stack](#technology-stack)
- [Quick Start](#quick-start)
- [Deployment](#deployment)
- [Database Structure](#database-structure)
- [API Endpoints](#api-endpoints)
- [File Structure](#file-structure)
- [Support](#support)

---

## 🏥 Hospital Project Pages

1. **Shree Hospital, Karad** - 100+ bed multi-specialty hospital
2. **Revival Hospital, Thane** - 80+ bed healthcare facility
3. **Dhule Clinic** - Specialized outpatient services
4. **New Life Hospital** - 120+ bed modern facility
5. **Shree Swami Samarth Prathishthan** - Community healthcare
6. **Lions Club Alibaug** - Community health initiative
7. **ACT Raj Hospital, Parali** - 70+ bed facility

Each page includes:
- Professional hero section
- Project overview cards
- Featured image gallery (masonry layout)
- Additional gallery grid
- Highlights and statistics
- Call-to-action section

---

## 💻 Technology Stack

### Frontend
- HTML5
- CSS3 (Bootstrap 5.3)
- JavaScript (ES6+)
- Font Awesome Icons
- Google Fonts

### Backend
- PHP 7.4+
- MySQL 5.7+
- PDO for database operations

### Features
- AJAX form submissions
- Real-time validation
- Email notifications
- Responsive design
- SEO optimization

---

## 🚀 Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Hostinger hosting account (for deployment)

### Local Development

1. **Clone Repository**
   ```bash
   git clone https://github.com/digicoyotes-web/nayeshaq23.git
   cd nayeshaq23/nayesha
   ```

2. **Setup Database**
   ```bash
   # Import SQL file
   mysql -u root -p < database/setup.sql
   ```

3. **Configure Database**
   ```php
   // Edit config/database.php
   private $host = "localhost";
   private $db_name = "nayesha_healthcare";
   private $username = "root";
   private $password = "your_password";
   ```

4. **Start Server**
   ```bash
   php -S localhost:8000
   ```

5. **Open Browser**
   ```
   http://localhost:8000
   ```

---

## 🌐 Deployment to Hostinger

### Quick Deployment (30 minutes)

See **[QUICK_START.md](QUICK_START.md)** for 5-step deployment guide.

### Detailed Deployment

See **[HOSTINGER_DEPLOYMENT_GUIDE.md](HOSTINGER_DEPLOYMENT_GUIDE.md)** for complete instructions including:
- Database setup
- File upload (File Manager & FTP)
- Configuration
- SSL certificate
- Email setup
- Testing procedures
- Troubleshooting

### Deployment Checklist

Use **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)** to track your deployment progress.

---

## 🗄️ Database Structure

### Tables

#### 1. contact_submissions
Stores "Book Appointment" form submissions
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- full_name (VARCHAR 255)
- phone_number (VARCHAR 20)
- email (VARCHAR 255)
- message (TEXT)
- submission_type (VARCHAR 50)
- created_at (TIMESTAMP)
- status (VARCHAR 20)
```

#### 2. vc_consultations
Stores "Book Free VC Consultation" submissions
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- full_name (VARCHAR 255)
- phone_number (VARCHAR 20)
- email (VARCHAR 255)
- hospital_organization (VARCHAR 255)
- preferred_date (DATE)
- message (TEXT)
- created_at (TIMESTAMP)
- status (VARCHAR 20)
```

#### 3. admin_users
Admin panel users (future use)
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- username (VARCHAR 100)
- password (VARCHAR 255)
- email (VARCHAR 255)
- created_at (TIMESTAMP)
- last_login (TIMESTAMP)
- is_active (BOOLEAN)
```

---

## 🔌 API Endpoints

### Contact Form Submission
```
POST /api/submit-contact.php

Parameters:
- full_name (required)
- phone_number (required)
- email (required)
- message (optional)

Response:
{
  "success": true,
  "message": "Thank you! Your appointment request has been submitted."
}
```

### VC Consultation Submission
```
POST /api/submit-vc-consultation.php

Parameters:
- full_name (required)
- phone_number (required)
- email (required)
- hospital_organization (optional)
- preferred_date (optional)
- message (optional)

Response:
{
  "success": true,
  "message": "Thank you! Your VC consultation request has been submitted."
}
```

---

## 📁 File Structure

```
nayesha/
├── api/
│   ├── submit-contact.php
│   └── submit-vc-consultation.php
├── config/
│   ├── database.php
│   └── config.production.php
├── database/
│   └── setup.sql
├── js/
│   └── form-handler.js
├── nayesha demo/
├── index.html
├── about.html
├── shree-hospital-karad.html
├── revival-hospital-thane.html
├── dhule-clinic.html
├── new-life-hospital.html
├── shree-swami-samarth.html
├── lions-club-alibaug.html
├── act-raj-hospital-parali.html
├── (other HTML files)
├── (image files)
├── .htaccess
├── test-connection.php
├── README.md
├── QUICK_START.md
├── HOSTINGER_DEPLOYMENT_GUIDE.md
├── DEPLOYMENT_CHECKLIST.md
└── DATABASE_SETUP.md
```

---

## 🧪 Testing

### Test Database Connection
1. Upload `test-connection.php` to your server
2. Visit: `https://yourdomain.com/test-connection.php`
3. Check all tests pass
4. **Delete file after testing!**

### Test Forms
1. Open website
2. Click "Book Appointment"
3. Fill and submit form
4. Check database in phpMyAdmin
5. Verify email notification received

---

## 🔒 Security Features

- ✅ SQL Injection Prevention (PDO prepared statements)
- ✅ XSS Protection (input sanitization)
- ✅ CSRF Protection ready
- ✅ Secure password hashing (bcrypt)
- ✅ Input validation (client & server-side)
- ✅ Error logging (production mode)
- ✅ HTTPS enforcement
- ✅ Security headers (.htaccess)

---

## 📊 Performance

- ✅ Browser caching enabled
- ✅ Gzip compression
- ✅ Optimized images
- ✅ Minified CSS/JS (production)
- ✅ Lazy loading ready

---

## 🌍 Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers

---

## 📱 Responsive Design

- ✅ Mobile (320px - 767px)
- ✅ Tablet (768px - 1024px)
- ✅ Desktop (1025px+)
- ✅ Large screens (1920px+)

---

## 🛠️ Maintenance

### Regular Tasks
- Check form submissions daily
- Monitor error logs weekly
- Backup database weekly
- Update content as needed
- Review security monthly

### Monitoring
- Form submission rate
- Email delivery rate
- Page load speed
- Error logs
- Database size

---

## 📞 Support

### Website Support
- **Email:** info@nayesha.com
- **Phone:** +91 8454831188
- **Address:** Office 14, 2nd Floor, Hiranandani Crystal Plaza, Plot no 18/27, Sector 07, Kharghar, Panvel, Maharashtra 410210

### Hostinger Support
- **Live Chat:** 24/7 in hPanel
- **Email:** support@hostinger.com
- **Knowledge Base:** https://support.hostinger.com

### GitHub
- **Repository:** https://github.com/digicoyotes-web/nayeshaq23
- **Issues:** Report bugs or request features

---

## 📝 License

© 2026 Nayesha Healthcare Pvt. Ltd. All Rights Reserved.

---

## 🙏 Acknowledgments

- Bootstrap 5 for responsive framework
- Font Awesome for icons
- Unsplash for placeholder images
- Hostinger for hosting platform

---

## 📈 Changelog

### Version 1.0.0 (April 28, 2026)
- ✅ Initial release
- ✅ 7 hospital project pages
- ✅ Database integration
- ✅ Form handling system
- ✅ Email notifications
- ✅ Hostinger deployment ready

---

## 🚀 Future Enhancements

- [ ] Admin panel for managing submissions
- [ ] Email templates customization
- [ ] SMS notifications
- [ ] Multi-language support
- [ ] Blog system
- [ ] Patient testimonials section
- [ ] Online appointment booking system
- [ ] Payment gateway integration

---

## 👥 Contributors

- **Development Team:** Nayesha Healthcare IT Team
- **Design:** Nayesha Healthcare Design Team
- **Content:** Nayesha Healthcare Content Team

---

## 📞 Contact

For any queries or support:

**Nayesha Healthcare Pvt. Ltd.**
- 🌐 Website: https://yourdomain.com
- 📧 Email: info@nayesha.com
- 📱 Phone: +91 8454831188
- 📍 Location: Kharghar, Navi Mumbai, Maharashtra

---

**Made with ❤️ by Nayesha Healthcare Team**

---

## ⭐ Star Us!

If you find this project useful, please give it a star on GitHub!

[![GitHub stars](https://img.shields.io/github/stars/digicoyotes-web/nayeshaq23?style=social)](https://github.com/digicoyotes-web/nayeshaq23)

---

**Last Updated:** April 28, 2026
