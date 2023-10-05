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
       
            
        <section class="hero">
          <h1>Controle de Acesso ao Laboratório Universitário</h1>
          @if (Route::has('login'))
          <div class="btn-group">
            @auth
            <button class="btn-filled-dark">
             <a href="{{ url('/dashboard') }}" class="btn-a">DashBoard</a>
            </button>
            @else
            <button class="btn-filled-dark">
                <a href="{{ route('login') }}" class="btn-a">Entrar</a>
            </button>
               @if (Route::has('register'))
               <button class="btn-outline-dark btn-hover-color">
                   <a href="{{ route('register') }}" class="btn-a">Cadastrar</a> 
                </button>
                @endif
                @endauth
          </div>
          @endif
        </section>

        <section>
        <h2>Digite algo aqui</h2>

        <ul class="shop-pets">
            <li class="card-large card-light" id="sup-dog">
               
                <ul>
                    Digite aqui
                    <li><a href="#">Aqui tambem se quiser</a></li>
<!-- Esses botoes talvez fique -->
                    <button class="btn-outline-light">Veja</button>

                </ul>


            </li>

            <li class="card-large card-dark" id="sup-cat">
               
                <ul>Digite aqui
                    <li><a href="#">Aqui tambem se quiser</a></li>
                    
                    <button class="btn-outline-light">Veja</button>
                </ul>

            </li>

            <li class="card-large card-dark" id="sup-bird">
               
                <ul>Digite aqui
                    <li><a href="#">Aqui tambem se quiser</a></li>
                    <button class="btn-outline-light">Veja</button>
                </ul>

            </li>
            <li class="card-large card-light" id="sup-fish">
               
                <ul>
                    Digite algo
                    <li><a href="#">Aqui tambem se quiser</a></li>
                    
                    <button class="btn-outline-light">Veja</button>
                </ul>

            </li>
        </ul>
    </section>

    <section id="locate">

        <div>
            <h2>Sobre</h2>
            <p>A solução proposta é a implementação de um sistema de controle de acesso baseado em tecnologia. Este sistema utilizará cartões de acesso eletrônicos e um software de gestão que permitirá o controle centralizado das entradas e saídas do laboratório. Os usuários autorizados terão cartões que lhes permitirão acessar o laboratório durante os horários estipulados, enquanto um registro detalhado de todas as atividades será mantido para fins de segurança e auditoria.</p>
            <div class="btn-group">
                <button class="btn-outline-dark btn-hover-color">GitHub</button>
            </div>
        </div>
    </section>

    <footer>

        <ul>
           
        </ul>

    </footer>

    </body>
</html>
