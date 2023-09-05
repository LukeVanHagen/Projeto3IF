<svelte:head>
	<link rel="stylesheet" href="/css/Jogostyle.css">
</svelte:head>

<script>

import {Contagem} from './Logica.js'
import VoltarMenu from './CVoltarMenu.svelte'
import { estado } from "./CEstado.js"
import { trocarEstadoDoJogo } from './CEstado.js'

function Preencher(){
 let letras = document.getElementById('resposta1')
    	if(letras == 1){
        	return 0 
    	}else{
        	tabelaVazia.push(letras) //alterar variável dentro do else á cada nova cruzada 
			console.log(letras)
    	}	
}


export let tabelaVazia = [ 
	[], //so coloque mais colchetes se tiver mais uma linha do array
	[],
	[],
	[],
	[],
	[],
	[],
	[]
]

export let tabelaResposta = [
	[1,1,"a","n","d","r","o","m","e","d","a",1,1,1],   //inserir letras, 1 a cada espaço vazio
	[1,1,1,"e","s","t","r","e","l","a","s",1,1,1],	// todas as letras da array devem ser minusculas e sem acentuação
	[1,1,1,"b","u","r","a","c","o","n","e","g","r","o"],
	[1,1, 1,"u",1,1,1,1,1,1,1,1,1,1],
	["v","i","a","l","a","c","t","e","a",1,1,1,1,1],  
	[1, 1, 1, "o",1,1,1,1,1,1,1,1,1,1],	
	[1, 1, 1, "s",1,1,1,1,1,1,1,1,1,1],
	[1 ,1,"g","a","l","a","x","i","a",1,1,1,1,1]	
] 


export let coluna = tabelaResposta[1].length + 1 //nas tabelas novas só precisa trocar o nome dessa variavel
console.log(coluna)
</script>
<!--modelo do jogo em html-->
<body>

<nav id="linha">
	<h2>
		Campo Minado Nível 1
	</h2>
</nav>

 

<section id="cruzada">
	
	<!-- no exemplo anterior estava aqui a tabela, pode-se colocar aqu a tabela-->
	
</section>




	


	<VoltarMenu/>
	<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('ajuda jogo1')}">
	ajuda
	</div>
	</body>
