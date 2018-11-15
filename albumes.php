<?php
$link = mysqli_connect("127.0.0.1","root","","yacarta");
$id = mysqli_real_escape_string($link,$_GET['id']);
$album = mysqli_real_escape_string($link,$_GET['album']);
?>

                <center>
                <?php
                $fotosa = mysqli_query($link,"SELECT * FROM fotos WHERE usuario = '$id' AND album = '$album' ORDER BY id_fot desc");
                while($fot=mysqli_fetch_array($fotosa))
                {
                ?>
                  <a href="#"><img src="publicaciones/<?php echo $fot['ruta'];?>" width="19%"> </a>
                <?php
                }
                ?>
                </center>