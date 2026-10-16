# Campus Lost and Found Management System (CLFMS)

<<<<<<< HEAD
## Project Overview
The Campus Lost and Found Management System helps users report items lost on campus and view submitted report.

## Module Developed
**Report Lost Item**

Users can submit a lost-item report with the item name, category, description, date lost, and location. The application validates required fields and stores valid reports in a MySQL database.

## Technologies Used
- HTML5
- CSS3
- PHP
- MySQL
- XAMPP
- Selenium IDE
=======
A web-based application module for reporting and viewing items lost on campus.
>>>>>>> 7e7ee24 (docs: improve project documentation)

## Features

- Report a lost item with its name, category, description, date, and location.
- Validate required fields and the lost date.
- Store submitted reports in a MySQL database.
- Display previously reported lost items.
- Show success and error messages.
- Use responsive styling for different screen sizes.

## Technology Stack

- **Frontend:** HTML5, CSS3
- **Backend:** PHP
- **Database:** MySQL
- **Local Environment:** XAMPP
- **Functional Testing:** Selenium IDE

## Project Structure

```text
CLFMS/
├── .gitignore
├── README.md
├── database.sql
├── db.php
├── report_lost_item.php
├── style.css
└── test_db.php
```

## Prerequisites

- XAMPP with Apache and MySQL
- A web browser
- Visual Studio Code (optional)

## Setup Instructions

1. Install and start Apache and MySQL in XAMPP.
2. Place the project folder inside `C:\xampp\htdocs\`.
3. Open phpMyAdmin at `http://localhost/phpmyadmin/`.
4. Import `database.sql` to create the database and table.
5. Check the database credentials in `db.php`.
6. Open `http://localhost/CLFMS/report_lost_item.php` in your browser.

## Database

The application uses the `clfms` database and the `lost_items` table to store submitted reports.

## Testing

The Report Lost Item module was tested using Selenium IDE. The valid-submission test checks the success message, and database records were inspected through phpMyAdmin.

Record actual test outcomes and screenshots in the accompanying software testing report.

## Scope and Limitations

This is a learning and testing project focused on the Report Lost Item module. Authentication, item claiming, and administrative workflows are outside the current implementation.

## Author

Developed as a Software Engineering practical project.
