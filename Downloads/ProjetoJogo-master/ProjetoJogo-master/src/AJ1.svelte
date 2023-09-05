<svelte:head>
	<link rel="stylesheet" href="/css/aj1.css">
</svelte:head>

<script>
import Jogo1 from "./Jogo1.svelte";
import {trocarEstadoDoJogo} from './CEstado'
</script>
<body>
      <!--aqui pode colocar alguma coisa sobre--> 
</body>
<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('jogar cruzada 1')}">
	fechar
</div>
<Jogo1/>