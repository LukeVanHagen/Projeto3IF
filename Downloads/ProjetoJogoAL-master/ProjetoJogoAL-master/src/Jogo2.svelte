<svelte:head>
	<link rel="stylesheet" href="/css/Jogo2.css">
</svelte:head>

<script>
let count = 0; //vai ser pra contagem

import {Contagem} from './Logica.js'
import VoltarMenu from './CVoltarMenu.svelte'
import { estado } from "./CEstado.js"
import { trocarEstadoDoJogo } from './CEstado.js'

let labi = [
  [ 'S', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 'E'],
[ 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1],
[ 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1],
[ 1, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1],
[ 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1],
[ 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1],
[ 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 1, 1, 1, 0, 1],
[ 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1],
[ 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1],
[ 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0],
[ 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
[ 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 1],
[ 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1],
[ 0, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1],
[ 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1]
  ];

  let playerX = 0;
  let playerY = 0;
  let gameEnd = false;
  let bombas = [];
  let vidas = 3;


  //PowerUp imunidade

  let imunidade = false;
  let imuniTempo = 0;
  const imuniDura = 10;

  let timer = 0; //Variavel do tempirizador
  let timerIntervalo;

//Começa a rodar de pois incrementa
  function startTimer() {
    timerIntervalo = setInterval(() => {
      timer++;
      if (imunidade) {
        imuniTempo--;
        if (imuniTempo <= 0) {
          imunidade = false; //Vai desativar ela quando o tempo acabar
        }
      }
    }, 1000 );
  }

  //para e limpa o timer
  function stopTimer(){
    clearInterval(timerIntervalo);
  }

  // Geraçao aleatoria de bombas
  function geraBombas(){
    for (let i=0 ;i <15; i++){
      let x, y;
      do {
        x = Math.floor((Math.random()*15));
        y = Math.floor((Math.random()*15));
      } while (labi[x][y] !== 1 && 
        labi[y][x] !== 'S' && 
        labi[y][x] !== 'E' && 
        bombas.some(bomba => bomba.x === x && bomba.y === y));
      bombas.push({ x, y});

      //Essa é a definiçao pra dar um estilo a mais
      labi[y][x] = 'bomba';
    }
  }

  // geração de powerup 
  function gerarPowerUp () {
  let powerupPosi = null; 
//Verifiva se ele foi gerado no mapa, se não ele gera gera gera bacteria
  if (!powerupPosi) {

    do {
     powerupPosi = { x: Math.floor(Math.random() * 15), y: Math.floor(Math.random() * 15)};
    } while (
     labi[powerupPosi.y][powerupPosi.x] !== 1 &&
     labi[powerupPosi.y][powerupPosi.x] !== "S" &&
     labi[powerupPosi.y][powerupPosi.x]!== 'E' &&
     bombas.some(bomba => bomba.x === powerupPosi.x && bomba.y === powerupPosi.y)
    );
   labi[powerupPosi.y][powerupPosi.x] = 'powerup';
  
  }
}

  //Tcheca as colisões com as bombas
  function checaColisaion() {
    for (const bomba of bombas) {
      if (bomba.x === playerX && bomba.y === playerY){
        if (!imunidade) {
          vidas--;
          if (vidas === 0) {
          gameEnd = true;
          stopTimer();
          alert('Você perdeu todas as vidas!\nTempo decorrido: ' + timer + ' segundos')
          } else {
            alert('Você acertou uma bomba!\nVidas restantes: ' + vidas);
             //Se o jogador passar por ela e perder vida ela vai ser removida da lista de bombas
          bombas.splice(bombas.indexOf(bomba), 1);
          labi[bomba.y][bomba.x] = 1;
          }
        }
      }
    }
  }

  function movePlayer(event) {
    if (gameEnd) return; //Ve se o jogo teminou

    if (!timerIntervalo) {
      startTimer(); //Começa o o jogador der o primeiro passo
      geraBombas();
      gerarPowerUp();  
    }

    if (event.key === "ArrowRight" && playerX < labi[0].length - 1 && labi[playerY][playerX + 1] !== 0) {
      playerX++;
    } else if (event.key === "ArrowLeft" && playerX > 0 && labi[playerY][playerX - 1] !== 0) {
      playerX--;
    } else if (event.key === "ArrowDown" && playerY < labi.length - 1 && labi[playerY + 1][playerX] !== 0) {
      playerY++;
    } else if (event.key === "ArrowUp" && playerY > 0 && labi[playerY - 1][playerX] !== 0) {
      playerY--;
    }
    if(labi[playerY][playerX] === 1) {
      count++;
    }

    if (labi[playerY][playerX] === 'E') {
      gameEnd = true;
      stopTimer();
      alert('Você chegou ao final do labirinto!\nTempo decorrido: ' + timer + ' segundos' + ' \nVidas no final: ' + vidas + ' Vida(s) ' + ' \nEspaços Percorridos: ' + count + ' Espaços ');
    } else {
      checaColisaion();
    }

    if(labi[playerY][playerX] === 'powerup') {
    //Se ele pegar o powerup vai ativar aimunidade, 
    // Depois definir o tempo restante
    //Depois remove o up do map, pra não ser pego de novo
    imunidade = true;
    imuniTempo = imuniDura;
    labi[playerY][playerX] = 1;
   }

  }


</script>
<!--modelo do jogo em html-->
<body>

<nav id="linha">
	<h2>
		Campo Minado Nível 2
	</h2>
</nav>

 
<div on:keydown={movePlayer} tabindex="0" class="game-contens">
    <div class="maze">
      {#each labi as row, y}
        {#each row as cell, x}
          <div class="cell"
           class:start={cell === 'S'} 
           class:end={cell === 'E'} 
           class:wall={cell === 0} 
           class:player={x === playerX && y === playerY}
           class:bomba={cell === 'bomba'}
           class:powerup={cell === 'powerup'}>
          </div>
        {/each}
      {/each}
    </div>
  </div>
  <div class="info-elementos">
  <p> Tempo: {timer}</p>
  <p>PowerUp: {imuniTempo} </p>
  <p>Vidas: {vidas}</p>
  <p>Espaços Percorridos: {count}</p>
</div>


<VoltarMenu/>
	<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('ajuda jogo2')}">
	Ajuda
	</div>
	</body>
