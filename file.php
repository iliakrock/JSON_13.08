<?php

$jsonString = file_get_contents('test.json');


$arr = json_decode($jsonString, true);

print_r($arr);