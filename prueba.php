<?php
//Creamos el archivo datos.txt
//ponemos tipo 'a' para añadir lineas sin borrar

  $enlace="lelelele ";
header ("Content-Disposition: attachment; filename=link.txt");
header ("Content-Type: application/force-download");
echo ($enlace);



  ?>