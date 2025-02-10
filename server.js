const express = require("express");
const mysql = require("mysql2");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const dotenv = require("dotenv");

dotenv.config();
const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: true })); // Enable form data parsing

// MySQL Database Connection
const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "root", 
  database: "yumeneko",
});

db.connect((err) => {
  if (err) {
    console.error("Database connection failed: " + err.message);
  } else {
    console.log("Connected to MySQL database");
  }
});

// Secret Key for JWT
const JWT_SECRET = process.env.JWT_SECRET || "your_jwt_secret";

// Register API
app.post("/register", async (req, res) => {
  const { registerEmail, registerPassword, registerRePassword } = req.body;

  // Validate passwords match
  if (registerPassword !== registerRePassword) {
    return res.status(400).json({ message: "Passwords do not match" });
  }

  // Check if user already exists
  db.query("SELECT * FROM customers WHERE email = ?", [registerEmail], async (err, results) => {
    if (results.length > 0) {
      return res.status(400).json({ message: "Email already in use" });
    }

    // Hash the password
    const hashedPassword = await bcrypt.hash(registerPassword, 10);

    // Insert user into the database (default role: user)
    db.query(
      "INSERT INTO customers (email, password, is_admin) VALUES (?, ?, ?)",
      [registerEmail, hashedPassword, 0],
      (err, result) => {
        if (err) {
          return res.status(500).json({ message: "Database error", error: err });
        }
        res.status(201).json({ message: "User registered successfully" });
      }
    );
  });
});

// Login API
app.post("/login", (req, res) => {
  const { signInEmail, signInPassword } = req.body;

  // Find user in database
  db.query("SELECT * FROM customers WHERE email = ?", [signInEmail], async (err, results) => {
    if (err || results.length === 0) {
      return res.status(401).json({ message: "Invalid email or password" });
    }

    const user = results[0];

    // Check password
    const isMatch = await bcrypt.compare(signInPassword, user.password);
    if (!isMatch) {
      return res.status(401).json({ message: "Invalid email or password" });
    }

    // Generate JWT Token
    const token = jwt.sign({ id: user.customer_id, is_admin: user.is_admin }, JWT_SECRET, { expiresIn: "1h" });

    res.json({ message: "Login successful", token, is_admin: user.is_admin });
  });
});

// Start Server
const PORT = process.env.PORT || 5500;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));


//getUserById function
app.get("/getUserById", (req, res) => {
  const token = req.headers.authorization?.split(" ")[1];
  const userId = req.query.customer_id;

  if (!token) {
    return res.status(400).json({ message: "InvalidToken" });
  }

  try {
    const decoded = jwt.verify(token, JWT_SECRET);
    
    db.query("SELECT customer_id, name, phone, email FROM customers WHERE customer_id = ?", 
      [userId], 
      (err, results) => {
        if (err) {
          return res.status(500).json({ message: "Database error", error: err });
        }
        if (results.length === 0) {
          return res.status(404).json({ message: "User not found" });
        }
        res.status(200).json({ statusCode: 200, user: results[0] });
      }
    );

  } catch (error) {
    if (error.name === "TokenExpiredError") {
      return res.status(400).json({ message: "TokenExpired" });
    }
    return res.status(400).json({ message: "InvalidToken" });
  }
});


//changePassword function
app.put("/changePassword", async (req, res) => {
  const token = req.headers.authorization?.split(" ")[1];
  const customer_id = req.query.customer_id;
  const { newPassword } = req.body;

  if (!token) {
    return res.status(400).json({ message: "InvalidToken" });
  }

  try {
    const decoded = jwt.verify(token, JWT_SECRET);
    
    // Ensure the logged-in user is changing their own password
    if (decoded.id !== parseInt(customer_id)) {
      return res.status(403).json({ message: "Unauthorized: Cannot change another user's password" });
    }

    // Hash the new password
    const hashedPassword = await bcrypt.hash(newPassword, 10);

    // Update password in the database
    db.query("UPDATE customers SET password = ? WHERE customer_id = ?", 
      [hashedPassword, userId], 
      (err, result) => {
        if (err) {
          return res.status(500).json({ message: "Database error", error: err });
        }
        if (result.affectedRows === 0) {
          return res.status(404).json({ message: "User not found" });
        }
        res.status(200).json({ statusCode: 200, message: "Password changed successfully" });
      }
    );

  } catch (error) {
    if (error.name === "TokenExpiredError") {
      return res.status(400).json({ message: "TokenExpired" });
    }
    return res.status(400).json({ message: "InvalidToken" });
  }
});
