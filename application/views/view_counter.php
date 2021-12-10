<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/app.css') ?>">
  <title>Hello, world!</title>
</head>

<body>

  <div class="container">
    <div class="panel panel-primary shadow">
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
        <div>
          <button type="button" class="btn btn-success btn-lg" id="btn-example2">Kocok</button>
        </div>
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

    $(document).ready(function() {

      $('#btn-example2').click(function() {

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('index.php/home/allcabang'); ?>",
          dataType: "json",
          cache: false,
          success: function(data) {
            if (data.success == true) {
              socket.emit('ticket', {
              message: data.NOSAMW,
            });
            }
          },
          error: function(xhr, status, error) {
            alert(error + " " + window.location.hostname);
          },
        });
      });

      socket.on("ticket", (data) => {
        console.log(data.message.message);
        const ticket_ = data.message.message;
        const ticket = ticket_.split("");
        $('#example10 ul').playSpin({
          stopSeq: 'leftToRight',
          endNum: ticket,
        });
      });
    });
  </script>
</body>

</html>