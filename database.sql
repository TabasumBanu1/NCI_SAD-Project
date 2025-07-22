USE crud_demo;

-- Update users table for new roles and application tracking
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    role ENUM('employee', 'senior_manager', 'admin') DEFAULT 'employee'
);

-- Insert sample users
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@example.com', 'admin123', 'admin'),
('Senior Manager', 'manager@example.com', 'manager123', 'senior_manager'),
('Employee One', 'employee@example.com', 'employee123', 'employee');

-- Vacancies created by senior managers
DROP TABLE IF EXISTS vacancies;

CREATE TABLE vacancies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Applications submitted by employees
DROP TABLE IF EXISTS applications;

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    vacancy_id INT,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES users(id),
    FOREIGN KEY (vacancy_id) REFERENCES vacancies(id)
);