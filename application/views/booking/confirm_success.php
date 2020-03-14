<main id="main" class="main-page">

  <!--==========================
    Speaker Details Section
  ============================-->
  <section id="speakers-details" class="wow fadeIn">
    <div class="container">
      <div class="section-header">
        <h2>Confirmation Success</h2>
      </div>

      <div class="row">
        <div class="col-md-6">
          <img src="<?=base_url()?>assets/img/conf_success.png" alt="Speaker 1" class="img-fluid">
        </div>

        <div class="col-md-6">
          <div class="details">
            <?php if (empty($checkid)): ?>
            <h2>Yeay! Your booking has been confirmed.</h2>
            <p>Please check your email once more to upload supporting document such as passport or driving license.</p>
            <?php else: ?>
            <h2>Your booking already confirmed</h2>
            <p>Please check your email once more to upload supporting document such as passport or driving license.<br><br>If you did not receive the email, please click this <a href="<?=base_url()?>en/booking/resend/<?=$checkid?>">link</a> and we will resend the email.</p>
            <?php endif ?>
          </div>
        </div>
        
      </div>
    </div>

  </section>

</main>