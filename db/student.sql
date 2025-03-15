

CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    index_number VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `student` (`name`, `email`, `index_number`, `password`) VALUES
('John Doe', 'john.doe@example.com', '1000001', 'hashed_password1'),
('Jane Smith', 'jane.smith@example.com', '1000002', 'hashed_password2'),
('Alice Johnson', 'alice.johnson@example.com', '1000003', 'hashed_password3'),
('Bob Brown', 'bob.brown@example.com', '1000004', 'hashed_password4'),
('Charlie White', 'charlie.white@example.com', '1000005', 'hashed_password5'),
('David Black', 'david.black@example.com', '1000006', 'hashed_password6'),
('Emma Green', 'emma.green@example.com', '1000007', 'hashed_password7'),
('Frank Harris', 'frank.harris@example.com', '1000008', 'hashed_password8'),
('Grace Miller', 'grace.miller@example.com', '1000009', 'hashed_password9'),
('Henry Wilson', 'henry.wilson@example.com', '1000010', 'hashed_password10'),
('Ivy Anderson', 'ivy.anderson@example.com', '1000011', 'hashed_password11'),
('Jack Thomas', 'jack.thomas@example.com', '1000012', 'hashed_password12'),
('Katie Scott', 'katie.scott@example.com', '1000013', 'hashed_password13'),
('Liam Adams', 'liam.adams@example.com', '1000014', 'hashed_password14'),
('Mia Roberts', 'mia.roberts@example.com', '1000015', 'hashed_password15'),
('Nathan King', 'nathan.king@example.com', '1000016', 'hashed_password16'),
('Olivia Martinez', 'olivia.martinez@example.com', '1000017', 'hashed_password17'),
('Paul Lewis', 'paul.lewis@example.com', '1000018', 'hashed_password18'),
('Quinn Walker', 'quinn.walker@example.com', '1000019', 'hashed_password19'),
('Rachel Hall', 'rachel.hall@example.com', '1000020', 'hashed_password20');
