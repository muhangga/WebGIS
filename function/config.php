<?php

$host   = 'localhost';
$port   = '5432';
$user   = 'postgres';
$pass   = '123';
$dbname = 'Kelompok1';


$koneksi = pg_connect("host = $host port = $port dbname = $dbname user = $user password =$pass");

if (!$koneksi) {
    echo "koneksi gagal" . pg_error();
}
