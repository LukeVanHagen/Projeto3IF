<svelte:head>
	<link rel="stylesheet" href="/css/aj1.css">
</svelte:head>

<script>
import Jogo1 from "./Jogo1.svelte";
import {trocarEstadoDoJogo} from './CEstado'
</script>
<body>
      <!--aqui pode colocar alguma coisa sobre--> 
	  <h2>Percorra todo o labirinto sem perder as 3 vidas ao tocar nas bombas vermelhas,</h2>
	  <h2>existe um campo de força,onde suas vidas não serão desperdiçadas</h2>
</body>
<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('jogar cruzada 1')}">
	Fechar
</div>
<Jogo1/>