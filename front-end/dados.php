<!DOCTYPE HTML>

<html>
<head>
<meta charset="UTF-8" lang="PT-BR">
<title>Gerar Cracha</title>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&family=Roboto+Condensed:ital,wght@1,700&display=swap');


body{
	width: 100%;
	height: 700px;	
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
	height: 650px;
	background-color: #f0f2f2;
	padding: 20px;
	border-radius: 10px;
}



p,a,label{
	color:  rgb(61, 61, 61); text-shadow: rgb(242, 242, 242) 0.1em 0.1em 0.1em;
	font-size: large;
}



select{
	border: solid 1px black;
	border-radius: 5px;
	width: 200px;
	height: 35px;
	
}

.campos h1{
	font-family: 'Roboto Condensed', sans-serif;
	color: rgb(255, 208, 18); text-shadow: rgb(54, 54, 54) 0.1em 0.1em 0.1em;
	font-size: 72px;
}


label input{
	border-radius: 5px;
	margin-top: -10px;
	height: 30px;
}

.selectarq{
	height: 33px;
	width: 70%;

}
.c-loader {
  animation: is-rotating 1s infinite;
  border: 6px solid #e5e5e5;
  border-radius: 50%;
  border-top-color: #51d4db;
  height: 100px;
  width: 100px;
  margin-left: 40%;
  margin-top: 20px;
  margin-bottom: 20px;
  
}

@keyframes is-rotating {
  to {
    transform: rotate(1turn);
  }
}
.divesp{
  margin-top: 3%;
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>


<body>
	<div class="divesp">
	
	</div>
	

<form method="post" action="dados.php" enctype="multipart/form-data">

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
           <br>
		   <br>
		   <br>
		   <br>
		   <br>
		   <br><br>
            <h5>O CRACHA ESTÁ SENDO GERADO!</h5>
			<br>
          <div class="c-loader"></div>
		  <br>
          <h3> AGUARDE...</h3>
        
        </div>
        </div>

	</div>
	
</body>
</html>

<?php
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";




$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST,"cargo",FILTER_SANITIZE_STRING);
$matricula = filter_input(INPUT_POST,"matricula",FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST,"cpf",FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST,"rg",FILTER_SANITIZE_STRING);
$unidade = filter_input(INPUT_POST,"unidade",FILTER_SANITIZE_STRING);
$nomeArquivo;
$finalizado = 0;
static $fileError = false;


$_SESSION["matricula"] = $matricula;

if(isset($nome) && $nome != "" && isset($cargo) && $cargo != "" && isset($matricula) && $matricula != ""){
	
	 foreach($_FILES['file']['name'] as $key => $caminho){
		 
		if($_FILES['file']['name'] != "" && $_FILES['file']['name'] != null){
			$nomeArquivo = $_FILES['file']['name'][$key];
			$localTemp = $_FILES['file']['tmp_name'][$key];
			$newNameFile = str_replace(" ","",$nomeArquivo);
			$newNameFile = str_replace("!","@",$newNameFile);
			$fileType = $_FILES["file"]["type"][$key];
			$newLocal = "C:\\xampp\htdocs\\fotos\\".$newNameFile;
			
			 if($fileType == "image/png" || $fileType == "image/jpeg" && $fileType != 'application/octet-stream'){				 
				move_uploaded_file($localTemp,$newLocal);							
			}else{  				
				$fileError = true;
				header("location:error.php");
			}

		}
		
	}

}else{
	echo "Falta dados";
}


echo "
<script>
var xhr = new XMLHttpRequest();
var url = 'http://127.0.0.1:8000/create';
xhr.open('POST', url, true);
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var json = JSON.parse(xhr.responseText);
		window.location.href='impressao.php';
		
    }else if(xhr.status == 0){
		alert('Servidor Desligado');
		window.location.href='index.php';
	}
};
var data = JSON.stringify({'unity': '$unidade', 'name': '$nome', 'job': '$cargo'
	, 'cpf': '$cpf', 'rg': '$rg', 'registration': '$matricula', 'photo': '$newNameFile'});
xhr.send(data);

</script>
";

?>