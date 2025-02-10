const express = require("express");
const mysql = require("mysql2");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const dotenv = require("dotenv");

dotenv.config();
const app = express();
app.use(express.json());

// MySQL Database Connection
const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "root", // Change accordingly
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
  const { name, email, phone, password, role } = req.body;

  // Check if user already exists
  db.query("SELECT * FROM customers WHERE email = ?", [email], async (err, results) => {
    if (results.length > 0) {
      return res.status(400).json({ message: "Email already in use" });
    }

    // Hash the password
    const hashedPassword = await bcrypt.hash(password, 10);

    // Insert user into the database
    db.query(
      "INSERT INTO customers (name, phone, email, password, role) VALUES (?, ?, ?, ?, ?)",
      [name, phone, email, hashedPassword, role || "user"],
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
  const { email, password } = req.body;

  // Find user in database
  db.query("SELECT * FROM customers WHERE email = ?", [email], async (err, results) => {
    if (err || results.length === 0) {
      return res.status(401).json({ message: "Invalid email or password" });
    }

    const user = results[0];

    // Check password
    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) {
      return res.status(401).json({ message: "Invalid email or password" });
    }

    // Generate JWT Token
    const token = jwt.sign({ id: user.customer_id, role: user.role }, JWT_SECRET, { expiresIn: "1h" });

    res.json({ message: "Login successful", token, role: user.role });
  });
});

// Protected Route (Example: Only Admins Can Access)
app.get("/admin", (req, res) => {
  const token = req.headers.authorization?.split(" ")[1];

  if (!token) {
    return res.status(403).json({ message: "Access denied" });
  }

  try {
    const decoded = jwt.verify(token, JWT_SECRET);
    if (decoded.role !== "admin") {
      return res.status(403).json({ message: "Only admins allowed" });
    }
    res.json({ message: "Welcome, Admin!" });
  } catch (error) {
    res.status(401).json({ message: "Invalid token" });
  }
});

// Start Server
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
