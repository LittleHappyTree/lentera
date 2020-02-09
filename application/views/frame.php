<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lentera Travel</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?=base_url()?>assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?=base_url()?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url()?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/venobox/venobox.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/airdatepicker/css/datepicker.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/select2/select2.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/mystyle.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" class="<?=$header?>">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="<?=base_url()?>assets/img/logo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <?php foreach ($menu as $key => $value) { ?>
          <li class="<?=$value["active"]?>"><a href="<?=$value["url"]?>"><?=$value["menu"]?></a></li>
          <?php } ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php $this->view($page); ?>    

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="<?=base_url()?>assets/img/logo.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?=base_url()?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/lib/easing/easing.min.js"></script>
  <script src="<?=base_url()?>assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?=base_url()?>assets/lib/superfish/superfish.min.js"></script>
  <script src="<?=base_url()?>assets/lib/wow/wow.min.js"></script>
  <script src="<?=base_url()?>assets/lib/venobox/venobox.min.js"></script>
  <script src="<?=base_url()?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/lib/airdatepicker/js/datepicker.js"></script>
  <script src="<?=base_url()?>assets/lib/airdatepicker/js/i18n/datepicker.en.js"></script>
  <script src="<?=base_url()?>assets/lib/select2/select2.js"></script>


  <!-- Template Main Javascript File -->
  <script src="<?=base_url()?>assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('.selecting').select2();
      $('.option').select2();
      $('.datepicker-here').datepicker({
          minDate: new Date(),
          autoClose: true
      });
      $('.date-book').datepicker({
          minDate: new Date(),
          autoClose: true,
          onHide: function(dp, animationCompleted){
              if (!animationCompleted) {
                  var dateA = $('.date-book').val();
                  var dateB = dateA.split(" ");
                  var dateC = dateB[0];
                  var dateD = dateB[2];
                  var dateF = dateD.split("/");
                  var dateG = dateC.split("/");
                  var dateEnd = new Date(dateF[2], dateF[1], dateF[0]);
                  var dateStart = new Date(dateG[2], dateG[1], dateG[0]);
                  var diff = new Date(dateEnd - dateStart)/1000/60/60/24;
                  if (diff < 2) {
                    $('#alert-text').text('Minimum rent day is 2');
                    $('#submit-book').attr( "disabled", "disabled" );
                  } else {
                    $('#alert-text').empty();
                    $('#submit-book').attr("disabled", false);
                  }
              }
          }
      });
    });
  </script>
</body>

</html>
