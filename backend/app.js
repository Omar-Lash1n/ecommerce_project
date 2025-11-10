const express = require('express');
const app = express();
const PORT = process.env.PORT || 3000;

app.get('/api/message', (req, res) => {
    res.json({ message: 'Hello from Backend!' });
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});