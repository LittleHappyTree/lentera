<main id="main" class="main-page">
<!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2><?=$type?></h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php if ($type=='Motorcycle') { ?>
              <img src="<?=base_url()?>assets/img/motor/vario.png" alt="Speaker 1" class="img-fluid">
            <?php } else { ?>
              <img src="<?=base_url()?>assets/img/motor/avanza.png" alt="Speaker 1" class="img-fluid">
            <?php } ?>
          </div>

          <div class="col-md-6">
            <div class="details">
              <?php if ($type=='Motorcycle') { ?>
              <h2>Honda Vario 150cc</h2>
              <p><i>Black &bull; 2019 &bull; IDR 150.000 / day</i></p>
              <p>Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.</p>
 
              <p>Aboriosam inventore dolorem inventore nam est esse. Aperiam voluptatem nisi molestias laborum ut. Porro dignissimos eum. Tempore dolores minus unde est voluptatum incidunt ut aperiam.</p> 

              <p>Et dolore blanditiis officiis non quod id possimus. Optio non commodi alias sint culpa sapiente nihil ipsa magnam. Qui eum alias provident omnis incidunt aut. Eius et officia corrupti omnis error vel quia omnis velit. In qui debitis autem aperiam voluptates unde sunt et facilis.</p>
              <?php } else { ?>
              <h2>Toyota Avanza</h2>
              <p><i>Black &bull; 2019 &bull; IDR 150.000 / day</i></p>
              <p>Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.</p>
 
              <p>Aboriosam inventore dolorem inventore nam est esse. Aperiam voluptatem nisi molestias laborum ut. Porro dignissimos eum. Tempore dolores minus unde est voluptatum incidunt ut aperiam.</p> 

              <p>Et dolore blanditiis officiis non quod id possimus. Optio non commodi alias sint culpa sapiente nihil ipsa magnam. Qui eum alias provident omnis incidunt aut. Eius et officia corrupti omnis error vel quia omnis velit. In qui debitis autem aperiam voluptates unde sunt et facilis.</p>
              <?php } ?>
            </div>
            <br>
            <a href="" class="book">Book Now</a>
          </div>
          
        </div>
      </div>

    </section>

    <!-- <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        <a href="<?=base_url()?>assets/img/gallery/1.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/1.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/2.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/2.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/3.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/3.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/4.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/4.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/5.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/5.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/6.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/6.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/7.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/7.jpg" alt=""></a>
        <a href="<?=base_url()?>assets/img/gallery/8.jpg" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/gallery/8.jpg" alt=""></a>
      </div>

    </section> -->

</main>