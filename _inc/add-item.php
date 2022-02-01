<?php

	// include
	require 'config.php';

	// add new stuff
	$id = $database->insert('items', [
		'text' => $_POST['message'],
		
	]);

	// success?
	if ( ! $id ) die('error');
	
	// získání id z DB nově Meedo
	$id_item = $database->id();

	if ( is_ajax() ) {
		header('Content-Type: application/json');

		$message = json_encode([
			'status' => 'success',
			'id' => $id_item
		]);

		die( $message );
	
	} else {
		header("Location: $base_url/index.php");
		die();
	}