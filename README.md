WCFT Coding Challenge — Neuromodulation Form

This project was created as part of The Walton Centre NHS Foundation Trust Coding Challenge.

It is a simple PHP-based application that allows a user to complete a *Neuromodulation form* and calculates a total pain score automatically.  
An Admin view is provided to view, edit, and delete patient form submissions.

Technologies Used
1.	PHP 8+ (No framework)
2.	Microsoft SQL Server Express
3.	jQuery for DOM handling and score calculation
4.	Bootstrap 5 for UI
5.	IIS as the web server
6.	Git / GitHub for version control
7.	Stored Procedures for all CRUD (Create, Read, Update, Delete)
Folder Structure



wcft_form/
│
├── Database/
│   ├── create_tables.sql
│   ├── sp_insert_form.sql
│   ├── sp_get_forms.sql
│   ├── sp_get_formbyid.sql
│   ├── sp_update_form.sql
│   └── sp_delete_form.sql
│
├── config/
│   └── db.php
│
├── index.php          # Main Neuromodulation form
├── save_form.php      # Insert form data
├── admin.php          # Admin table view
├── view.php           # Read-only single form view
├── edit.php           # Edit form
├── update_form.php    # Update form data
├── delete.php         # Delete record
└── README.md

Setup Instructions

1️⃣ Install Required Tools
- IIS Web Server
  - Enable via *Windows Features → Internet Information Services*
- PHP 8+
  - Download from [https://windows.php.net/download/](https://windows.php.net/download/)
  - Add PHP to system PATH  
  - Configure PHP handler in IIS (`*.php → php-cgi.exe`)
- SQL Server Express + SSMS
  - Download from Microsoft’s website  
  - Install and note your instance name (usually `localhost\SQLEXPRESS`)
- PHP SQLSRV Driver
  - Copy `php_sqlsrv.dll` and `php_pdo_sqlsrv.dll` to your PHP `ext` folder
  - Add to `php.ini`:
    ```
    extension=php_sqlsrv.dll
    extension=php_pdo_sqlsrv.dll
    ```
  - Restart IIS
 2️⃣ Database Setup
1. Open SQL Server Management Studio (SSMS)
2. Create a new database:
   ```sql
   CREATE DATABASE WCFT_DB;
   USE WCFT_DB;
   ```
3. Run all scripts inside the `/Database` folder:
  

This creates the `NeuromodulationForms` table and all stored procedures.

3️⃣ Configure Database Connection
Edit `config/db.php` with your credentials:
```php
<?php
$serverName = "localhost\\SQLEXPRESS";
$connectionOptions = [
    "Database" => "WCFT_DB",
    "Uid" => "sa",
    "PWD" => "your_password"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) die(print_r(sqlsrv_errors(), true));
?>

✅ Form Page  
- Enter patient details  
- Age auto-calculates from DOB  
- Total Score auto-calculates as questions are answered  
- Submit → redirects to admin page

✅ Admin Page  
- Lists all submissions  
- Click any record to view, edit, or delete  


 Key Design Decisions
- Used stored procedures for all database operations (secure and maintainable)
- Used plain PHP (no frameworks) for transparency
- Used Bootstrap + jQuery for responsive UI and dynamic total score
- Used relative paths and avoided hardcoded links
- Modular file separation for clarity (each PHP file has one purpose)

---

