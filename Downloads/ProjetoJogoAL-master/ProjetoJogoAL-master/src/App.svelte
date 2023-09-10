<script>
	import Jogo from './Jogo1.svelte' 
	import Sobre from './CSobre.svelte'
	import Menu from './CMenu.svelte'
	import { estado } from './CEstado.js'
	import AJ1 from './AJ1.svelte'
    import Jogo2 from './Jogo2.svelte';
	import AJ2 from './AJ2.svelte'

</script>

 <!-- Esta não é a melhor forma de criar rotas em um projeto.
 Mais detalhes sobre como criar rotas em: https://sustainablewww.org/principles/how-to-implement-routes-in-your-svelte-web-application-using-svelte-routing -->
 

<!-- o jogo tem três estados menu, jogar e sobre, cada um representa uma tela diferente para o usuário -->
{#if $estado === 'menu'}
	<!-- notem como cada componente/módulo que crianos no svelte vira um tag -->
	<Menu/>

{:else if $estado === 'sobre'}
	<Sobre/>

{:else if $estado === 'jogar cruzada 1'}
	<Jogo/>

{:else if $estado === 'ajuda jogo1'}
	<AJ1/>

{:else if $estado === 'jogar cruzada 2'}
	<Jogo2/>
{:else if $estado === 'ajuda jogo2'}
	<AJ2/>
{/if}


<!-- para criar novas cruzadas, copie todo o modelo do jogo1, fazendo as alterações necessárias descritas nele-->
<!-- caso sim, coloque um import Jogo2(ou jogo3, enfim) from './Jogo2.svelte', crie um novo else if

=== 'jogar cruzada 2' ou sei lá e fecha a tag <jogo2/>-->

<!--IMPORTANTISSIMO PRIMEIRA LETRA MAISCULA SEMPRE-->