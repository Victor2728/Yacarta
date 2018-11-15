<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>

<?php
if(isset($_GET['id'])) {
$link = mysqli_connect("127.0.0.1","root","","yacarta");
$id = mysqli_real_escape_string($link,$_GET['id']);
$action = mysqli_real_escape_string($link,$_GET['action']);

if($action == 'aceptar') {

	$update = mysqli_query($link,"UPDATE amigos SET estado = '1' WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}

if($action == 'rechazar') {

	$delete = mysqli_query($link,"DELETE FROM amigos WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}



}