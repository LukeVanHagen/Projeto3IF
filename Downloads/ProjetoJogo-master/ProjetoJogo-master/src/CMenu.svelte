<svelte:head>
	<link rel="stylesheet" href="/css/menu.css"> <!-- aqui tu põe o css do menu, do lado de styles/ põe o nome do arquivo, cria um novo(para o menu) se quiser-->
</svelte:head>

<h1>
   Campo Minado
</h1>

<script>
	import { estado } from './CEstado.js'
	import { trocarEstadoDoJogo } from './CEstado.js'
</script>

<body>
    <div class="container">
        <div class="gif">
            
        </div>

            
              <div class="jogar">
                
            <button on:click={()=> trocarEstadoDoJogo("jogar cruzada 1")}>
                Jogar - Nível 1
            </button>
            <button on:click={()=> trocarEstadoDoJogo("jogar cruzada 2")}>
                Jogar - Nível 2
            </button>
            <button on:click={()=> trocarEstadoDoJogo("sobre")}>
                Sobre
            </button>
        </div>
        <figure class="foguet">
            <!--se quiser a gente pode colocar aguma imagem aqui-->
        </figure>
		
        
    </div>
</body>
