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
	height: 100%;
	background-color: #f0f2f2;
	padding: 20px;
	border-radius: 10px;
}



p,a,label{
	color:  rgb(61, 61, 61); text-shadow: rgb(242, 242, 242) 0.1em 0.1em 0.1em;
	font-size: large;
}
.divesp{
	margin-top: 3%;
	
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
	font-
}


label input{
	width: 300px;
	border-radius: 5px;
	margin-top: -10px;
	height: 30px;
	text-align: center;	
}

.selectarq{
	width: 300px;
	border-radius: 5px;
	margin-top: -10px;
	height: 33px;

}

.button-39 {
	width: 70%;

  background-color: #FFFFFF;
  border: 1px solid rgb(209,213,219);
  border-radius: .5rem;
  box-sizing: border-box;
  color: #111827;
  font-family: "Inter var",ui-sans-serif,system-ui,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: .875rem;
  font-weight: 600;
  line-height: 1.25rem;
  padding: .75rem 1rem;
  text-align: center;
  text-decoration: none #D1D5DB solid;
  text-decoration-thickness: auto;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  margin-top: -10px;
  margin-bottom: -10px;
}

.button-39:hover {
  background-color: rgb(216, 216, 216);
}

.button-39:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.button-39:focus-visible {
  box-shadow: none;
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
		<label for="nome">
		<p>NOME COMPLETO:</p>
			<input type="text" name="nome" id="nome" maxlength="38" required>
		</label>	

		
		<label for="cargo">
		<p>CARGO:</p>
			<input type="text" name="cargo" maxlength="32" required>
		</label><br>
		
		<label for="matricula">
		<p>MATRICULA:</p>
			<input type="text" name="matricula" maxlength="14" required>
		</label>

		
		
		<label for="cpf">
		<p>CPF:</p>
			<input type="text" name="cpf" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" required >
		</label><br>
		

		
		<label for="rg">
		<p>RG:</p>
			<input type="text" name="rg"  maxlength="12" onkeydown="javascript: fMasc( this, mCEP );" required >
		</label>
		
		<label for="unidade">
		<p>UNIDADE:</p>
		<select id="unidade" name="unidade"  class="selectarq" required>
		<option name="unidade" value="" selected="selected">Selecione</option>
		<option name="unidade" value="Cisbaf">Cisbaf</option>
		<option name="unidade" value="Upa">Jardim Iris</option>
		<option name="unidade" value="Triagem">Centro de Triagem</option>
	</select>
		</label>


		<div class='arqv'> 
		<label for="arquivo">
		<p>Arquivo:</p>
			<input type="file" name="file[]" class="selectarq" required multiple="multiple"style="
    background-color: #a89200;
    border-radius: 5px;
    color: white;
"> 
		</label><br><br>
		</div>
		<button class="button-39" type="submit">Gerar Cracha</button>
		<a href="impressao.php"><img src="imgs/btnimprimir.png" style="width:40px; height: 40px;" /></a>
	</div>
	


	

</form>


<script> 	
	data = new Date()
	var ano = data.getFullYear();
	var mes = data.getMonth()+1;
	var dia = data.getDate();
	var hora = data.getHours();
	var minuto = data.getMinutes();
	var segundo = data.getSeconds();

	if(dia.toString().length == 1) dia = '0'+dia;
	if(mes.toString().length == 1) mes = '0'+mes;


	if(hora.toString().length == 1) hora = '0'+hora;
	if(minuto.toString().length == 1) minuto = '0'+minuto;
	if(segundo.toString().length == 1) segundo = '0'+segundo;

	var datacompleta = +hora+minuto+segundo;


	console.log(datacompleta);
	
</script>
<script src="srx.js" > </script>
<script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
		</script>

</body>
</html>