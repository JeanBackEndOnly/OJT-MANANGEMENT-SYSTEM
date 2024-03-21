CREATE TABLE users (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  password varchar(255) NOT NULL,
  user_role varchar(15) NOT NULL,
  created_at datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (user_id)
);

CREATE TABLE students (
  stu_id int(11) NOT NULL AUTO_INCREMENT,
  users_id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  ImageData varchar(55) NOT NULL,
  firstname varchar(55) NOT NULL,
  lastname varchar(55) NOT NULL,
  middlename varchar(55) NOT NULL,
  email varchar(100) NOT NULL,
  contact varchar(15) NOT NULL,
  address text NOT NULL,
  year_level varchar(30) NOT NULL,
  course varchar(255) NOT NULL,
  department varchar(55) NOT NULL,
  duty_Status varchar(15) NOT NULL,
  gender varchar(15) NOT NULL,
  updated_at datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (stu_id),
  KEY users_id (users_id),
  CONSTRAINT student_info_ibfk_1 FOREIGN KEY (users_id) REFERENCES users (user_id)
);

CREATE TABLE supervisors (
  supervisor_info_id int(11) NOT NULL AUTO_INCREMENT,
  users_id int(11) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  middlename varchar(50) NOT NULL,
  email varchar(250) NOT NULL,
  position varchar(50) NOT NULL,
  department varchar(50) NOT NULL,
  room varchar(50) NOT NULL,
  profile_pic mediumblob NOT NULL,
  PRIMARY KEY (supervisor_info_id),
  KEY users_id (users_id),
  CONSTRAINT supervisor_ibfk_1 FOREIGN KEY (users_id) REFERENCES users (user_id)
);

CREATE TABLE request (
  request_id int(11) NOT NULL AUTO_INCREMENT,
  stu_id int(11) NOT NULL,
  supervisor_id int(11) NOT NULL,
  request_status varchar(11) NOT NULL,
  request_at datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (request_id),
  KEY stu_id (stu_id),
  KEY supervisor_id (supervisor_id),
  CONSTRAINT request_ibfk_1 FOREIGN KEY (stu_id) REFERENCES students (stu_id),
  CONSTRAINT request_ibfk_2 FOREIGN KEY (supervisor_id) REFERENCES supervisors (supervisor_info_id)
);

CREATE TABLE trainee (
  trainee_id int(11) NOT NULL AUTO_INCREMENT,
  stu_id int(11) NOT NULL,
  supervisor_info_id int(11) NOT NULL,
  PRIMARY KEY (trainee_id),
  KEY trainee_ibfk_1 (stu_id),
  KEY trainee_ibfk_2 (supervisor_info_id),
  CONSTRAINT trainee_ibfk_1 FOREIGN KEY (stu_id) REFERENCES students (stu_id),
  CONSTRAINT trainee_ibfk_2 FOREIGN KEY (supervisor_info_id) REFERENCES supervisors (supervisor_info_id)
);