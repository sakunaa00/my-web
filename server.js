require('dotenv').config();
const express = require('express');
const cookieSession = require('cookie-session');
const path = require('path');

const { SESSION_SECRET, PORT } = process.env;

const app = express();
app.use(cookieSession({ name: 'session', keys: [SESSION_SECRET || 'devkey'], maxAge: 24 * 60 * 60 * 1000 }));

app.get('/api/me', (req, res) => { res.json(req.session.user || null); });
app.get('/logout', (req, res) => { req.session = null; res.redirect('/'); });

app.use(express.static(path.join(__dirname)));

const port = PORT || 3000;
app.listen(port, () => console.log(`Server listening on http://localhost:${port}`));
