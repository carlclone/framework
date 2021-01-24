<?php

$name = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');

//防 XSS
printf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));