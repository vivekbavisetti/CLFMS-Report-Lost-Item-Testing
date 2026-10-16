# CLFMS Configuration Guide

## 1. Local Environment

The project runs locally using XAMPP.

- **Web server:** Apache
- **Database server:** MySQL
- **Backend:** PHP
- **Database name:** `clfms`
- **Main table:** `lost_items`

## 2. Database Connection

The connection settings are defined in `db.php`.

| Setting | Local development value |
|---|---|
| Host | `localhost` |
| Username | `root` |
| Password | Empty by default in a standard local XAMPP setup |
| Database | `clfms` |

These are local development settings. Use secure credentials if deploying the project to a server.

## 3. Database Setup

1. Start Apache and MySQL in the XAMPP Control Panel.
2. Open `http://localhost/phpmyadmin/`.
3. Import `database.sql`.
4. Confirm that the `lost_items` table exists under the `clfms` database.

## 4. Run the Application

Open the following URL in a browser:

`http://localhost/CLFMS/report_lost_item.php`

## 5. Troubleshooting

- **Database connection error:** Confirm that MySQL is running and the settings in `db.php` are correct.
- **Page not found:** Confirm that the project is inside `C:\xampp\htdocs\CLFMS`.
- **Database or table missing:** Import `database.sql` through phpMyAdmin.
- **CSS not loading:** Confirm that `style.css` is in the project folder and the browser can access it.

## Security Note

Do not commit real passwords, private keys, or production credentials to a public repository. The configuration in this guide is intended for local development.
