<?php
$entity = array();
require_once('includes ../database.class.php');
require_once('includes/entity.class.php');
$dbms = new Database("localhost", "root", "", "happyplace");
$entity = new Entity($dbms->getConnection(), "places");

print_r($entity->columns);

$new = new stdClass();
$new->name = "Unbekannte Ortschaft";
$entity->save($new);

$update = $entity->load(9556);
$update->name = "Affeltrangen OOOOO";
$entity->save($update);

?>