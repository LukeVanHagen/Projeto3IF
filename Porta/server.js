const express = require('express');
const http = require('http');
const WebSocket = require('ws');
const mqtt = require('mqtt');

const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

// Conecta-se ao servidor MQTT
const mqttClient = mqtt.connect('mqtt://localhost:1883'); // Altere se necessário

// Array para armazenar mensagens recebidas
let messages = [];

mqttClient.on('connect', () => {
  console.log('Conectado ao servidor MQTT');
  mqttClient.subscribe('rfid-validation', (err) => {
    if (err) {
      console.error('Erro ao se inscrever no tópico:', err);
    } else {
      console.log('Inscrição no tópico rfid-validation realizada com sucesso!');
    }
  });
});

mqttClient.on('message', (topic, message) => {
  console.log(`Mensagem recebida no tópico ${topic}: ${message.toString()}`);
  messages.push(message.toString());

  // Envia a mensagem para os clientes conectados via WebSocket
  wss.clients.forEach((client) => {
    if (client.readyState === WebSocket.OPEN) {
      client.send(message.toString());
    }
  });
});

// Configuração do WebSocket
wss.on('connection', (ws) => {
  console.log('Cliente WebSocket conectado');

  // Envia mensagens recebidas para o cliente
  messages.forEach((message) => {
    ws.send(message);
  });
});

server.listen(3000, () => {
  console.log('Servidor iniciado em http://localhost:3000');
});
