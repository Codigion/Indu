--
-- Database Structure
--
-- @Description: MySQL queries related to initialize project.
--


--  Model:
CREATE TABLE models(
    id int(11) auto_increment primary key,

    name varchar(20),
    version varchar(20),
    yolo varchar(150),
    resnet50 varchar(150),
    cow_ref varchar(150),
    
    consumptions int(11),

	is_active enum('0','1'),
	status enum('0','1'),
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);
--  Request:
CREATE TABLE requests(
    id int(11) auto_increment primary key,

    user_id int(11),
    
    cow_id int(11),
    confidence_score varchar(50),
    temperature float(4,2),
    threshold float(4,2),
    quality varchar(50),
    model_version varchar(50),

    picture_orginal varchar(150),
    picture_muzzle varchar(150),

	status enum('0','1'),
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);


--  Users:
CREATE TABLE users(
    id int(11) auto_increment primary key,

    name varchar(50),

	status enum('0','1'),
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Settings:
CREATE TABLE settings(
    id int(11) auto_increment primary key,

    threshold float(4,2),
    temperature float(4,2),

	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);
INSERT INTO `settings` (`threshold`, `temperature`, `updated_at`) VALUES ( 0.5, 0.5, current_timestamp());





CREATE TABLE administrator(
	id int(11) auto_increment primary key,
	
    email varchar(50),
    password varchar(50),

    role ENUM('s','u') DEFAULT 'u', -- U: User & S: Super Admin

	status enum('0','1'),
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Insert Query: Administrator User
INSERT INTO `administrator` (`id`,  `email`, `password`,`role`,`status`, `created_at`, `updated_at`) VALUES (NULL, 'admin', md5('admin'),'s', '1', current_timestamp(), current_timestamp());



-- Visitor's Log
CREATE TABLE visitor(
	id int(11) auto_increment primary key,
	page text,
    ip_address varchar(128),
    user_agent text,
    referrer text,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP
);




--  Request:
CREATE TABLE requests_failed(
    id int(11) auto_increment primary key,

    user_id int(11),
    
    model_version varchar(50),

    picture_orginal varchar(150),
    error text,
    command text,

    
	status enum('0','1'),
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);
