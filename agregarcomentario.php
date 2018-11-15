<?php
require('lib/config.php');
$link = mysqli_connect("127.0.0.1","root","","yacarta");
$usuario = mysqli_real_escape_string($link,$_POST['usuario']);
$comentario = mysqli_real_escape_string($link,$_POST['comentario']);
$publicacion = mysqli_real_escape_string($link,$_POST['publicacion']);

$insert = mysqli_query($link,"INSERT INTO comentarios (usuario, comentario, fecha, publicacion) VALUES ('$usuario', '$comentario', now(), '$publicacion')");


$llamado = mysqli_query($link,"SELECT * FROM publicaciones WHERE id_pub = '".$publicacion."'");
$ll = mysqli_fetch_array($llamado);

$usuario2 = mysqli_real_escape_string($link,$ll['usuario']);

$insert2 = mysqli_query($link,"INSERT INTO notificaciones (user1, user2, tipo, leido, fecha, id_pub) VALUES ('$usuario', '$usuario2', 'ha comentado', '0', now(), '$publicacion')");


?>