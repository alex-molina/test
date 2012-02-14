<?php
require('functions.php');
// Comprobamos si tenemos alguna sesión iniciada
if (userIsAuth()) {
  if ( !isset($_SESSION) ){
    session_start();
  }

  unset($_SESSION['user']);
  session_destroy();

  echo 'Hasta la <a href="login.php">próxima</a> <img src="http://netflie.es/blog/wp-includes/images/smilies/icon_biggrin.gif" alt=":D" class="wp-smiley"> ';

} else {
  echo 'no tienes ninguna sesión de usuario activa | <a href="index.php">Iniciar sesión</a>';
}
