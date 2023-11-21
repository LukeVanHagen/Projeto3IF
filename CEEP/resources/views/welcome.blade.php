<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <header>
      
    <nav>
  <ul class="navigation-menu">
    <li><a href="#" class="strong underline">Home</a></li>
    <li><a href="#locate" class="underline">Sobre</a></li>
    <li><a href="#" class="underline">Contato</a></li>
  </ul>
</nav>
  </header>
            
        <section class="hero">
          <h1>Sejam bem vindos ao CEEP!</h1>
          <h2>CEEP,Control of Entry and Exit of People.Esse sistema tem a finalinade de controlar a entrada de alunos nos laboratórios do campus IFPE.</h2>
          @if (Route::has('login'))
          <div class="btn-group">
            @auth
            <button class="btn-filled-dark">
             <a href="{{ url('/dashboard') }}" class="btn-a">DashBoard</a>
            </button>
            @else
            <button class="btn-filled-dark">
                <a href="{{ route('login') }}" class="btn-outline-dark btn-hover-color">Entrar</a>
            </button>
               @if (Route::has('register'))
               <button class="btn-filled-dark">
                   <a href="{{ route('register') }}" class="btn-outline-dark btn-hover-color">Cadastrar</a> 
                </button>
                @endif
                @endauth
          </div>
          @endif
        </section>
        <br>
        <br>
        <br>

        <section>
        

        <ul class="shop-pets">
            <li class="card-large card-light" id="sup-dog">
               
                <ul>
                Proposta
                    <li><a href="#">Os usuários autorizados terão cartões para acesso, enquanto registros detalhados serão mantidos para segurança e auditoria.</a></li>

                    

                </ul>


            </li>

            <li class="card-large card-dark" id="sup-cat">
               
                <ul>
                    Tecnologias
                    <li><a href="#">Cartões de acesso RFID/NFC.
                         <li><a>Banco de dados SQL.</a></li>
                         <li><a>Aplicativo web de administração.</a></li>
                         <li><a>Sensores de presença para ocupação.</a></li>
                    
                    
                </ul>

            </li>
            <li class="card-large card-light" id="sup-fish">
               
                <ul>
                Funcionalidades
                    <li><a href="#">Registro de usuários autorizados e horários de acesso.
                    <li><a>Monitoramento em tempo real de entradas e saídas.</a></li>
                    <li><a>Alertas de acesso não autorizado.</a></li>
                    <li><a>Relatórios de uso para gestão e auditoria.</a></li> <!-- ajeitar essa funcionalidade-->
                    
                    
                </ul>

            </li>
        </ul>
    </section>
    <br>
    <br>

    <section id="locate">

        <div>
            <h2>Sobre</h2>
            <p>A solução proposta é a implementação de um sistema de controle de acesso baseado em tecnologia. Este sistema utilizará cartões de acesso eletrônicos e um software de gestão que permitirá o controle centralizado das entradas e saídas do laboratório. Os usuários autorizados terão cartões que lhes permitirão acessar o laboratório durante os horários estipulados, enquanto um registro detalhado de todas as atividades será mantido para fins de segurança e auditoria.</p>
            <div class="btn-group">
                <button class="btn-filled-dark">
  <a href="https://github.com/LukeVanHagen/Projeto3IF" target="_blank" class="btn-outline-dark btn-hover-color">GitHub</a>
            </div>
            </button>
            </div>
    </section>

    <footer>

        <ul>
           
        </ul>

    </footer>

    </body>
</html>

