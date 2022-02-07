<?php 

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

?>