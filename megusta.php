<?php
session_start();
include 'lib/config.php';
$link = mysqli_connect("127.0.0.1","root","","yacarta");
$post = mysqli_real_escape_string($link,$_POST['id']);
$usuario = $_SESSION['id'];


$comprobar = mysqli_query($link,"SELECT * FROM likes WHERE post = '".$post."' AND usuario = ".$usuario."");
$count = mysqli_num_rows($comprobar);

if ($count == 0) {

	$insert = mysqli_query($link,"INSERT INTO likes (usuario,post,fecha) values ('$usuario','$post',now())");
	$update = mysqli_query($link,"UPDATE publicaciones SET likes = likes+1 WHERE id_pub = '".$post."'");

}

else 

{

	$delete = mysqli_query($link,"DELETE FROM likes WHERE post = ".$post." AND usuario = ".$usuario."");
	$update = mysqli_query($link,"UPDATE publicaciones SET likes = likes-1 WHERE id_pub = '".$post."'");

}

$contar = mysqli_query($link,"SELECT likes FROM publicaciones WHERE id_pub = ".$post."");
$cont = mysqli_fetch_array($contar);
$likes = $cont['likes'];

if ($count >= 1) { $megusta = "<i class='fa fa-thumbs-o-up'></i> Me gusta"; $likes = " (".$likes++.")"; } else { $megusta = "<i class='fa fa-thumbs-o-up'></i> No me gusta"; $likes = " (".$likes--.")"; }

$datos = array('likes' =>$likes,'text' =>$megusta);

echo json_encode($datos);

?>