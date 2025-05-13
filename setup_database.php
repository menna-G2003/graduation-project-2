<?php

// Connect to MySQL without specific database to create our database
try {
    echo "Connecting to MySQL...\n";
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create the database if it doesn't exist
    echo "Creating database real_estate_db...\n";
    $pdo->exec('DROP DATABASE IF EXISTS real_estate_db;');
    $pdo->exec('CREATE DATABASE real_estate_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
    echo "Database real_estate_db created successfully!\n";
    
    // Connect to our new database
    echo "Connecting to real_estate_db...\n";
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=real_estate_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Now create all the tables
    echo "Creating tables...\n";
    
    // Create roles table
    $pdo->exec('
        CREATE TABLE roles (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        );
    ');
    
    // Insert default roles
    $pdo->exec("
        INSERT INTO roles (name, created_at, updated_at) VALUES 
        ('admin', NOW(), NOW()),
        ('owner', NOW(), NOW()),
        ('user', NOW(), NOW());
    ");
    
    // Create users table
    $pdo->exec('
        CREATE TABLE users (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            email_verified_at TIMESTAMP NULL,
            password VARCHAR(255) NOT NULL,
            role_id INT UNSIGNED NOT NULL DEFAULT 3,
            phone VARCHAR(50) NULL,
            profile_image VARCHAR(255) NULL,
            about TEXT NULL,
            is_active BOOLEAN DEFAULT TRUE,
            remember_token VARCHAR(100) NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            FOREIGN KEY (role_id) REFERENCES roles(id)
        );
    ');
    
    // Create ad_types table
    $pdo->exec('
        CREATE TABLE ad_types (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            duration_days INT NOT NULL,
            featured BOOLEAN DEFAULT FALSE,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        );
    ');
    
    // Insert default ad types
    $pdo->exec("
        INSERT INTO ad_types (name, price, duration_days, featured, created_at, updated_at) VALUES 
        ('Free', 0.00, 30, FALSE, NOW(), NOW()),
        ('Premium', 19.99, 30, FALSE, NOW(), NOW()),
        ('Featured', 49.99, 30, TRUE, NOW(), NOW());
    ");
    
    // Create property_types table
    $pdo->exec('
        CREATE TABLE property_types (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        );
    ');
    
    // Insert default property types
    $pdo->exec("
        INSERT INTO property_types (name, created_at, updated_at) VALUES 
        ('Apartment', NOW(), NOW()),
        ('House', NOW(), NOW()),
        ('Villa', NOW(), NOW()),
        ('Commercial', NOW(), NOW()),
        ('Land', NOW(), NOW());
    ");
    
    // Create dummy users with hashed passwords
    $adminPassword = password_hash('admin123', PASSWORD_BCRYPT);
    $ownerPassword = password_hash('owner123', PASSWORD_BCRYPT);
    $userPassword = password_hash('user123', PASSWORD_BCRYPT);
    
    $pdo->exec("
        INSERT INTO users (name, email, password, role_id, email_verified_at, created_at, updated_at) VALUES 
        ('Admin User', 'admin@example.com', '$adminPassword', 1, NOW(), NOW(), NOW()),
        ('Property Owner', 'owner@example.com', '$ownerPassword', 2, NOW(), NOW(), NOW()),
        ('Regular User', 'user@example.com', '$userPassword', 3, NOW(), NOW(), NOW());
    ");
    
    // Create migrations table for Laravel
    $pdo->exec('
        CREATE TABLE migrations (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            batch INT NOT NULL
        );
    ');
    
    // Create password_reset_tokens table
    $pdo->exec('
        CREATE TABLE password_reset_tokens (
            email VARCHAR(255) NOT NULL PRIMARY KEY,
            token VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NULL
        );
    ');
    
    // Create personal_access_tokens table for API authentication
    $pdo->exec('
        CREATE TABLE personal_access_tokens (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            tokenable_type VARCHAR(255) NOT NULL,
            tokenable_id BIGINT UNSIGNED NOT NULL,
            name VARCHAR(255) NOT NULL,
            token VARCHAR(64) NOT NULL UNIQUE,
            abilities TEXT NULL,
            last_used_at TIMESTAMP NULL,
            expires_at TIMESTAMP NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            INDEX personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type, tokenable_id)
        );
    ');
    
    echo "Database setup completed successfully!\n";
    echo "You can now run the Laravel application with: php artisan serve\n";
    
} catch (PDOException $e) {
    die("Database setup failed: " . $e->getMessage() . "\n");
} 