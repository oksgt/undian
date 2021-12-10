<!doctype html>
<html lang="en" >

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/app.css') ?>">
  <title>Undian</title>
  <style>
    .full {
      background: url('<?php echo base_url() ?>assets/bg-1.jpg') no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
</head>

<body class="full">

  <div class="container">
    <div class="panel panel-primary" style="background-color: rgba(255, 255, 255, .30); backdrop-filter: blur(5px); border: none">
      <div class="panel-body">
        <form>
          <div class="form-group">
            <label for="input_group">Group Peserta Undian</label>
            <select class="form-control " id="input_group" name="input_group" onchange="load_pemenang()">
              <option value="0">--Silahkan Pilih--</option>
              <option value="1">Semua Cabang</option>
              <option value="2">Ajibarang</option>
              <option value="3">Banyumas</option>
              <option value="4">Purwokerto 1</option>
              <option value="5">Purwokerto 2</option>
              <option value="6">Wangon</option>
            </select>
          </div>
          <div class="form-group">
            <label for="input_hadiah">Hadiah</label>
            <input type="text" class="form-control" id="input_hadiah" name="input_hadiah" placeholder="Nama Hadiah">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-success" id="btn-example2">Proses</button>
          </div>
        </form>
      </div>
    </div>
    <div class="panel panel-primary shadow " style="background-color: rgba(255, 255, 255, .30); backdrop-filter: blur(5px); border: none">
      <div class="panel-body text-center">
        <div class="slotwrapper text-center" id="example10" style="background-color: #ffff;">
          <?php
          for ($ii = 1; $ii <= 7; $ii++) {
          ?>
            <ul style="top: 0px;">
              <?php
              for ($i = 0; $i <= 9; $i++) {
                echo '<li>' . $i . '</li>';
              }
              ?>
            </ul>
          <?php
          }
          ?>
        </div>
        <div>
          
        </div>
      </div>
    </div>
    <div class="panel panel-info" style="background-color: rgba(255, 255, 255, .80); backdrop-filter: blur(5px); border: none">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-weight: bold">Daftar Pemenang</h3>
      </div>
      <div class="panel-body" id="container-pemenang">

      </div>
    </div>
    <div id="particles-js"></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js'); ?>"></script>
  <script src="<?php echo base_url('node_modules/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
  <script src="<?= base_url('assets/slotmachine.js') ?>"></script>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"> 
    </script>
  <script>
    var socket = io('http://' + window.location.hostname + ':3000', {
      withCredentials: true,
      extraHeaders: {
        "my-custom-header": "abcd"
      }
    });

    function load_pemenang() {
      var id_group = $('#input_group').val();
      if(id_group > 0){
        $.ajax({
          type: "GET",
          url: "<?php echo base_url('index.php/home/load_pemenang/'); ?>"+id_group,
          cache: false,
          success: function(html) {
            $('#container-pemenang').html(html);
          },
          error: function(xhr, status, error) {
            alert(error + " " + window.location.hostname);
          },
        });
      }
    }

    $(document).ready(function() {

      $('#btn-example2').click(function() {

        var sel = document.getElementById("input_group");
        var text = sel.options[sel.selectedIndex].text;
        var id_group = $('#input_group').val();
        var hadiah = $('#input_hadiah').val();
        var url = "";

        if (id_group == 0 || hadiah == "") {
          Swal.fire(
            'Warning',
            'Group Peserta Ujian dan/Atau Nama Hadiah masih kosong',
            'warning'
          )
        } else {
          Swal.fire({
            title: 'Peserta "' + text + '"\nHadiah "' + $('#input_hadiah').val() + '"',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {

              $("#input_group").prop('disabled', true);
              $("#input_hadiah").prop('disabled', true);
              $("#btn-example2").prop('disabled', true);

              if (id_group == 1) {
                url = "<?php echo base_url('index.php/home/undian_allcabang'); ?>"
              } else if (id_group == 2) {
                url = "<?php echo base_url('index.php/home/undian_ajb'); ?>"
              } else if (id_group == 3) {
                url = "<?php echo base_url('index.php/home/undian_bms'); ?>"
              } else if (id_group == 4) {
                url = "<?php echo base_url('index.php/home/undian_pwt1'); ?>"
              } else if (id_group == 5) {
                url = "<?php echo base_url('index.php/home/undian_pwt2'); ?>"
              } else if (id_group == 6) {
                url = "<?php echo base_url('index.php/home/undian_wangon'); ?>"
              }

              $.ajax({
                type: "POST",
                url: url,
                data: {
                  hadiah: $('#input_hadiah').val()
                },
                dataType: "json",
                cache: false,
                success: function(data) {
                  if (data.success == true) {
                    socket.emit('ticket', {
                      message: data.NOSAMW,
                    });
                  } else {
                    Swal.fire(
                      'Warning',
                      data.message_err,
                      'warning'
                    );
                    $("#input_group").prop('disabled', false);
                    $("#input_hadiah").prop('disabled', false);
                    $("#btn-example2").prop('disabled', false);
                  }
                },
                error: function(xhr, status, error) {
                  alert(error + " " + window.location.hostname);
                },
              });
            }
          })
        }

      });

      socket.on("ticket", (data) => {
        console.log(data.message.message);
        const ticket_ = data.message.message;
        const ticket = ticket_.split("");
        $('#example10 ul').playSpin({
          // time: 1000,
          stopSeq: 'leftToRight',
          endNum: ticket,
          onFinish: function(num) {
            load_pemenang();
            $("#input_group").prop('disabled', false);
            $("#input_hadiah").prop('disabled', false);
            $("#btn-example2").prop('disabled', false);
            $('#input_group option').eq(0).prop('selected', true)
            $("#input_hadiah").val('');
            
          }
        });
      });
    });
  </script>
</body>

</html>