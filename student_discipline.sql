DROP TABLE IF EXISTS admin_users;
CREATE TABLE admin_users(
	sN INT(11) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    usernames VARCHAR(60),
    passwords VARCHAR(15),
    email VARCHAR(70),
    phone_number VARCHAR(12),
    gender VARCHAR(10),
    position VARCHAR(60),
    address VARCHAR(255),
    image VARCHAR(255),
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);


DROP TABLE IF EXISTS student_users;
CREATE TABLE student_users(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,    
    names VARCHAR(100),    
    lvl_admitted VARCHAR(60),    
    passwords VARCHAR(15),    
    email VARCHAR(70),    
    phoneNumber VARCHAR(12),    
    gender VARCHAR(10),    
    dob VARCHAR(15),    
    matric_no VARCHAR(15),
    course VARCHAR(30),
    faculty VARCHAR(40),
    address VARCHAR(255),    
    image VARCHAR(255),    
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);


DROP TABLE IF EXISTS lecturer_users;
CREATE TABLE lecturer_users(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,    
    lecturer_name VARCHAR(100),    
    passwords VARCHAR(15),    
    email VARCHAR(70),    
    phone_number VARCHAR(12),    
    gender VARCHAR(10),    
    office VARCHAR(40),
    address VARCHAR(255),    
    image VARCHAR(255),
    status VARCHAR(40),
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);


DROP TABLE IF EXISTS complaints;
CREATE TABLE complaints(
    complaint_id INT(11) AUTO_INCREMENT PRIMARY KEY,    
    lecturer_name VARCHAR(100),
    student_name VARCHAR(100),
    student_offence VARCHAR(255),
    status VARCHAR(40),
    complaint_details VARCHAR(255),
    complaint_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
);


DROP TABLE IF EXISTS notices;
CREATE TABLE notices(
    notice_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    complaint_id INT(11),    
    notice_text TEXT(255),
    student_name VARCHAR(100),
    notice_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


DROP TABLE IF EXISTS judgements;
CREATE TABLE judgements(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,    
    case_name VARCHAR(40),
    student_name VARCHAR(100),
    judgement_passed TEXT(255),
    notice_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);