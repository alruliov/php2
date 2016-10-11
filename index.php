<?php

require_once __DIR__ . '/autoload.php';

$users = \App\Model\User::findAll();

var_dump($users);