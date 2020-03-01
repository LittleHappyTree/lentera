<main id="main" class="main-page">

    <section id="speakers" class="wow fadeInUp">
      <div class="container">
      	<?php if ( ($title!='motorcycle') or ($title!='car') ): ?>

      	<div class="section-header">
          <h2>Our Fleet</h2>
          <p>Motorcycles</p>
        </div>

        <div class="row">

          <?php foreach ($vehicle as $value): ?>
          <?php if ($value->kind=='M'): ?>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?=base_url()?>assets/img/motor/<?=$value->img?>" class="img-fluid">
              </div>
              <h3><a href="<?=base_url()?>en/fleet/detail/<?=$value->kind?>/<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?> </a><br><small><?=$value->silinder?>CC &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</small></h3>
              <p>Start from IDR <?=number_format($value->start_price,0,',','.')?> / day</p>
              <div class="button">
                <?php $msg = 'Hi there, i would like to book '.$value->type_name.' '.$value->vehicle_series.' motorcycle.';
                      $msg = str_replace(' ', '%20', $msg);
                ?>
                <form method="post" role="form" action="<?=base_url()?>en/booking">
                <input type="hidden" name="book-vehicle" value="<?=$value->id?>">
                <button type="submit">Book</button>&nbsp;<button type="button" onclick="location.href='https://api.whatsapp.com/send?phone=6281246364437&text=<?=$msg?>'" ><i class="fa fa-whatsapp"></i> Chat</button>
                </form>
              </div>
            </div>
          </div>
          <?php endif ?>
        <?php endforeach ?>

        </div>
        <br>
        <div class="section-header">
          <p>Cars</p>
        </div>

        <div class="row">
          <?php foreach ($vehicle as $value): ?>
	      <?php if ($value->kind=='C'): ?>
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?=base_url()?>assets/img/motor/<?=$value->img?>" class="img-fluid">
              </div>
              <h3><a href="<?=base_url()?>en/fleet/detail/<?=$value->kind?>/<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?> </a><br><small><?=$value->silinder?>cc &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</small></h3>
              <p>Start from IDR <?=number_format($value->start_price)?> / day</p>
              <div class="button">
                <?php $msg = 'Hi there, i would like to book '.$value->type_name.' '.$value->vehicle_series.' car.';
                      $msg = str_replace(' ', '%20', $msg);
                ?>
                <form method="post" role="form" action="<?=base_url()?>en/booking">
                <input type="hidden" name="book-vehicle" value="<?=$value->id?>">
                <button type="submit">Book</button>&nbsp;<button type="button" onclick="location.href='https://api.whatsapp.com/send?phone=6281246364437&text=<?=$msg?>'" ><i class="fa fa-whatsapp"></i> Chat</button>
                </form>
              </div>
            </div>
          </div>	
	      <?php endif ?>
        <?php endforeach ?>
        </div>
      		
      	<?php else: ?>

  		<div class="section-header">
          <h2>Our Fleet</h2>
          <p><?=ucfirst($title)?></p>
        </div>

        <div class="row">

          <?php foreach ($vehicle as $value): ?>
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
      		
      	<?php endif ?>
        

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