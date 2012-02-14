<?php
require('functions.php');
// Comprobamos si hemos iniciado sesi�n con anterioridad
if (userIsAuth()) {
  echo 'Si ya has iniciado una sesi�n. �Quieres irte? <a href="logout.php">S�</a> | <a href="index.php">No</a>';
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
    echo '�Tienes que rellenar todos los campos!';
  }
}

/*
 * Si no hab�amos iniciado sesi�n o lo hemos intentado pero ha fallado el proceso entonces mostrar� el formulario de login.
 * No voy a implementar la funci�n do_html_form_login(), lo pod�is hacer vosotros. Es un simple formulario en html.
 */
do_html_form_login();


?>
