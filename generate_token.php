<?php
$url		= 'http://localhost/api-shf/';
$file		= './shf/shf_access.txt';
if(isset($_POST['shf-domain']) && $_POST['shf-domain'] != '') {
	if (filter_var($_POST['shf-domain'], FILTER_VALIDATE_URL)) {
		require	__DIR__ . "/JWTHandler.php";
		$jwt		= new JwtHandler();
		$urlPage	= $_POST['shf-domain'];
		$last		= substr($urlPage, -1);
		if($last == '/') { $urlPage = substr($urlPage, 0, -1); }
		$payload	= $urlPage;
		$token		= $jwt->encode($url, $payload);
		$fileData	= file_get_contents($file);
		$users		= $urlPage . ':' . $token . '\n';
		$fileData	.= $users;

		file_put_contents($file, $fileData);
		header("Location: " . $url);
		die();
	} else {
		require	__DIR__ . "/JWTHandler.php";
		$jwt		= new JwtHandler();
		$urlPage	= $_POST['shf-domain'];
		$last		= substr($urlPage, -1);
		if($last == '/') { $urlPage = substr($urlPage, 0, -1); }
		$payload	= $urlPage;
		$token		= $jwt->encode($url, $payload);
		$fileData	= file_get_contents($file);
		$users		= $urlPage . ":" . $token . "\n";
		$fileData	.= $users;

		file_put_contents($file, $fileData);
		header("Location: " . $url);
		die();
	}
} else if(isset($_GET['shf-remove']) && $_GET['shf-remove'] != '') {
	$fileData		= file_get_contents($file);
	$objectData		= explode("\n", $fileData);
	$updateObject	= '';
	
	foreach($objectData as $domain) {
		$item =  explode(":", $domain);
		if(isset($item[1]) && $_GET['shf-remove'] !== $item[1]) {
			$updateObject .= $domain. "\n";
		}
	}

	file_put_contents($file, $updateObject);
	header("Location: " . $url);
	die();
} else {
	header("Location:" . $url);
	die();
}