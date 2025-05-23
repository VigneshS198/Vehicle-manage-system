# Vehicle Management System

The **Vehicle Management System** is a role-based web application designed to streamline the monitoring and management of vehicle entries, exits, and related operations within a controlled environment, such as a residential complex or concession building.

## User Roles

This system supports **four distinct user roles**, each with tailored access and functionality:

- **Super Admin**
  - Full control over the system.
  - Manages all users, system configurations, and permissions.

- **Admin**
  - Oversees daily operations.
  - Adds and views purchase records, manages vehicle check-ins/outs, views activity reports, and maintains logs.

- **Security Guard**
  - Logs vehicle entries and exits in real-time.
  - Accesses a dashboard for current vehicle statuses and details.
  - Verifies and flags vehicle information if necessary.

- **Shopkeeper**
  - Creates purchase entries related to their deliveries.
  - Tracks vendor vehicles and accesses relevant reports.

## Features

- Built on **CodeIgniter 4** using MVC architecture.
- **Real-Time Dashboard Views**
- **Search and Filter Options**
- **Detailed Logs and Reports**
- **Notifications & Alerts**
- **Responsive UI**

## System Requirements

Ensure your environment includes:

- PHP 8.2 or higher
- MySQL 5.0 or higher
- Composer (PHP dependency manager)

## Installation Guide

### 1. Download and Extract
- Unzip the project files into your web server directory (`htdocs/`, `www/`, etc.).
- Create and configure the `.env` file.

### 2. Navigate to the Project
```bash
cd path_to_project_folder
```

### 3. Start the Local Server
```bash
php spark serve
```

### 4. Access the Installer
Open your browser and go to:
```
http://localhost:8080/install
```

### 5. Run the Installation
Click **Install** to:
- Execute database migrations
- Complete initial setup

### 6. Login to the System
Visit:
```
http://localhost:8080/login
```

Use the default credentials below:

| Role          | Username    | Password  |
|---------------|-------------|-----------|
| Super Admin   | superadmin  | password  |
| Admin         | adminuser   | password  |
| Shop Keeper   | user        | password  |
| Security Guard| gaurd       | password  |

### 7. Begin Using the System
Upon login, users are directed to their role-specific dashboards.

---

## 🖼️ Screenshots

Here are some screenshots of the application in action:

### Admin login
![Admin login](https://github.com/VigneshS198/Vehicle-manage-system/raw/main/videos/admin.png)

### Guard login
![Guard login](https://github.com/VigneshS198/Vehicle-manage-system/raw/main/videos/guard.png)

📽️ Demo

Watch the video demo of the application in action:
➡️ [Watch Video](https://github.com/VigneshS198/Vehicle-manage-system/raw/refs/heads/main/videos/2025-05-23%2012-51-51.mp4)


➡️ [Click here to download or view the demo video](https://github.com/VigneshS198/Vehicle-manage-system/raw/refs/heads/main/videos/demo.mp4)

