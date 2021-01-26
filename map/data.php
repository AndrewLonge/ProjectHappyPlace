<?php
require_once 'marker.class.php';
require_once '../database.class.php';

$markers = Marker::fetchAll($connection);
