<?php 


include "koneksi.php";

$data = $db->query("SELECT k.kdmember, m.nm_member FROM kemungkinan k inner join member m on k.kdmember = m.kdmember");

echo json_encode($data->fetchAll());




 ?>