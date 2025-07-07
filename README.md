# Feedback Collector

A simple PHP + MySQL project to collect user feedback through a web form and store it in a database.  
It also provides an admin page to view all submitted feedbacks.

## 🌐 Features

- Collects name, email, rating (1–5), and optional comment
- Validates inputs (required fields, valid email, rating range)
- Saves data securely using prepared statements (PDO)
- Displays a confirmation or error message after submission
- Includes an admin page to view all feedback entries

## 📁 Project Structure
```
feedback-collector/
│
├── index.html # Feedback form page
├── process.php # Handles form submission & validation
├── admin.php # Admin panel to display feedbacks
├── database.php # Database connection file (excluded from GitHub)
├── .gitignore # Prevents database.php from being tracked
└── README.md # Project description (this file)
```

## 🛠️ Setup Instructions

1. **Create a MySQL database** (e.g. `feedback_db`)
2. **Create the `feedbacks` table** using this SQL:

```sql
CREATE TABLE feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    rating INT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
3. **Edit database.php with your database credentials:**
```php
$host = 'localhost';
$db   = 'feedback_db';
$user = 'root';
$pass = ''; // Your MySQL password
```
4. **Open index.html in a local PHP server (XAMPP, MAMP, etc.)**   
5. ** Visit admin.php to see submitted feedback.**

⚠️ Security Tip

Make sure to exclude database.php using .gitignore to avoid exposing sensitive database information.
📄 License

This project is released into the public domain.
You are free to use, modify, distribute, or publish it for any purpose, with or without credit.

No rights reserved.
