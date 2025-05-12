CREATE DATABASE IF NOT EXISTS terps_only;
USE terps_only;

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  price DECIMAL(10,2),
  image TEXT,
  quantity_prices TEXT
);