<?php

	require_once 'config.php';
	
	// input monitoring
	$task = htmlspecialchars($_POST['message']);

	// add new task
	if (!$task){
		die();

	} else {
		$id = $database->insert('items', [
		'text' => $task,
		]);
	}

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