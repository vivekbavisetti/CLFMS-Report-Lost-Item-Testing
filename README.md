
# Campus Lost and Found Management System (CLFMS)

## Project Overview
The Campus Lost and Found Management System helps users report items lost on campus and view submitted reports.

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

## Features
- Lost-item reporting form
- Required-field validation
- Server-side input validation
- MySQL database integration
- Display of submitted lost-item reports
- Responsive page styling

## Local Setup
1. Install and open XAMPP.
2. Start Apache and MySQL.
3. Create a database named `clfms`.
4. Create the `lost_items` table using the project database schema.
5. Place the project folder inside `C:\xampp\htdocs\CLFMS`.
6. Open `http://localhost/CLFMS/report_lost_item.php`.

## Testing
The Report Lost Item module was tested using Selenium IDE. Test activities included valid report submission and required-field validation. Successful submission was also verified in phpMyAdmin.

## Scope
This is a student project prototype. Configure database credentials securely before deploying it outside a local development environment.
