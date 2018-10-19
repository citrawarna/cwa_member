<?php 
include "koneksi.php";
$title = "Welcome ";
$content = "Welcome Citra Warna Member";
require_once('layouts/header.php');
?>
   
      <div class="slid-bothside">
         <div class="slid-left-w3">
            <!-- Slideshow 4 -->
            <div class="slider">
               <div class="callbacks_container">
                  <ul class="rslides" id="slider4">
                     <li>
                        <div class="slider-img">
                           <div class="container">
                             
                                 <h4>Masukan Nomor Kartu Anda : </h4>
                                 <br><br>
                           </div>
                        </div>
                     </li>
                     
                  </ul>
               </div>
              
            </div>
            <div class="clear" style="margin-bottom: -90px"></div>
         </div>
         <div class="slid-right-w3">
            <form action="view.php" method="get">
               
               <div class="form-left-to-w3l">
                  <input type="text" name="kdmember" placeholder="contoh : 001-10xx" required="" autofocus="">
               </div>
               
               <div class="btnn">
                  <button type="submit">Cari</button><br>
               </div>
            </form>
         </div>
      </div>

      
<?php 
require_once('layouts/footer.php');
?>