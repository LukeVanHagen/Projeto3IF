<svelte:head>
	<link rel="stylesheet" href="/css/menu.css"> <!-- aqui tu põe o css do menu, do lado de styles/ põe o nome do arquivo, cria um novo(para o menu) se quiser-->
</svelte:head>

<nav id="linha">
<h2>
   Campo Minado
</h2>
</nav>
<script>
	import { estado } from './CEstado.js'
	import { trocarEstadoDoJogo } from './CEstado.js'
</script>

<body>
    <div class="container">

            
              <div class="jogar">
                
            <button on:click={()=> trocarEstadoDoJogo("jogar cruzada 1")}>
                Nível 1
            </button>
            <button on:click={()=> trocarEstadoDoJogo("jogar cruzada 2")}>
                Nível 2
            </button>
            <button on:click={()=> trocarEstadoDoJogo("sobre")}>
                Sobre
            </button>
        </div>
		
    </div>
</body>
