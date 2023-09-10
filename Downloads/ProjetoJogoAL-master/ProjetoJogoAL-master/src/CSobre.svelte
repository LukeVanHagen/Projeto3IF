<!--<svelte:head>
	<link rel="stylesheet" href="/styles/sobre.css">
</svelte:head>

<script>
    import { trocarEstadoDoJogo } from './CEstado';
	import VoltarMenu from './CVoltarMenu.svelte'
</script>

<h1>Sobre</h1>

<img src="images/logoIFPE.png" alt="logo IPFE"/>

<div class="sobre">
    <h1>Sobre o Jogo</h1>
    <p>O jogo funciona da seguinte maneira...</p>
    <p>Em desenvolvimento: [Isabela e Cecilia]</p>
  </div>

<VoltarMenu/>
<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('ajuda jogo1')}">
	ajuda
	</div>
-->

<svelte:head>
	<link rel="stylesheet" href="/css/sobre.css">
</svelte:head>

<script>
    import { trocarEstadoDoJogo } from './CEstado';
	import VoltarMenu from './CVoltarMenu.svelte'
</script>

	<!--
		<p class="cabeçalho">Sobre</p>
<figure class="if">
	<img alt="if" src="./images/LogoIFPE.png"/>
</figure>
 
<table>
	<tr>
<p>
		O jogo funciona da seguinte maneira: 
</p>
<p>Autoras: [Isabela e Cecilia]</p>

</tr>
</table>


<div id="VoltarMenu" class='menu' on:click="{() => trocarEstadoDoJogo('menu')}">
	VoltarMenu
	</div>
-->
	<div class="blog-card">
    <div class="meta">
      <div class="photo" > <img class="imagem" alt="" src="./images/LogoIFPE.png"/></div>  
    </div>
    <div class="description">
      <h1>Sobre o jogo</h1>
      <h2>Campo Minado</h2>
      <p>Desenvolvido pelas estudantes Isabela da Silva e Cecília Carolina, com o intuito de desenvolvimento acadêmico da cadeira de Algoritimos e estrutura de dados.</p>
      <p class="read-more">
        <a on:click="{() => trocarEstadoDoJogo('menu')}">Voltar ao Menu</a>
      </p>
    </div>
  </div> 
