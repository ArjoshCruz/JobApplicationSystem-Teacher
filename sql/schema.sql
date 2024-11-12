CREATE TABLE teacher_records (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    age INT,
    gender VARCHAR(50),
    email VARCHAR(50),
    yrs_of_experience VARCHAR(50),
    position VARCHAR(50), -- Teacher / Head Teacher / Principal
    subject_specialization VARCHAR(50),
    date_added DATE DEFAULT CURRENT_DATE
);