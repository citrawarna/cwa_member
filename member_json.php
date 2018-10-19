<?php 

include "koneksi.php";

$data = $db->query("SELECT k.kdmember, m.nm_member FROM kemungkinan k inner join member m on k.kdmember = m.kdmember");

$convert = json_encode($data->fetchAll());

echo $convert;


 ?>