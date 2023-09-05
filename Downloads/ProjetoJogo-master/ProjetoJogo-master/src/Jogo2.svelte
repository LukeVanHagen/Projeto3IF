<svelte:head>
	<link rel="stylesheet" href="/css/Jogostyle.css">
</svelte:head>

<script>

import {Contagem} from './Logica.js'
import VoltarMenu from './CVoltarMenu.svelte'
import { estado } from "./CEstado.js"
import { trocarEstadoDoJogo } from './CEstado.js'

function Preencher(){
 let letras = document.getElementById('resposta2')
    	if(letras == 1){
        	return 0 
    	}else{
        	tabelaV2.push(letras) //alterar variável dentro do else á cada nova cruzada 
			console.log(letras)
    	}	
}


export let tabelaV2 = [ 
	[], //so coloque mais colchetes se tiver mais uma linha do array
	[],
	[],
	[],
	[],
	[],
	[],
	[]
]

export let tabelaR2 = [
	[1,1,1,1,"m","a","r","t","e",1,1],   //inserir letras, 1 a cada espaço vazio
	[1,1,1,1,"e","c","l","i","p","s","e"],	// todas as letras da array devem ser minusculas e sem acentuação
	[1,1,1,1,"t",1,1,1,1,1,1],
	[1,1,1,"v","e","n","u","s",1,1,1],
	["u","r","a","n","o",1,1,1,1,1,1],  
	[1,1,1,1,"r",1,1,1,1,1,1],	
	[1,1,1,1,"o",1,1,1,1,1,1],
	[1,1,1,1,"s",1,1,1,1,1,1]	
] 


export let coluna = tabelaR2[1].length + 1 //nas tabelas novas só precisa trocar o nome dessa variavel
console.log(coluna)
</script>
<!--modelo do jogo em html-->
<body>

<nav id="linha">
	<h2>
		Campo Minado Nível 2
	</h2>
</nav>

 

<section id="cruzada">
	
</section>


<VoltarMenu/>
	<div id="ajuda" class='menu' on:click="{() => trocarEstadoDoJogo('ajuda jogo2')}">
	ajuda
	</div>
	</body>
