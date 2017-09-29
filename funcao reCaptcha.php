<?php	
	
	function reCaptcha($setSecret, $methodToExecute){
		
		$secret = $setSecret;
		$response = $_POST['g-recaptcha-response'];
		$remoteip = $_SERVER["REMOTE_ADDR"];
		
		$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
		
		$result = json_decode($url, TRUE);
		
		if($result['success'] == 1){
			$methodToExecute;
		}
	}
	
	/* Pra chamar a funcao:
	* reCaptcha(código "Secret key" do google, função que deve ser executada em caso de sucesso)
	* colocar a div com "Site key" no formulário conforme dada no google;
	*/
	
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
