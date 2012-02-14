<?php
require('functions.php');
// Comprobamos si hemos iniciado sesión con anterioridad
if (userIsAuth()) {
  echo 'Si ya has iniciado una sesión. ¿Quieres irte? <a href="logout.php">Sí</a> | <a href="index.php">No</a>';
  exit;
// Comprobamos si hemos recibido algo del formulario de login y que estos datos no sean vacios
} else if ($_POST) {
  if (!empty($_POST['username']) && !empty($_POST['passwd']) ) {

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if ( login($username, $passwd) ) {
      echo 'Enhorabuena ' . htmlentities($username) . '. Te has autenticado correctamente.<script type="text/javascript">
window.location.href="index.php";
</script>';

      exit;
    } else {
      echo '<center>tus datos no coisiden o no tienes permiso de acceso</center>';
    }

  } else {
    echo '¡Tienes que rellenar todos los campos!';
  }
}

/*
 * Si no habíamos iniciado sesión o lo hemos intentado pero ha fallado el proceso entonces mostrará el formulario de login.
 * No voy a implementar la función do_html_form_login(), lo podéis hacer vosotros. Es un simple formulario en html.
 */
do_html_form_login();


?>
