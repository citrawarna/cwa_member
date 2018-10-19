<?php 
 include "koneksi.php";
$title = "Data Member";

if(!isset($_GET['kdmember'])){
   header('location:index.php');
} else {
   $kd = $_GET['kdmember'];
   if(strpos($kd, '-') !== false){
      $kd = str_replace('-', '', $kd); 
      
   } 
   $kode = substr($kd, 1, 1);
   if($kode != 0){
      $kd = substr($kd, 1);
      $addition = "0";
   } else {
      $kd = substr($kd, 2);
      $addition = "00";
   }
    
   $member = $db->query("SELECT * FROM member WHERE kdmember = '".$kd."' ")->fetch();
   if(!$member) {
      echo "<script> alert('Data member tidak ada.'); location.href='index.php'</script>";
      
   }

   $content = $addition . $kd . "<br>" . $member['nm_member'];

   $penjualan = $db->query("SELECT * FROM score_member inner join penjualan_member on score_member.nmor = penjualan_member.nmor where score_member.kdmember = '$kd' GROUP by score_member.nmor ");

   
   
}

require_once('layouts/header.php') ?>
     
      <div class="container ">
         <div class="bg-content">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="title-table">Total Point : <?= $member['total_point'] ?> </h3>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <table class="table">
                     <tr>
                        
                        <th>Tanggal</th>
                        <th>Nota</th>
                        <th>Total</th>
                        <th>Action</th>
                        
                     </tr>
                    <?php 
                    $tot = 0;
                     foreach($penjualan as $row){
                     $tot += $row['total'];    
                     ?>
                     <tr>
                        <td><?= $row['tggl'] ?></td>
                        <td><?= $row['nmor'] ?></td>
                        <td><?= number_format($row['total']) ?></td>
                        <td><a href="<?= 'view.php?kdmember='.$_GET['kdmember'].'&modal='.$row['nmor'] ?>" class="btn btn-sm btn-secondary">Details</a></td>
                     </tr>
                     <?php } ?>
                     <tr>
                    
                        <td colspan="2"><b>Total</b></td>
                        <td colspan="2"><?= number_format($tot) ?></td>
                        
                     </tr>
                      
                  </table>
               </div>
            </div>
         </div>
         
      </div>

<?php 
if(isset($_GET['modal'])){
   $nota = $_GET['modal'];
   $data = $db->query("SELECT * FROM penjualan_member WHERE nmor = '$nota'");
}
 ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h5>Nota Nomor : <?= $_GET['modal'] ?></h5>
         <br>
        <table class="table table-sm table-striped">
           <thead>
              <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th>Lokasi</th>
              </tr>
           </thead>
           <tbody>
               <?php 
               $no = 1;
               $total = 0;
               foreach($data as $jual){
               ?>
              <tr>
                 <td><?= $no++ ?></td>
                 <td><?= $jual['tggl'] ?></td>
                 <td><?= $jual['nmbr'] ?></td>
                 <td><?= $jual['juml'] ?></td>
                 <td><?= number_format($jual['hrga']) ?></td>
                 <td><?= number_format($jual['ttal']) ?></td>
                 <td><?= $jual['kdgd'] ?></td>

              </tr>
           <?php $total += $jual['ttal']; } ?>
               
           </tbody>
           <tfoot>
              <tr>
                  <td colspan="5"><b>Total</b></td>
                  <td colspan="2"><?= number_format($total) ?></td>
               </tr>
               <tr>
                  <td colspan="5"><b>Poin</b></td>
                  <td colspan="2"><?= floor($total/100000) ?></td>
               </tr>
           </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 
require_once('layouts/footer.php');
?>