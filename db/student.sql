CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    index_number VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `student` (`name`, `email`, `index_number`, `password`) VALUES
('John Doe', 'john.doe@example.com', '1000001', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Jane Smith', 'jane.smith@example.com', '1000002', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Alice Johnson', 'alice.johnson@example.com', '1000003', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Bob Brown', 'bob.brown@example.com', '1000004', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Charlie White', 'charlie.white@example.com', '1000005', '5f4dcc3b5aa765d61d8327deb882cf99'),
('David Black', 'david.black@example.com', '1000006', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Emma Green', 'emma.green@example.com', '1000007', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Frank Harris', 'frank.harris@example.com', '1000008', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Grace Miller', 'grace.miller@example.com', '1000009', '5f4dcc3b5aa765d61d8327deb882cf99'),
('Henry Wilson', 'henry.wilson@example.com', '1000010', '5f4dcc3b5aa765d61d8327deb882cf99');
