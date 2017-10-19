<?php

	/*
	* A função serve para validar a imagem nos seguintes termos: TAMANHO (Bytes), DIMENSOES-MINIMAS-ACEITAVEIS (CxL), DIMENSOES-MAXIMAS (CxL)
	* Caso nao se identifique as variaveis tomará essas por padrao.
	* PS. A função não faz o upload apenas a Validação.
	*/
	function validarImagem($imagem, $tamanhoBytes="2000000", $dimensoesMinimas="16x16", $dimensoesMaximas="1024x768")
	{

		if(!isset($imagem)) die('Nenhuma Imagem Informada.');

		$formatosValidos = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp');

		list($width, $height) = getimagesize($imagem['tmp_name']);

		if($imagem['size'] <= 0 ) die('Tamanho de Imagem Inválido.');
		if($imagem['size'] > $tamanhoBytes ) die('Tamanho de Imagem Maior que o permitido.');

		if(!in_array($imagem['type'], $formatosValidos)) die('Formato de Imagem não Suportado.');

		
		$min = explode('x', $dimensoesMinimas);
		$max = explode('x', $dimensoesMaximas);	

		$minWidth = $min[0];	$minHeight = $min[1];
		
		$maxWidth = $max[0];	$maxHeight = $max[1];
		
		if( ($width < $minWidth) or ($height < $minHeight) ) die('A Imagem deve ser maior que <strong>'.$width.'x'.$height.'</strong>');
		if( ($width > $maxWidth) or ($height > $maxHeight) ) die('A Imagem deve ser menor que <strong>'.$width.'x'.$height.'</strong>');
	}



	/*
	* Funcao que faz o upload de uma imagem. "possivelmente validada com validarImagem()"
	* DIRECTORIO-DESTINO -> será criado caso não exista. Usado caso positivo
	* NOME-IMAGEM -> indicar o nome pelo qual a imagem deve ser chamada. Pode Ser o USERNAME do usuario por ex.
	* USAR-COMO -> Imagem de Capa, Logotipo, Photo de perfil, etc. Usar uma só palavra: 'capa, logo/logotipo, perfil, etc'
	* PLATAFORMA -> A que plataforma esta imagem está sendo enviada. ex: 'XERLIST, MATXESSA, GERNILD, etc.'
	*/
	function uploadImagem($imagem, $diretorioDestino, $nomeImagem, $usarComo, $plataforma)
	{
		if(!is_dir($diretorioDestino)): 
			if( !mkdir($diretorioDestino) ) die('Nao foi possivel criar o directorio '.$diretorioDestino); 
		endif;

		$tipo = $imagem['type'];	
		$tipo = explode("/", $tipo);
		$tipo = $tipo[1];

		$name = str_replace(" ", "", $nomeImagem);
		$agora = date('d-m-Y--H-i-s');

		$novoNome = strtoupper(trim($name)).'-'.$usarComo.'-'.strtoupper($plataforma).'-'.$agora.'.'.$tipo;

		$moverImagem = $diretorioDestino.'/'.$novoNome;		

		if( !move_uploaded_file($imagem['tmp_name'], $moverImagem) ): die('Ficheiro Nao Enviado.'); endif;
	}

	
	/*
	* A função remove a imagem informada como parametro.
	*/
	function removerImagem($imagem)
	{
		if(!file_exists($imagem)): die('Imagem Nao Encontrada'); endif;

		if(!unlink($imagem)): die('A Imagem não foi removida.'); endif;
	}
?>