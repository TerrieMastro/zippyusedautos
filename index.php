<?php
require('./model/database.php');
require('./model/class_db.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/vehicle_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}
$order = filter_input(INPUT_POST, 'order', FILTER_VALIDATE_INT);
if(!$order){
    $order = filter_input(INPUT_GET, 'order', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action');
if(!$action){
    $action = filter_input(INPUT_GET, 'action');
    if(!$action){
        $action = 'list_vehicles';
    }
}

switch($action) {
    default:
        $class_name = get_class_name($class_id);
        $make_name = get_make_name($make_id);
        $type_name = get_type_name($type_id);
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        $vehicles = get_vehicles($make_id, $type_id, $class_id, $order);
        include('../view/vehicle_list.php');
}