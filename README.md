# Student Management System

A comprehensive web-based Student Management System built with PHP, MySQL, and Tailwind CSS. This application allows you to manage student information efficiently with a clean, modern user interface.

## 📋 Features

### Core CRUD Operations
- ✅ **Create** - Add new students with full details
- ✅ **Read** - View all students in an organized table with dynamic data
- ✅ **Update** - Edit existing student information
- ✅ **Delete** - Remove students with confirmation popup

### Student Information Tracked
- Student Name
- Email Address
- Phone Number
- Enrollment Status (Active, On Leave, Graduated, Inactive)
- Timestamp for creation and last update

<!-- ### User Experience Features
- 🎨 **Responsive Design** - Works seamlessly on desktop, tablet, and mobile devices
- ✨ **Success Messages** - Green notifications with auto-dismiss (4 seconds) on successful operations
- ⚠️ **Error Handling** - Red error messages for validation failures
- 🗑️ **Delete Confirmation** - JavaScript popup confirming deletion with student name
- 🏷️ **Status Badges** - Color-coded status indicators (Green for Active, Yellow for On Leave, Blue for Graduated, Red for Inactive)
- ⚡ **Fast Performance** - Optimized database queries with prepared statements
- 🔍 **Search Functionality** - Search students by name, email, or phone number
- 🎯 **Filter by Status** - Filter students by enrollment status (Active, On Leave, Graduated, Inactive) -->

### Security Features
- SQL Injection Prevention - Using prepared statements
- Email Validation - Built-in email format verification
- Required Field Validation - All fields must be filled
- Unique Email Constraint - Prevents duplicate email entries in database

## 🏗️ Project Structure

```
Student-Management-Project/
├── config/
│   └── db.php              # Database connection configuration
├── api/
│   ├── create.php          # Handle student creation
│   ├── read.php            # Retrieve student data
│   ├── update.php          # Handle student updates
│   └── delete.php          # Handle student deletion
├── index.php               # Dashboard - view all students
├── create.php              # Form to add new student
├── edit.php                # Form to edit student
├── database.sql            # Database schema and sample data
└── README.md              # This file
```

## 🛠️ Prerequisites

- PHP 7.0+
- MySQL 5.7+
- Web Server (Apache, Nginx, etc.)
- XAMPP/WAMP/LAMP Stack (for local development)

## 📦 Installation

### 1. Clone or Download Project
```bash
# Download the project files to your web server directory
# For XAMPP: C:\xampp\htdocs\Student-Management-Project
# For WAMP: C:\wamp64\www\Student-Management-Project
```

### 2. Create Database
```bash
# Option 1: Using phpMyAdmin
# 1. Open http://localhost/phpmyadmin
# 2. Create new database named 'student_crud'
# 3. Click on the database and go to "Import" tab
# 4. Upload the students.sql file

# Option 2: Using MySQL Command Line
mysql -u root -p < database.sql
```

### 3. Update Database Configuration
Edit `config/db.php` and update credentials if needed:
```php
$host = "localhost";      // Database host
$user = "root";           // MySQL username
$pass = "";               // MySQL password (empty for default)
$db   = "student_crud";   // Database name
```

### 4. Start Web Server
```bash
# If using XAMPP
# Start Apache and MySQL from XAMPP Control Panel

# If using PHP built-in server
php -S localhost:8000
```

### 5. Access Application
Open your browser and navigate to:
```
http://localhost/Student-Management-Project
```

## 🚀 Usage

### View All Students
- Navigate to the **Student List** page (home page)
- View all enrolled students in a table format
- See student details: Name, Email, Phone, Status

### Search and Filter Students
1. Use the **Search Bar** at the top to find students by:
   - Student Name
   - Email Address
   - Phone Number
2. Use the **Status Filter** dropdown to filter by enrollment status:
   - All Status (default)
   - Active
   - On Leave
   - Graduated
   - Inactive
3. Click **"Search"** to apply filters
4. Click **"Reset"** to clear all filters and view all students
5. Search and filters can be combined for more specific results

### Add New Student
1. Click the **"Add Student"** button on the dashboard
2. Fill in the student information:
   - Name (required)
   - Email (required, must be valid)
   - Phone Number (required)
   - Enrollment Status (dropdown)
3. Click **"Add Student"** button
4. Success message will display and auto-dismiss after 4 seconds

### Edit Student
1. Click the **"Edit"** link in the student row
2. Update the desired information
3. Click **"Save Changes"** button
4. Success message confirms the update

### Delete Student
1. Click the **"Delete"** link in the student row
2. Confirmation popup appears with the student's name
3. Click **"OK"** to confirm deletion
4. Student is removed from the database
5. Success message confirms deletion

## 📊 Database Schema

### Students Table
```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    status ENUM('Active', 'On Leave', 'Graduated', 'Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## 🎨 Status Badge Colors

| Status | Color | Hex Code |
|--------|-------|----------|
| Active | Green | #10b981 |
| On Leave | Yellow | #f59e0b |
| Graduated | Blue | #3b82f6 |
| Inactive | Red | #ef4444 |

## 🔐 Security Considerations

- **Prepared Statements** - All database queries use parameterized queries to prevent SQL injection
- **Input Validation** - Email format validation and required field checks
- **Session Management** - Uses PHP sessions for message handling
- **HTTPS Recommended** - Use HTTPS in production environments
- **Database Backup** - Regularly backup your `student_crud` database


## 📱 Responsive Design

The application is fully responsive and works on:
- 📱 Mobile devices (320px and up)
- 📱 Tablets (768px and up)
- 💻 Desktop computers (1024px and up)

## 🔄 Version History

- **v1.1.0** (Feb 2026) - Added search and filter functionality
- **v1.0.0** (Feb 2026) - Initial release with full CRUD functionality

## 📄 License

This project is provided as-is for educational purposes.

## 👨‍💻 Technologies Used

- **Backend:** PHP 7.0+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, CSS3, Tailwind CSS
- **Icons:** SVG
- **Design Pattern:** MVC (Model-View-Controller)

## 📞 Support

For issues or questions, please check the troubleshooting section or verify:
- Database connection settings
- File permissions
- PHP version compatibility
- MySQL server status

## 🎯 Future Enhancements

Potential features for future versions:
- ✅ ~~Student search and filter functionality~~ (Completed in v1.1.0)
- Bulk import/export students
- Student attendance tracking
- Grade management
- Email notifications
- User authentication and roles
- Dashboard analytics
- Advanced reporting

---

**Created:** February 2026  
**Last Updated:** February 2026
