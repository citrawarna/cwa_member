    <div class="copy">
         <p>&copy;2018 by Refo Junior </p>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <?php if(isset($_GET['modal'])) { ?>
      <script>
          $(window).on('load',function(){
              $('#exampleModal').modal('show');
          });
      </script>
      <?php } ?>
          
    <script>
      $(".modal").on("hidden.bs.modal", function(){
          window.history.back();
      });
    </script>      

    <!-- pengundian -->
    <script>
    var names = document.getElementById("winner");
    var val = document.getElementById('val');
    function showUser(){
      
      var btnShake = document.getElementById('btnShake');

      
      console.log(val);
      if(val.value == "0"){
        document.getElementById('btnShake').innerHTML = "Stop...";
        document.getElementById('btnShake').classList.add("btn-danger");
        document.getElementById('btnShake').classList.remove("btn-primary");
        val.value = "1";
        
        shake();
      } else {
       
        document.getElementById('btnShake').innerHTML = "Shake";
        document.getElementById('btnShake').classList.add("btn-primary");
        document.getElementById('btnShake').classList.remove("btn-danger");
        val.value = "0";
      }
    }

    function shake(){
      //logic : catet panjang data json. method math random. jalankan query dengan where index numbernya randomnya

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          var member = JSON.parse(this.responseText);
          var id = setInterval(kocok, 10);
          function kocok(){
            if(val.value == "0"){
              clearInterval(id);
            } else {
              var lucky = member[Math.floor((Math.random()*member.length) + 0)];
              var stringNull;
              if(lucky.kdmember.length == 5 || lucky.kdmember.length == "5"){
                stringNull = "00";
              } else {
                stringNull = "0";
              }
              names.innerHTML = stringNull + lucky.kdmember + " - " + lucky.nm_member;
            }
          }
        }
      };
      xhttp.open("GET", "member_json.php", true);
      xhttp.send();        
    }

    </script>

   </body>
</html>