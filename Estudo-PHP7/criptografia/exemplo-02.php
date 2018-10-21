<?php

define('SECRET_IV', pack('016', 'senha'));
define('SECRET', pack('016', 'senha'));

$data = [
    "nome" => "Hcode"
];

$openssl = openssl_encrypt(
    json_encode($data),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);


$final = base64_encode($mcrypt);
var_dump($final);

$string = openssl_decrypt(
    $openssl,
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);

var_dump(json_decode($string, true));
?>