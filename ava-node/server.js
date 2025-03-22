const express = require("express");
const path = require("path");

const app = express();
const PORT = process.env.PORT || 3000;

// Serve all static files from "public" (HTML, CSS, JS, images)
app.use(express.static(path.join(__dirname, "public")));

// Handle requests dynamically for any HTML file
app.get("/:page?", (req, res) => {
  let page = req.params.page || "index"; // Default to index.html
  let filePath = path.join(__dirname, "public", `${page}.html`);
  
  res.sendFile(filePath, (err) => {
    if (err) res.status(404).send("Page not found!");
  });
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
