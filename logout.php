<?php
require('functions.php');
// Comprobamos si tenemos alguna sesi�n iniciada
if (userIsAuth()) {
  if ( !isset($_SESSION) ){
    session_start();
  }

  unset($_SESSION['user']);
  session_destroy();

  echo 'Hasta la <a href="login.php">pr�xima</a> <img src="http://netflie.es/blog/wp-includes/images/smilies/icon_biggrin.gif" alt=":D" class="wp-smiley"> ';

} else {
  echo 'no tienes ninguna sesi�n de usuario activa | <a href="index.php">Iniciar sesi�n</a>';
}
