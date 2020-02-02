  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Explore Bali<br>with Our <span>Best</span> Ride</h1>
      <p class="mb-4 pb-0">Lentera Travel provides car and motorcycle for rent while you are in Bali. </p>
      <a href="#about" class="about-btn scrollto">Let's Book a Ride</a>
    </div>
  </section>

  <main id="main">

<!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h2>Select Booking Date</h2>
            <p>Minimum rent is 3 days</p>
          </div>
          <div class="col-lg-7">
            <div class="form">
              <form action="">
              <div class="form-row">
              <div class="form-group col-md-8">
                  <input type="text" name="bookdate" class="form-control datepicker-here" data-language="en" data-multiple-dates-separator=" to " data-date-format="dd/mm/yyyy" data-range="true" id="bookdate" placeholder="Click to select date"/>
                </div>
                <div class="form-group col-md-4">
                  <button class="btn-trans" type="submit">Find your ride</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Fleet</h2>
          <p>Motorcycles</p>
        </div>

        <div class="row">

          <?php foreach ($motor as $value): ?>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?=base_url()?>assets/img/motor/<?=$value->img?>" class="img-fluid">
              </div>
              <h3><a href="<?=base_url()?>en/fleet/detail/<?=$value->kind?>/<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?> </a><br><small><?=$value->silinder?>CC &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</small></h3>
              <p>Start from IDR <?=number_format($value->start_price,0,',','.')?> / day</p>
              <div class="button">
                <button type="button">Book</button>
              </div>
            </div>
          </div>
        <?php endforeach ?>

        </div>
        <div class="center">
          <button onclick="location.href='<?=base_url()?>en/fleet/motorcycle'" type="button">More Motorcycles</button>
        </div>
        <br>
        <div class="section-header">
          <p>Cars</p>
        </div>

        <div class="row">
          <?php foreach ($mobil as $value): ?>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?=base_url()?>assets/img/motor/<?=$value->img?>" class="img-fluid">
              </div>
              <h3><a href="<?=base_url()?>en/fleet/detail/<?=$value->kind?>/<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?> </a><br><small><?=$value->silinder?>cc &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</small></h3>
              <p>Start from IDR <?=number_format($value->start_price)?> / day</p>
              <div class="button">
                <button type="button">Book</button>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        </div>
        <div class="center">
          <button onclick="location.href='<?=base_url()?>en/fleet/car'" type="button">More Cars</button>
        </div>

      </div>

    </section>

    <!--==========================
      Venue Section
    ============================-->
    <section id="venue" class="section-with-bg wow fadeInUp">

      <div class="container-fluid">

        <div class="section-header">
          <h2>Where to find us?</h2>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1342.0200219717813!2d115.16806743826629!3d-8.612669145643151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2393603feee9f%3A0xf3e3c906d1aa6932!2sperumahan%20cempaka%20mas%20blok%20B%20dalung%20bali!5e0!3m2!1sid!2sid!4v1579267150971!5m2!1sid!2sid" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>Jalan Dalung Utara, Badung</h3>
                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

  </main>