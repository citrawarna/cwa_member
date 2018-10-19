<?php 
require_once('koneksi.php');

$q = $db->query("SELECT * FROM 'kemungkinan' order by rand() limit 1");
echo $q['kdmember'];

?>