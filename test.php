<?php

$password = 'sadasdasdas';
$hash = password_hash($password, PASSWORD_BCRYPT);

if (password_verify($password, $hash)) {
	echo $hash;
    echo 'correct';
}