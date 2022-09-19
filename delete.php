<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: Delete");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");

include_once 'database.php';
include_once 'employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new Emlpoyee($db);
$data = json_decode(file_get_contents("php://input"));
$item->id = $data->id;

if($item->deleteEmployee()){
    echo json_encode("Employee deleted.");
}else{
    echo json_encode("Data could not be deleted.");
}
?>