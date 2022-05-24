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