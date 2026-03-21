# 🚗 Vehicle Management System

## 📌 Project Overview

This project is a **Vehicle Management System** developed using **PHP, MySQL, HTML, and CSS**.
It allows users to **add, edit, delete, and manage vehicle records** through a simple web interface.

The system demonstrates backend integration with a database along with frontend design.

---

## 🚀 Features

* ✅ Add new vehicle records
* ✅ Edit existing vehicle details
* ✅ Delete vehicle entries
* ✅ View all vehicles
* ✅ Form validation (edit_validation.php)
* ✅ Database connection using PHP
* ✅ Reusable layout components (header/footer)

---

## 🛠️ Technologies Used

* PHP
* MySQL
* HTML5
* CSS3

---

## 📂 Project Structure

```id="kq1w8f"
webtechproject/
│── main.php                # Homepage / Dashboard
│── layout.php              # Main layout structure
│── footer.php              # Footer component
│
│── connect.php             # Database connection setup
│── db.php                  # Database configuration
│── dbcreate.php            # Create database
│── createtable.php         # Create tables
│
│── categories.php          # Vehicle categories handling
│
│── vehicle_form.php        # Form UI for vehicles
│── vehicle_add.php         # Add vehicle
│── vehicle_edit.php        # Edit vehicle
│── vehicle_delete.php      # Delete vehicle
│── edit_validation.php     # Validation logic
│
│── style.css               # Styling file
```

---

## ⚙️ How It Works

1. Database is created using `dbcreate.php`
2. Tables are created using `createtable.php`
3. User interacts with the UI via `main.php`
4. CRUD operations handled by:

   * Add → `vehicle_add.php`
   * Edit → `vehicle_edit.php`
   * Delete → `vehicle_delete.php`

---

## 🔧 How to Run the Project

1. Install a local server like:

   * XAMPP / WAMP / MAMP
2. Place project folder inside `htdocs`
3. Start Apache and MySQL
4. Run in browser:

   ```
   http://localhost/webtechproject/main.php
   ```
5. First run:

   * `dbcreate.php`
   * `createtable.php`

---

## 🎯 Learning Objectives

* Understand PHP CRUD operations
* Connect PHP with MySQL database
* Handle form validation
* Organize reusable components (layout, footer)
* Build dynamic web applications

---

## 🌐 Future Improvements

* Add login/authentication system
* Improve UI/UX design
* Add search & filter functionality
* Convert into full MVC structure

---

## 📄 License

This project is for educational purposes only.
