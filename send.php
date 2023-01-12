<?php
$name		=	$_POST["name"];
$mail		=	$_POST["mail"];
$phone		=	$_POST["phone"];
$message	=	$_POST["message"];
$attachment =   $_FILES["attachment"];
	
if (!$name || !$mail || !$phone || !$message) {
echo "<p align=center>Favor preencher todos os campos!</p><br>";
echo "<p align=center><a href=\"javascript:history.back(1)\">Voltar</a></p>";
}else{
echo "<p align=center>Informações enviadas com Sucesso!</p>";
$mens = "<font size=2 face=Verdana><p align=center>:: Mensagem enviada do Site ::<br></p>";
$mens .= "<b>Nome:</b> $name<br>";
$mens .= "<b>E-mail:</b> $mail<br>";
$mens .= "<b>Telefone:</b> $phone<br>";
$mens .= "<b>Mensagem:</b> $message<br>";

if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
 
    $fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); // Abri o arquivo enviado.
 $anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); // Le o arquivo aberto na linha anterior
 $anexo = base64_encode($anexo); // Codifica os dados com MIME para o e-mail 
 fclose($fp); // Fecha o arquivo aberto anteriormente
    $anexo = chunk_split($anexo); // Divide a variável do arquivo em pequenos pedaços para poder enviar
    $mensagem = "--$boundary\n"; // Nas linhas abaixo possuem os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
    $mensagem.= "$corpo_mensagem\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: ".$arquivo["type"]."\n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 
}
 else // Caso não tenha anexo
 {
 $mensagem = "--$boundary\n"; 
 $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
 $mensagem.= "Content-Type: text/html; charset=\"utf-8\"\n\n";
 $mensagem.= "$corpo_mensagem\n";
}


$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: 'Mensagem do Site' <" .$mail. ">\r\n";
 
mail("corporativo@escbandeirantes.com.br","Messagem via site.","$mens", $headers);
echo "<p align=center><a href=\"javascript:history.back(1)\">Voltar</a></p>";
}
?>