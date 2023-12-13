const express = require('express');
const fs = require('fs');
const app = express();

// Middleware para lidar com CORS
app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

app.get('/messages', (req, res) => {
  fs.readFile('mensagens.txt', 'utf8', (err, data) => {
    if (err) {
      res.status(500).send('Erro ao ler as mensagens.');
      return;
    }
    res.send(data);
  });
});

app.listen(3000, () => {
  console.log('Servidor iniciado em http://localhost:3000');
});
