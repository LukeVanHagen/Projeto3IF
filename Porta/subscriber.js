const mqtt = require('mqtt');
const client = mqtt.connect('mqtt://localhost:1883'); // Altere para o endereço do seu servidor Mosquitto se necessário

// Função para manipular a mensagem recebida
function handleReceivedMessage(message) {
const rfidStatus = JSON.parse(message);

 // Adicione aqui a lógica para manipular o status recebido
 if (rfidStatus.authorized) {
  console.log('Porta autorizada - Atualizar interface com cor verde');
  // Adicione lógica para atualizar a cor da porta na interface (usando jQuery)
  $('#porta').removeClass('nao-autorizado').addClass('autorizado');
} else {
  console.log('Porta não autorizada - Atualizar interface com cor vermelha');
  // Adicione lógica para atualizar a cor da porta na interface (usando jQuery)
  $('#porta').removeClass('autorizado').addClass('nao-autorizado');
}
}



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
  
  // Chama a função para manipular a mensagem recebida
  handleReceivedMessage(message.toString());
  // Chama a função para atualizar o estado da porta com base na mensagem recebida
  updatePortaState(JSON.parse(message.toString()));
});

