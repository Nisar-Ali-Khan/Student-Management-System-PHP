CREATE DATABASE IF NOT EXISTS college_db;
USE college_db;

CREATE TABLE IF NOT EXISTS students (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    City VARCHAR(100) NOT NULL,
    Course VARCHAR(100) NOT NULL,
    Batch VARCHAR(50) NOT NULL,
    Year INT NOT NULL
);

INSERT INTO students (Name, City, Course, Batch, Year) VALUES 
('Ali Khan', 'Karachi', 'Computer Science', '2023-2027', 2023),
('Sara Ahmed', 'Lahore', 'BBA', '2022-2026', 2022);