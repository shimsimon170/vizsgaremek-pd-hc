-- Create the database
CREATE DATABASE IF NOT EXISTS yumeneko;
USE yumeneko;

-- Table for customers
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table for menu items
CREATE TABLE menu_items (
    menu_item_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50), -- e.g., Drinks, Snacks, Desserts
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for orders
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status ENUM('Pending', 'Completed', 'Cancelled') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE SET NULL
);

-- Table for order items
CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    menu_item_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL, -- Price at the time of order
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(menu_item_id) ON DELETE CASCADE
);

-- Table for cafe tables
CREATE TABLE tables (
    table_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT UNIQUE NOT NULL,
    capacity INT NOT NULL,
    is_available BOOLEAN DEFAULT TRUE
);

-- Table for bookings
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    table_id INT,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    duration INT NOT NULL, -- Duration in minutes
    status ENUM('Reserved', 'Cancelled', 'Completed') DEFAULT 'Reserved',
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE SET NULL,
    FOREIGN KEY (table_id) REFERENCES tables(table_id) ON DELETE SET NULL
);

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `email`, `is_admin`, `is_deleted`, `created_at`, `deleted_at`, `password`) VALUES
(1, 'John Doe', '123-456-7890', 'johndoe@example.com', 0, 0, NOW(), NULL, 'hashed_password_1'),
(2, 'Dora Kazamatsuri', '01-234-567-88', 'yumeneko@gmail.com', 1, 0, NOW(), NULL, 'hashed_password_2'),
(3, 'Alice Johnson', '555-123-4567', 'alicejohnson@example.com', 0, 0, NOW(), NULL, 'hashed_password_3');


INSERT INTO menu_items (name, description, price, category, is_available) VALUES
('Matcha Latte', 'A smooth and creamy blend of matcha and milk for a delightful treat.', 4.50, 'Drinks', 1),
('Bubble Tea', 'Refreshing tea with chewy tapioca pearls in every sip.', 4.00, 'Drinks', 1),
('Craft Beer', 'Local craft beer with a unique flavor profile for beer enthusiasts.', 7.00, 'Drinks', 1),
('Meowtini', 'A non-alcoholic fruity cocktail, perfect for a fun and refreshing experience.', 6.00, 'Drinks', 1),
('Espresso', 'A classic, rich, and intense coffee shot for a quick energy boost.', 3.00, 'Drinks', 1),
('Latte Macchiato', 'A creamy blend of espresso and steamed milk for coffee lovers.', 4.50, 'Drinks', 1),
('Almond Coffee', 'A perfect balance of espresso, steamed milk, almond and foam.', 5.00, 'Drinks', 1),
('Catpuccino', 'Our special coffee with a cute twist—purrrfect for any cat lover!', 5.00, 'Drinks', 1),
('Classic Cheeseburger', 'A timeless favorite with a juicy beef patty, melted cheese, fresh lettuce, tomato, and a soft sesame bun.', 8.00, 'Foods', 1),
('BBQ Bacon Burger', 'Savory and smoky with crispy bacon, tangy BBQ sauce, cheddar cheese, and caramelized onions.', 9.50, 'Foods', 1),
('Veggie Delight Burger', 'A hearty, plant-based patty topped with fresh veggies, avocado, and a zesty sauce.', 7.50, 'Foods', 1),
('Meow-Meat Special Burger', 'A cat café exclusive with double beef patties, secret sauce, and all the fixings for a satisfying bite.', 10.00, 'Foods', 1),
('Classic Shoyu Ramen', 'A comforting bowl of soy-based broth with tender noodles, sliced pork, bamboo shoots, and a soft-boiled egg.', 12.00, 'Foods', 1),
('Spicy Miso Ramen', 'Packed with bold flavors, this ramen has a rich miso broth with a spicy kick, paired with pork chashu and fresh greens.', 13.50, 'Foods', 1),
('Bento Box', 'A delightful combination of sushi, rice, pickled vegetables, and a choice of teriyaki chicken, salmon, or tofu.', 10.50, 'Foods', 1),
('Purrfect Tonkotsu Ramen', 'Creamy pork bone broth, perfectly cooked noodles, and an assortment of classic toppings.', 12.00, 'Foods', 1),
('Cat Cookies', 'Adorably shaped buttery cookies with a hint of vanilla—perfect for a sweet snack.', 3.50, 'Desserts', 1),
('Meow-Macarons', 'Colorful macarons in delightful flavors like vanilla, chocolate, and strawberry.', 4.50, 'Desserts', 1),
('Paw-some Brownie', 'A rich and fudgy chocolate brownie with a paw-shaped design.', 5.00, 'Desserts', 1),
('Cat Cupcake', 'A fluffy cupcake with creamy frosting, topped with a cute cat face decoration.', 3.00, 'Desserts', 1),
('Matcha Mochi', 'Soft and chewy rice cakes infused with the earthy sweetness of matcha.', 6.00, 'Desserts', 1),
('Strawberry Mochi', 'A sweet and fruity treat with strawberry-flavored filling.', 6.50, 'Desserts', 1),
('Mango Mochi', 'Tropical and delicious with a creamy mango filling.', 6.50, 'Desserts', 1),
('Mixed Flavors Cat Mochi', 'An assortment of our best mochi flavors, each shaped like a cute cat face.', 10.00, 'Desserts', 1);


INSERT INTO tables (table_number, capacity, is_available) VALUES
(1, 2, TRUE),
(2, 4, TRUE),
(3, 6, FALSE);

INSERT INTO bookings (customer_id, table_id, booking_date, booking_time, duration, status) VALUES
(1, 1, '2024-12-10', '10:30:00', 60, 'Reserved'),
(2, 3, '2024-12-12', '14:00:00', 120, 'Reserved');

INSERT INTO orders (customer_id, order_date, total_amount, status) VALUES
(1, '2024-12-05 10:45:00', 9.25, 'Completed'),
(3, '2024-12-05 11:30:00', 7.50, 'Pending');

INSERT INTO order_items (order_id, menu_item_id, quantity, price) VALUES
(1, 1, 1, 4.50),
(1, 2, 1, 2.75),
(2, 4, 2, 6.00);
