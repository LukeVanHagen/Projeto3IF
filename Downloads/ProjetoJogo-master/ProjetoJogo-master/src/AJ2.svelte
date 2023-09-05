<svelte:head>
	<link rel="stylesheet" href="/css/aj1.css">
</svelte:head>

<script>
import Jogo2 from "./Jogo2.svelte";
import {trocarEstadoDoJogo} from './CEstado'
</script>
<body>
<!--colocar sobre as dicas-->
</body>
<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('jogar cruzada 2')}">
	fechar
</div>
<Jogo2/>