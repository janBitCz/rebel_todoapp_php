<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


// require stuff
require_once 'vendor/autoload.php';


// global variables
require_once 'variables.php';

// connect to database
require_once 'database.php';

// global functions
require_once 'functions.php';