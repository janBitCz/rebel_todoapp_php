<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


// require stuff
require_once 'vendor/autoload.php';


// global variables
$base_url = 'http://localhost:8888';

// Using Medoo namespace.
use Medoo\Medoo;

// connect to db
$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'todo',
	'server'        => 'localhost',
	'username'      => 'root',
	'password'      => 'root',
	'charset'       => 'utf8'
]);


// global functions
function show_404()
{
	header("HTTP/1.0 404 Not Found");
	include_once "404.php";
	die();
}

function get_item()
{
	// if we have no id, or if id is empty
	if ( ! isset($_GET['id']) || empty($_GET['id']) ) {
		return false;
	}

	global $database;

	$item = $database->get("items", "text", [
		"id" => $_GET['id']
	]);

	if ( ! $item ) {
		return false;
	}

	return $item;
}


function is_ajax()
{
	return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest' );
}