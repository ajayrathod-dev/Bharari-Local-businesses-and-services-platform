# Bharari - Local Businesses and Services Platform

**Bharari** is a hyperlocal commerce and services marketplace platform designed to empower local vendors, shopkeepers, service providers, and consumers. It bridges the gap between neighborhood shops and local customers by providing an intuitive mobile-first ordering, listing, and business management experience.

---

## 🚀 Key Features

### 👤 Customer / User Experience (`/user`)
- **Mobile-First Responsive Interface**: Clean, app-like UI optimized for smartphones and desktop browsers.
- **Category Browsing**: Explore businesses across Food, Grocery, Pharmacy, Women's Special, Services, and more.
- **Product & Service Catalog**: Detailed product listings with prices, descriptions, and availability.
- **Cart & Checkout**: Multi-item shopping cart, address management, and flexible checkout flows.
- **Order Tracking & History**: Track live status of ongoing orders and view order history.
- **OTP Verification**: Phone number authentication for secure user registration and login.
- **PWA Support**: Progressive Web App capabilities for home screen installation.

### 🏪 Business Partner Dashboard (`/business`)
- **Merchant Portal**: Dedicated dashboard for vendors to manage their digital store.
- **Catalog Management**: Add, update, and manage categories, subcategories, products, and inventory stock.
- **Order Management**: Accept, track, and update fulfillment statuses for customer orders.
- **Profile & Business Details**: Customize business information, contact details, banners, and operating hours.

### 🛡️ Master Administration Panel (`/master_admin`)
- **Platform Control Center**: Super-admin panel overseeing platform operations.
- **Vendor & Category Oversight**: Approve and organize categories, subcategories, and merchants.
- **Banners & Promotions**: Manage promotional banners, coupons, and discounts.
- **User & Order Audit**: Monitor global order activity and system logs.

---

## 🛠️ Tech Stack

- **Backend**: PHP (7.4 / 8.x)
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3, JavaScript, jQuery
- **UI Frameworks**: Bootstrap 5, Remix Icon, Font Awesome, Metropolis Fonts
- **Application Type**: Progressive Web Application (PWA)

---

## 📂 Project Structure

```text
bharari/
├── assets/                     # Global assets (CSS, JS, images, icons, vendor libraries)
├── business/                   # Merchant / Business partner portal
│   ├── connection.php          # Database connection for business portal
│   ├── header.php              # Business navigation & header
│   └── ...                     # Business dashboard, catalog & order management
├── database/                   # Database schema and initial seeds
│   └── bharari.sql             # MySQL schema dump for 'bharari' database
├── fonts/                      # Custom web fonts (Metropolis, etc.)
├── master_admin/               # Super admin management portal
│   ├── connection.php          # Database connection for master admin
│   └── ...                     # Administration modules
├── user/                       # Customer web application
│   ├── connection.php          # Database connection for user portal
│   ├── login.php / otp.php     # Authentication flows
│   └── ...                     # Cart, checkout, product details, orders
├── index.php                   # Public landing page
├── manifest.json               # Progressive Web App manifest
├── .gitignore                  # Git ignore rules for logs, secrets, and temp files
└── README.md                   # Project documentation
```

---

## ⚙️ Installation & Setup

### 1. Prerequisites
- **XAMPP / WampServer / LAMP / LEMP** with:
  - Apache or Nginx
  - PHP 7.4 or higher
  - MySQL 5.7+ or MariaDB 10.4+
- **Git**

### 2. Clone the Repository
Clone the repository into your local server root (e.g., `htdocs` for XAMPP):

```bash
cd c:/xampp/htdocs
git clone https://github.com/ajayrathod-dev/Bharari-Local-businesses-and-services-platform.git bharari
cd bharari
```

### 3. Database Setup
1. Start **Apache** and **MySQL** in your XAMPP Control Panel.
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Create a new database named:
   ```sql
   CREATE DATABASE bharari;
   ```
4. Import the schema file located at `database/bharari.sql` into the newly created `bharari` database.

### 4. Database Configuration
Database credentials can be customized in the connection files or passed via environment variables (`DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`).

By default, the connection files use standard local XAMPP settings:
- **Host**: `localhost`
- **Database**: `bharari`
- **User**: `root`
- **Password**: *(empty)*

The connection configuration files are:
- `user/connection.php`
- `business/connection.php`
- `master_admin/connection.php`

### 5. Access the Application
Open your browser and navigate to:
- **Landing Page**: [http://localhost/bharari/](http://localhost/bharari/)
- **Customer App**: [http://localhost/bharari/user/](http://localhost/bharari/user/)
- **Business Portal**: [http://localhost/bharari/business/](http://localhost/bharari/business/)
- **Master Admin**: [http://localhost/bharari/master_admin/](http://localhost/bharari/master_admin/)

---

## 🔐 Security & Best Practices

- Never commit sensitive production credentials or API private keys into public repositories.
- Use environment variables or local config files for live production deployments.
- Ensure appropriate file upload validation and access controls in production.

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
