const mqtt = require('mqtt');
const client = mqtt.connect('mqtt://localhost:1883'); // Altere para o endereço do seu servidor Mosquitto se necessário

client.on('connect', () => {
  console.log('Conectado ao servidor MQTT');
  client.subscribe('rfid-validation', (err) => {
    if (err) {
      console.error('Erro ao se inscrever no tópico:', err);
    } else {
      console.log('Inscrição no tópico rfid-validation realizada com sucesso!');
    }
  });
});

client.on('message', (topic, message) => {
  console.log(`Mensagem recebida no tópico ${topic}: ${message.toString()}`);
  // Adicione aqui o código para manipular a mensagem recebida
});
