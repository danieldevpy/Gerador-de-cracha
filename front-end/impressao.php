<?php 

session_start();


?>


<!DOCTYPE HTML>

<html>
<head>
<meta charset="UTF-8" lang="PT-BR">
<title>Gerar Cracha</title>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&family=Roboto+Condensed:ital,wght@1,700&display=swap');


body{
	width: 100%;
	min-height: 700px;	
	padding: 0;	
	background-image: url('imgs/fundin.png');
	background-size: cover;
	background-repeat: repeat;	

}
label {
	margin-bottom: 5px;
}

.campos{
	height: 10%;
	width: 800px;			
	border: 1px solid transparent;
	margin:auto;
	padding: 10px;	
	text-align:center;
	border-radius: 5px;
	box-shadow: 0 0 3em rgb(112, 94, 0);
	background-color:#fafafa;
	display: flex;
	
	
	
}
.esquerdo{
	width: 50%;
	display: flex;
	flex-direction: column;
	padding: 20px;
	align-items: center;

}
.esquerdo img{
	width: 50%;
	border: solid 0.5px #AAAAAA;
	border-radius: 5px;
}
.ch6{
	text-align: start;
	width: 80%;
	line-height: 25px;
}

.ph6 h6{

	font-size: 12px;

}
.direito{
	width: 50%;
	min-height: 650px;
	background-color: #f0f2f2;
	padding: 20px;
	border-radius: 10px;
}

#scales{
	margin-top:5px;
}

p,a,label{

	font-size: large;
}

.campos h1{
	font-family: 'Roboto Condensed', sans-serif;
	color: rgb(255, 208, 18); text-shadow: rgb(54, 54, 54) 0.1em 0.1em 0.1em;
	font-size: 72px;
}

.arqv {
    display: flex;
    flex-direction: column;
    align-items: center;
	flex-grow: 5;
    
}
#checkb{
    width: 300px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    background-color: #c29305;
    margin-bottom: 5px;
    gap: 20px;
    border-radius: 5px;
    padding: 5px;
	height: 35px;
	color: white;

}

#checkb:hover{

    background-color: #baa052;

    

}
.button-39{
    width:85%;
	height:40px;
	margin-bottom:5px;
	border:none;
	border-radius:4px;
}
.button-39:hover{
    background-color: black;

}
	


.divesp{
  margin-top: 3%;
}
.scroll{
	width: auto;
	max-height: 400px;
	overflow: hidden;
	overflow-y: scroll;
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>


<body>
	<div class="divesp">
	
	</div>
	

<form method="post" id="form" action="juntar.php" enctype="multipart/form-data">

	<div class="campos">
		<div class="esquerdo">
			<h1>CISBAF</h1>
			<br>
			<img src="imgs/cracha.png"></img>
			<br>
			<h6 class="ch6">Esse aplicativo foi desenvolvido para facilitar a criação de crachá's de forma simples e rápida, apenas preenchendo os dados do solicitante e escolhendo a unidade.</h6>
			<br>
			<br>
			<div class="ph6">
				<h6>Copyright © - Aplicativo desenvolvido pela equipe de TI CISBAF</h6>
			</div>
		</div>
		<div class="direito">
                
    <div class='arqv' id='arqv'>
		<h3>CRACHAS GERADOS</h3>
		<a href="index.php" class="novo"><img src=""> </img>+ NOVO CRACHA</a>
        <br>
		<div class="scroll" id="scroll">
		
				<script>
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					// Typical action to be performed when the document is ready:

						var str = xhttp.responseText;
						if(str.length != 2){
							const str2 = str.substring(1, str.length - 1);
							const errei = str2.split(',')
							

							for(var i of errei){
								var div = document.createElement("div");	
								div.id = "checkb";
								var input = document.createElement("input")
								input.id= "scales";
								input.value=`${i}`;
								input.type="checkbox";

								var texto = document.createElement("p");
								div.innerText = `MATRICULA: ${i}`;


								div.append(input)

								input.append(texto)


								document.getElementById("scroll").append(div)

							}
						}
					}
				};
				xhttp.open('GET', 'http://127.0.0.1:8000/search', true);
				xhttp.send();
				</script>

			</div>
                           
                </div>
        
        
                
                <br>
                <button class="button-39" onClick="mostrarSelecao();" type="button" style="background-color: green; color:white;">Juntar</button>
				<br>
                <button class="button-39" onClick="removerSelecao();" type="button" style="background-color: red; color:white;">Remover</button>
        
        </div>
        </div>
	</form>
	</div>


    <script> 	
        function mostrarSelecao(){
            
            var selecao = document.querySelectorAll("input[id='scales']:checked");
            var selecionados = [];
			if(selecao.length > 4){
				alert("Selecione apenas 4 crachas para juntar!");
			}else{
					selecao.forEach((c)=>{
					selecionados.push(c.value);					
				})
				
				if(selecionados.length != 0 && confirm("Você deseja juntar os seguintes crachas?: "+ selecionados)){
					
					var xhr = new XMLHttpRequest();
					var url = 'http://127.0.0.1:8000/join/';
					xhr.open('POST', url, true);
					xhr.setRequestHeader('Content-Type', 'application/json');
					xhr.onreadystatechange = function () {
						if (xhr.readyState === 4 && xhr.status === 200) {
							var resposta = xhr.responseText;
							const link = resposta.substring(1, resposta.length - 1);

							window.location.href=`./IMPRESSAO/${link}`;
						}
					};

					var data = JSON.stringify(selecionados);
					console.log(data)
					xhr.send(data)
					
				}
			}
           
        }

		function removerSelecao(){
            
            var selecao = document.querySelectorAll("input[id='scales']:checked");
            var selecionados = [];
			if(selecao.length){
					selecao.forEach((c)=>{
					selecionados.push(c.value);					
				})
				
				if(selecionados.length != 0 && confirm("Você deseja REMOVER ?>: "+ selecionados)){
					

					
					var xhr = new XMLHttpRequest();
					var url = 'http://127.0.0.1:8000/delete/';
					xhr.open('POST', url, true);
					xhr.setRequestHeader('Content-Type', 'application/json');
					xhr.onreadystatechange = function () {
						if (xhr.readyState === 4 && xhr.status === 200) {
							var resposta = xhr.responseText;
							alert(resposta)
							document.location.reload(true);
							
							
						}
					};

					var data = JSON.stringify(selecionados);
					console.log(data)
					xhr.send(data)
					

















				}
			}else{
				alert('Nenhum cracha selecionado!')
			}
           
        }
        
    </script>
    <script type="text/javascript" src="srx.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">	
    </script>
</body>
</html>