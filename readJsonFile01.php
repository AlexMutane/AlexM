<?php
function readJsonFile()
{	
	//O conteúdo do ficheiro deve começar já com [...dados...] e não com parênteses. PODE passar um Local-file ou mesmo um Remote-file (link)
	$file = file_get_contents("http://api.fontedavida.org/teaching/api"); 	
	$json = json_decode($file);

	foreach ($json as $key => $value) {
		if($json[$key]->id > 460)			//O 'Index' é uma das chaves do array do arquivo json. '4' é o valor daquela chave
		{
			$link = $json[$key]->teaching_url;	//'bookEN' é a chave do valor que queremos retornar
			
			echo "<li> $link </li>";
		}	
	}
}
?>