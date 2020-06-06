#!/usr/bin/php
<?php
if (php_sapi_name() !== 'cli') {
    exit;
}
require __DIR__ . '/vendor/autoload.php';

use App\RoboOne;

$params = getopt(null, ['floor:', 'area:']);
$area = isset($params['area']) ? $params['area'] : 0;
$floor = isset($params['floor']) ? $params['floor'] : '';
$robot = new RoboOne();
$response = $robot->clean($area, $floor);
