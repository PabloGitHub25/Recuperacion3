<?php
$v1=$_GET['var1'];
if($v1==1)
{
    include("../View/VIngresoTarea.php");
}elseif($v1==2)
{
    include("../Model/MMostrar.php");
}
else
{
    echo "No se seleccionó nada";
}
?>
