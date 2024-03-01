<?php
$v1=$_GET['var1'];
if($v1==1)
{
    include("../View/VIngresoTarea.php");
}elseif($v1==2)
{
    include("../Model/MMostrar.php");
}
elseif($v1==3)
{
    include("../index.html");
}
else
{
    echo "No se seleccionó nada";
}
?>
