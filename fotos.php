<?php
$link = mysqli_connect("127.0.0.1","root","","yacarta");
$id = mysqli_real_escape_string($link,$_GET['id']);

?>

                <center>
                <?php
                $fotosa = mysqli_query($link,"SELECT * FROM albumes WHERE usuario = '$id' ORDER BY id_alb asc");
                while($fot=mysqli_fetch_array($fotosa))
                {
                $fotalb = mysqli_query($link,"SELECT ruta FROM fotos WHERE album = '$fot[id_alb]' ORDER BY id_fot DESC");
                $fotal = mysqli_fetch_array($fotalb);
                ?>
                  <a href="?id=<?php echo $id;?>&album=<?php echo $fot[id_alb]; ?>&perfil=albumes"><img src="publicaciones/<?php echo $fotal['ruta'];?>" width="19%"> </a>
                  <br>
                  <?php echo $fot['nombre']; ?>
                <?php
                }
                ?>
                </center>