CREATE DATABASE fbr_bot;

USE fbr_bot;

CREATE TABLE cnic_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cnic VARCHAR(13) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    father_name VARCHAR(100) NOT NULL,
    dob DATE NOT NULL
);

-- Sample Data
INSERT INTO cnic_data (cnic, name, father_name, dob) VALUES
('3520212345678', 'Ali Khan', 'Ahmed Khan', '1995-03-15'),
('6110112345678', 'Sara Bibi', 'Yousaf Khan', '1998-07-20');
