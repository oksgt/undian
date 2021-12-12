<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=1024">

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

    .vcenter {
        display: inline-block;
        vertical-align: middle;
        float: none;
    }
  </style>
</head>

<body class="full">

  <div class="container">
    <div class=" panel panel-primary shadow" style="background-color: rgba(255, 255, 255, .30); backdrop-filter: blur(5px); border: none">
      <div class="panel-body text-center">
        <div class="slotwrapper text-center" id="example10">
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
      </div>
    </div>
    <div class="panel panel-info" style="background-color: rgba(255, 255, 255, .80); backdrop-filter: blur(5px); border: none">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-weight: bold">Nama Pemenang</h3>
      </div>
      <div class="panel-body" id="container-pemenang">

      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js'); ?>"></script>
  <script src="<?= base_url('assets/slotmachine.js') ?>"></script>
  <script>
    var socket = io('http://' + window.location.hostname + ':3000', {
      withCredentials: true,
      extraHeaders: {
        "my-custom-header": "abcd"
      }
    });

    function load_pemenang_2(id_group) {
      // var id_group = $('#input_group').val();
      if(id_group > 0){
        $.ajax({
          type: "GET",
          url: "<?php echo base_url('index.php/home/load_pemenang_2/'); ?>"+id_group,
          cache: false,
          success: function(html){
            $('#container-pemenang').html(html);
            
          },
          error: function(xhr, status, error) {
            alert(error + " " + window.location.hostname);
          },
        });
      }
    }
    
    $(document).ready(function() {
      socket.on("ticket", (data) => {
        console.log(data.message);
        console.log(data.id_group);
        const ticket_ = data.message;
        const group_ = data.id_group;
        const ticket = ticket_.split("");
        $('#container-pemenang').html("");
        $('#example10 ul').playSpin({
          stopSeq: 'leftToRight',
          endNum: ticket,
          // time:100,
          onFinish: function(num) {
            load_pemenang_2(group_);
          }
        });
      });
    });
  </script>
  
</body>

</html>