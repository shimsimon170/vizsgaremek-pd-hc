const express = require("express");
const mysql = require("mysql2");
const cors = require("cors");

const app = express();
app.use(cors()); // Allow frontend requests
app.use(express.json()); // Parse JSON body

// MySQL Database Connection
const db = mysql.createConnection({
  host: "localhost",
  user: "root", // Change if needed
  password: "yourpassword", // Your MySQL password
  database: "yumeneko_data", // Your database name
});

db.connect((err) => {
  if (err) throw err;
  console.log("✅ Connected to MySQL database!");
});

// Search API Endpoint
app.get("/search", (req, res) => {
  const searchQuery = req.query.q; // Get search term from frontend
  const sql = "SELECT * FROM menu_items WHERE name LIKE ?"; // Modify based on your table

  db.query(sql, [`%${searchQuery}%`], (err, results) => {
    if (err) return res.status(500).json({ error: err });
    res.json(results);
  });
});

// Start the Server
app.listen(5000, () => console.log("🚀 Server running on http://localhost:5000"));
