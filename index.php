<?php
$conn = ibase_connect("localhost:C:/Prueba/ADMIN.MDF", "SYSDBA", "masterkey");
$sentencia = 'select rdb$relation_name as tabla
from rdb$relations
where rdb$view_blr is null 
and (rdb$system_flag is null or rdb$system_flag = 0)';
$gestor_sent = ibase_query($conn, $sentencia);
$file = 'consultas.sql';
file_put_contents($file, "");
while ($fila = ibase_fetch_assoc($gestor_sent)) {
    file_put_contents($file, trim($fila['TABLA'])."\n",FILE_APPEND);
}
ibase_free_result($gestor_sent);
ibase_close($conn);
?>