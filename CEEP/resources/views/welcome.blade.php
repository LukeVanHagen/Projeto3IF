/* welcome */

body {
    font-family: "Poppins", sans-serif;
	font-weight: 500;
	transition: all 0.2s ease;

	background: #f9f9f9;
    margin: 0;
	width: 100vw;
	overflow-x: hidden;
}
.foter-img {
    width: 400px; /* Defina a largura desejada da imagem */
    height: auto; /* Mantenha a proporção original da imagem */
    position: absolute; /* Posicionamento absoluto em relação ao elemento pai */
    top: 10px; /* Distância do topo da tela */
    right: 80px; /* Distância da direita da tela */
  }

* {
box-sizing: border-box;
padding: 0;
margin: 0;
}

header {
/*    width: 100%;*/
height: auto;
position: sticky;
top: 0;
/*    border: 1px solid red;*/
z-index: 100;
}

nav {
color: var(--text-01);
font-weight: 600;
height: 64px;
background: var(--light-01);
display: flex;
flex-direction: row;
align-items: center;
justify-content: space-between;
padding: 0 var(--pg-margin);
z-index: 100;
}

nav ul.navigation-menu {
display: flex;
flex-direction: row;
flex: 1;
justify-content: center;
position: relative;
top: 0;
}

nav .navigation-menu a {
font-size: 20px;
text-decoration: none;
color: var(--text-01);

}

nav .navigation-menu > li {
display: flex;
flex-direction: column;
align-items: center;
/*    justify-items: center;*/
}

.navigation-menu .strong {
	font-weight: bold;
	color: rgba(62,57,66); 
  }
  
  
  .navigation-menu .underline {
	text-decoration: underline;
	color: rgba(62,57,66); 
  }

nav .navigation-menu > li > a {
position: relative;
/*    border: 1px solid purple;*/
padding: 0 20px;
height: 64px;
display: flex;
align-items: center;
justify-items: center;

}

nav > #utility {
display: flex;
flex-direction: row;
align-items: center;
grid-gap: 16px;
}

/* session 1 */

section.hero {
	/*    width: 100%;*/
	
	background: #6133ac;;
	padding: 0 1em;
	margin: 0;
}

.titulo_home {
	font-size: 40px;
	font-weight: normal;
	line-height: 1.2;
	color: white;
	margin: 0;
}

.subtitu_home {
    margin: 1.2rem 0;
    font-size: 15px;
    color: #ffffff;
}



.btn-a {
    text-decoration: none;
}

:root {
    --pg-margin: 16px;
}

section:not(.hero) {
	padding: calc(var(--pg-margin) / 2) var(--pg-margin);
}

section h2 {
	font-size: 23px;
	font-weight: 100;
	line-height: 1.2;
	text-align: left; /* Alinhamento à esquerda */
	color: #f9f9f9;
	margin-bottom: 32px;
	max-width: 400px; /* Define a largura máxima */
	display: block; /* Torna o elemento em bloco para empilhar um abaixo do outro */
	padding-left: 20px; 
  }
  

/*seccion 2*/

.sec-card {
	display: flex;
	justify-content: space-around;
	margin: 0;
	padding: 0;
}

.card-cont {
	width: 300px;
	height: 350px;
	padding: 10px;
	margin: 10px;
	text-align: center;
	border-radius: 10px;
	background-color: rgb(255, 255, 255);
	box-shadow:  0px 4px 8px rgba(0, 0, 0, 0.2);
	transition: transform 0.3s ease;
	
}
.card-cont:hover{
	transform: scale(1.1);
}
.proposta{
	background-color: #51BAF2; 
    color: #ffffff; 
}
.tecnologias{
	background-color: #A284E8; 
    color: #3E3942; 
}
.funcionalidades{
	background-color: #399DAB; 
    color: #ffffff; 
}
.outras{
	background-color: #D2B8FC; 
    color: #3E3942; 
}
.p-titu {
	margin: 20px;
	font-size: 20px;
}

.p-info {
	margin: 20px;
	text-align: justify;
}



/* Butoes */

button {
	font-size: 14px;
	font-weight: 600;
	line-height: 24px;
	padding: 12px 24px;
	border-radius: 48px;
	display: flex;
	flex-direction: row;
	grid-gap: 8px;
	justify-content: center;
	align-items: center;
	cursor: pointer;
}

.btn-hover-color {
	color: #fff;
}

.btn-hover-color:hover {
	color: #6133ac;
}

/* esse é o vazado*/
button.btn-outline {
	color: #f9f9f9;
	border-color: #f9f9f9;
}

button.btn-outline-light {
	color: #f9f9f9;
	background: none;
	color: #f9f9f9;
	border: 2px solid #f9f9f9;
}

button.btn-outline-dark {
	color: #51BAF2;
	background: none;
	color: #51BAF2;
	border: 2px solid #51BAF2;
}

/*Esse é o preenchido*/
button.btn-filled-dark {
	color: #f9f9f9;
	background-color: #51BAF2;
    border: 1px solid #51BAF2;
}

/*Esse é o vazado com o hover*/
.btn-outline-dark:hover {
	background-color: transparent;
	border: 2px solid #51baf2 ;
}

.btn-outline-light:hover {
	background: #f9f9f9;
	border: 2px solid #f9f9f9;
	color:  #45413e;
}

button:hover,
.btn-outline-dark.btn-hover-color:hover {
	color: #6133ac;
    background-color: #fff;
    cursor: pointer;
	border: 1px solid #fff;
	transition: all 0.2s ease;
	box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.15);
}


.btn-group {
	display: flex;
	flex-direction: row;
	grid-gap: 16px;
	
  }
  
  .btn-group a {
	text-decoration: none; /* Remove o sublinhado */
  }
  
  .btn-group a.btn-custom {
	display: inline-block;
	padding: 10px 20px;
	color: #ffffff; /* Cor do texto */
	border: none;
	border-radius: 5px;
	cursor: pointer;
	transition: background-color 0.3s ease; /* Efeito de transição de cor ao passar o mouse */
  }
  
  .btn-group a.btn-custom:hover {
	background-color: #A284E8; 
  }
  

/*sobre*/

#locate > div {
	background: #6133ac;;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 90px 0;
	border-radius: 12px;
	box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
	transition: all 0.2s ease;
	cursor: pointer;
}

#locate > div:hover {
	box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.15);
}

#locate h2 {
	margin-top: 0;
	color: white;
}

#locate p {
	line-height: 1.5;
	margin-bottom: 40px;
	width: 50%;
	text-align: center;
	color: white;
}


/*footer*/

section,
footer {
	position: relative;
	width: 100%;
	padding: 0 16px
}
footer {
	background: #45413e;
	padding: 80px 80px 0px;
	margin-top: 80px;
	display: flex;
}

footer ul {
	display: flex;
	flex-direction: column;
	grid-gap: 24px;
	box-shadow: none;
	flex: 1;
	color: #f9f9f9;
	font-size: 18px;
	font-weight: 600;
	margin-bottom: 80px;
}

footer ul li a {
	color: #f9f9f9;
	text-decoration: none;
	font-size: 14px;
}

footer ul li {
	color: #f9f9f9;
	padding: 0;
}

/* Responsividade */

@media only screen and (max-width: 600px) {
	:root {
		--pg-margin: 16px;
	}

	section.hero {
		aspect-ratio: 1/1;
		padding-top: 64px;
	}

	section.hero h1 {
		--hero-text: 40px;
		width: 80%;
	}

	section.hero {
		background-size: 85%;
		background-position: 360% 60%;
	}

	.btn-group {
		flex-direction: column;
	}


	section:not(.hero) {
		padding: var(--pg-margin);
	}

	#locate p {
		width: 80%;
	}

	footer {
		flex-direction: column;
		text-align: center;
	}

    .shop-pets {
		display: flex;
		flex-direction: column;
		grid-gap: 24px;
		width: 100%;
	}
}

@media only screen and (min-width: 600px) {
	:root {
		--pg-margin: 24px;
	}

	section.hero h1 {
		--hero-text: 40px;
		width: 60%;
	}

	section.hero {
		aspect-ratio: 3/2;
		background-size: 50%;
		background-position: 90% 70%;
		padding-top: 64px;
	}




	.btn-group {
		display: flex;
		flex-direction: column;
	}


	section:not(.hero) {
		padding: 0
	}

	#locate p {
		width: 60%;
	}

	footer {
		flex-direction: column;
		text-align: center;
	}

    .shop-pets {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-row: auto;
		grid-column-gap: 24px;
		grid-row-gap: 24px;
	}
}

@media only screen and (min-width: 1200px) {
	:root {
		--pg-margin: 48px;
	}

	section.hero h1 {
		--hero-text: 48px;
	}

	section.hero {
		aspect-ratio: 2/1;
	}

	.btn-group {
		flex-direction: row;
	}

	
	#locate p {
		width: 40%;
	}

	footer {
		flex-direction: row;
		text-align: left;
	}

    .shop-pets {
		display: flex;
		flex-direction: row;
		grid-gap: 24px;
	}
}

/* Mais um extra pra desktopp*/
@media only screen and (min-width: 1200px) {
	:root {
		--pg-margin: 80px;
	}

	section.hero h1 {
		--hero-text: 56px;
	}


	section.hero {
		aspect-ratio: 3/1;
		background-size: 30%;
		background-position: 90% 60%;
	}


	#locate p {
		width: 40%;
	}

	footer {
		flex-direction: row;
		text-align: left;
	}

    .shop-pets {
		display: flex;
		flex-direction: row;
		grid-gap: 24px;
	}
}

