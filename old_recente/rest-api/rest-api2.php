<?php
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);
 
// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;
 
echo "Method ".$method."<br>";
echo "Table ".$table."<br>";
echo "Entrada ".var_dump($input);
echo '<pre>' . print_r($input, true) . '</pre>';

$cedula = $input['cedula'];
echo "Cedula ".$cedula;

