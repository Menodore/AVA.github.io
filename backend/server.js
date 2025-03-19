const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());
app.use(cors());

// MySQL Connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root', // Replace with your MySQL username
  password: '', // Replace with your MySQL password
  database: 'ava_db' // Replace with your database name
});

db.connect((err) => {
  if (err) throw err;
  console.log('MySQL Connected!');
});

// Create Users Table
db.query(`
  CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
  )
`);

// Create Test Results Table
db.query(`
  CREATE TABLE IF NOT EXISTS test_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    result VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
  )
`);

// Login Endpoint
app.post('/login', (req, res) => {
  const { email, password } = req.body;

  const query = 'SELECT * FROM users WHERE email = ? AND password = ?';
  db.query(query, [email, password], (err, results) => {
    if (err) throw err;

    if (results.length > 0) {
      res.status(200).json({ message: 'Login successful!', user: results[0] });
    } else {
      res.status(401).json({ message: 'Invalid email or password.' });
    }
  });
});

// Save Test Result Endpoint
app.post('/save-result', (req, res) => {
  const { userId, result } = req.body;

  const query = 'INSERT INTO test_results (user_id, result) VALUES (?, ?)';
  db.query(query, [userId, result], (err, results) => {
    if (err) throw err;

    res.status(200).json({ message: 'Test result saved!' });
  });
});

// Start Server
app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});

document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent default form submission

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
        const response = await fetch('http://localhost:3000/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok) {
            alert(data.message);
            const userId = data.user.id;

            // Simulate a test result (replace with actual test logic)
            const testResult = 'Pass';
            await fetch('http://localhost:3000/save-result', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ userId, result: testResult })
            });

            alert('Test result saved!');
        } else {
            alert(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});

// Signup Endpoint
app.post('/signup', (req, res) => {
    const { email, password } = req.body;
  
    // Check if user already exists
    const checkQuery = 'SELECT * FROM users WHERE email = ?';
    db.query(checkQuery, [email], (err, results) => {
      if (err) throw err;
  
      if (results.length > 0) {
        res.status(400).json({ message: 'User already exists.' });
      } else {
        // Insert new user
        const insertQuery = 'INSERT INTO users (email, password) VALUES (?, ?)';
        db.query(insertQuery, [email, password], (err, results) => {
          if (err) throw err;
  
          res.status(201).json({ message: 'User registered successfully!' });
        });
      }
    });
  });