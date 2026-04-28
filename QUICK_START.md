# 🚀 Quick Start - Deploy to Hostinger in 30 Minutes

## What You Need
- ✅ Hostinger account
- ✅ Domain name
- ✅ All website files (already in this folder)

---

## 5 Simple Steps

### Step 1: Create Database (5 minutes)
1. Login to Hostinger → Go to hPanel
2. Click **"Databases"** → **"MySQL Databases"**
3. Create new database: `nayesha_healthcare`
4. Create user and add to database
5. **Write down:** Database name, username, password

### Step 2: Import Database (3 minutes)
1. Click **"phpMyAdmin"** in Databases section
2. Select your database
3. Click **"Import"** tab
4. Upload file: `database/setup.sql`
5. Click **"Go"**

### Step 3: Upload Files (10 minutes)
1. Go to **"Files"** → **"File Manager"**
2. Open `public_html` folder
3. Delete default files
4. Click **"Upload"**
5. Upload ALL files from `nayesha` folder
6. Wait for upload to complete

### Step 4: Configure Database (5 minutes)
1. In File Manager, open `config/database.php`
2. Click **"Edit"**
3. Update these 4 lines:
   ```php
   private $db_name = "u123456789_nayesha";  // Your database name
   private $username = "u123456789_user";     // Your username
   private $password = "your_password";       // Your password
   ```
4. Save file

### Step 5: Test Website (5 minutes)
1. Open: `https://yourdomain.com`
2. Click **"Book Appointment"**
3. Fill and submit form
4. Check database in phpMyAdmin
5. ✅ Done!

---

## Optional: Enable SSL (2 minutes)
1. Go to **"Security"** → **"SSL"**
2. Click **"Install SSL"**
3. Select **"Free SSL"**
4. Wait 5-10 minutes

---

## Need Help?
- 📖 Full Guide: Read `HOSTINGER_DEPLOYMENT_GUIDE.md`
- ✅ Checklist: Use `DEPLOYMENT_CHECKLIST.md`
- 🧪 Test: Upload `test-connection.php` and visit it
- 💬 Support: Hostinger Live Chat (24/7)

---

## Troubleshooting

### Database Connection Failed?
- Check credentials in `config/database.php`
- Verify database name has prefix (u123456789_)

### Forms Not Working?
- Check browser console (F12)
- Verify `js/form-handler.js` is uploaded
- Test with `test-connection.php`

### Images Not Loading?
- Verify all image files are uploaded
- Check file paths are correct

---

## After Deployment

### Update Email Addresses
1. Edit `api/submit-contact.php` (line 62)
2. Edit `api/submit-vc-consultation.php` (line 62)
3. Change to your actual email

### Security
- Delete `test-connection.php` after testing
- Change admin password in database
- Enable HTTPS

---

## 🎉 That's It!

Your website is now live at: **https://yourdomain.com**

**Total Time:** ~30 minutes

---

## Quick Links

- 📁 **GitHub:** https://github.com/digicoyotes-web/nayeshaq23
- 🌐 **Hostinger:** https://www.hostinger.com
- 📧 **Support:** info@nayesha.com
- 📞 **Phone:** +91 8454831188

---

**Good luck with your deployment! 🚀**
