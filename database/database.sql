CREATE TABLE `employees` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL DEFAULT '',
    `last_name` varchar(255) NOT NULL DEFAULT '',
    `email` varchar(255) NOT NULL DEFAULT '',
    `password` varchar(255) NOT NULL DEFAULT '',
    `level` int(11) NOT NULL DEFAULT '1',
    `genre` varchar(10) DEFAULT NULL,
    `datebirth` date DEFAULT NULL,
    `document` varchar(11) DEFAULT NULL,
    `photo` varchar(255) DEFAULT NULL,
    `status` varchar(50) NOT NULL DEFAULT 'active' COMMENT 'inactive, active',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    FULLTEXT KEY `full_text` (`first_name`,`last_name`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserting sample data into the employees table
INSERT INTO `employees` (`id`, `first_name`, `last_name`,  `email`, `password`,  `level`,`genre`, `datebirth`,`document`, `photo`, `status`
) VALUES
    (1, 'John', 'Doe', 'john.doe@example.com', 'hashed_password_123', 1, 'Male', '1990-01-15', '12345678901', 'john_doe.jpg', 'active'),
    (2, 'Jane', 'Smith', 'jane.smith@example.com', 'hashed_password_456', 2, 'Female', '1985-08-22', '98765432101', 'jane_smith.jpg', 'active'),
    (3, 'Bob', 'Johnson', 'bob.johnson@example.com', 'hashed_password_789', 1, 'Male', '1995-05-10', '45678901234', 'bob_johnson.jpg', 'inactive'),
    (4, 'Admin', 'User', 'admin@example.com', 'hashed_admin_password', 2, 'Male', '1980-01-01', '12345678901', 'admin_photo.jpg', 'active'),
    (5, 'Developer', 'Person', 'developer@example.com', 'hashed_dev_password', 1, 'Female', '1990-05-15', '98765432101', 'dev_photo.jpg', 'active');


CREATE TABLE `enrollment` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employee_id`  int(11) unsigned DEFAULT NULL,
    `enrollment` varchar(255) NOT NULL DEFAULT '',
    `status` varchar(50) NOT NULL DEFAULT 'active',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `attendance` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employees_id` int(11) unsigned DEFAULT NULL,
    `attendance` varchar(255) NOT NULL DEFAULT '',
    `status` varchar(50) NOT NULL DEFAULT 'present' COMMENT 'present, absent, late',
    `remarks` text,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `attendance` (`id`, `employee_id`, `attendance`, `status`, `remarks`)
VALUES
    (1, 1, '2024-01-01', 'present', 'Regular attendance'),
    (2, 1,'2024-01-01', 'absent', 'Sick leave'),
    (3, 1,'2024-01-01', 'late', 'Arrived 15 minutes late');
    
CREATE TABLE `salary` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employee_id` int(11) unsigned DEFAULT NULL,
    `salary_amount` decimal(10,2) NOT NULL DEFAULT 0,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id_salary` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert into salary table
INSERT INTO `salary` (`employee_id`, `salary_amount`) VALUES (1, 50000.00);

CREATE TABLE `payroll` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employee_id` int(11) unsigned NOT NULL,
    `salary_id` int(11) unsigned NOT NULL, 
    `overtime_hours` decimal(5,2) NOT NULL DEFAULT 0,
    `bonus` decimal(10,2) NOT NULL DEFAULT 0,
    `deductions` decimal(10,2) NOT NULL DEFAULT 0,
    `net_pay` decimal(10,2) NOT NULL,
    `payroll_date` date NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `salary_payroll_id` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
    CONSTRAINT `employee_payroll_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE payroll (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `employee_id` INT NOT NULL,
    `gross_salary` DECIMAL(10,2) NOT NULL,
    `INSS` DECIMAL(10,2) NOT NULL,
    `IRRF` DECIMAL(10,2) NOT NULL,
    `VT` DECIMAL(10,2) NOT NULL,
    `VR` DECIMAL(10,2) NOT NULL,
    `health_plan` DECIMAL(10,2) NOT NULL,
    `overtime_hours` DECIMAL(5,2) NOT NULL DEFAULT 0,
    `overtime_pay` DECIMAL(10,2) NOT NULL DEFAULT 0,
    `bank_hours` DECIMAL(5,2) NOT NULL DEFAULT 0,
    `net_salary` DECIMAL(10,2) NOT NULL,
    `payment_date` DATE NOT NULL,
    `status` ENUM('PENDING', 'PAID') DEFAULT 'PENDING',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`)
    CONSTRAINT `salary_payroll_id` FOREIGN KEY () REFERENCES 
    CONSTRAINT `employee_payroll_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
CREATE TABLE `leave` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employees_id` int(11) unsigned DEFAULT NULL,
    `leave` varchar(255) NOT NULL DEFAULT '',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE `overtime` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employees_id` int(11) unsigned DEFAULT NULL,
    `overtime` varchar(255) NOT NULL DEFAULT '',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE `holiday` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employee_id` int(11) unsigned DEFAULT NULL,
    `start_date` date NOT NULL,
    `end_date` date NOT NULL,
    `reason` varchar(255) NOT NULL DEFAULT '',
    `is_paid` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE `location` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employee_id` int(11) unsigned DEFAULT NULL,
    `city` varchar(255) NOT NULL,
    `state` varchar(255) NOT NULL,
    `country` varchar(255) NOT NULL,
    `address` varchar(255) DEFAULT NULL,
    `zip_code` varchar(20) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE `time_records` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employees_id` int(11) unsigned DEFAULT NULL,
    `time_records` varchar(255) NOT NULL DEFAULT '',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
CREATE TABLE `work_schedules`(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `employees_id` int(11) unsigned DEFAULT NULL,
    `work_schedules` varchar(255) NOT NULL DEFAULT '',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    PRIMARY KEY (`id`)
    CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
CREATE TABLE `automatic_messages` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `sender_id` int(11) NOT NULL,
    `recipient_id` int(11) NOT NULL,
    `message_content` text NOT NULL,
    `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` varchar(50) NOT NULL DEFAULT  'pending' COMMENT 'sent, pending',
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    CONSTRAINT `employee_id` FOREIGN KEY (`sender_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
    CONSTRAINT `employee_id` FOREIGN KEY (`recipient_id`) REFERENCES `employees` (`id`)ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
