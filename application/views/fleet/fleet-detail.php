<main id="main" class="main-page">
<!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2><?=$type?></h2>
        </div>

        <?php foreach ($load as $value): ?>
        <div class="row">
          <div class="col-md-6">
              <img src="<?=base_url()?>assets/img/motor/<?=$value->img?>" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2><?=$value->type_name?> <?=$value->vehicle_series?></h2>
              <p><i><?=$value->silinder?>cc &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</i></p>
              <p><?=$value->description?></p>

              <p>
                Price List:
              </p>
              <table class="table">
                <tbody>
                  <?php $i=0; foreach ($loadmaster as $master): ?>
                  <tr>
                    <?php if ($i==0): ?>
                    <td rowspan="<?=$countmaster?>" class="title-price">Option</td>
                    <?php endif ?>
                    <td style="line-height: 1"><?=$master->price_name?> <i><small><?=$master->price_description?></small></i> </td>
                    <td class="text-right" style="line-height: 1">IDR <?=number_format($master->price,0,',','.')?> <small><i>/ <?=$master->duration?> hour</i></small></td>
                  </tr>
                  <?php $i++; endforeach ?>
                  <?php $j=0; foreach ($loaddetail as $detail): ?>
                  <tr>
                    <?php if ($j==0): ?>
                    <td rowspan="<?=$countdetail?>" class="title-price">Additional</td>
                    <?php endif ?>
                    <td style="line-height: 1"><?=$detail->price_name?> <i><small><?=$master->price_description?></small></i></td>
                    <td class="text-right" style="line-height: 1">+ IDR <?=number_format($detail->price,0,',','.')?> <small><i>/ <?=$detail->duration?> hour</i></small></td>
                  </tr>
                  <?php $j++; endforeach ?>
                </tbody>
              </table>
            </div>
            <br>
            <?php $msg = 'Hi there, i would like to book '.$value->type_name.' '.$value->vehicle_series.' .';
                  $msg = str_replace(' ', '%20', $msg);
            ?>
            <form method="post" role="form" action="<?=base_url()?>en/booking">
            <input type="hidden" name="book-vehicle" value="<?=$value->id?>">
            <button type="submit">Book</button>&nbsp;
            <button type="button" class="my-button-small" onclick="location.href='https://api.whatsapp.com/send?phone=6281246364437&text=<?=$msg?>'" ><i class="fa fa-whatsapp"></i> Chat</button>
            </form>
          </div>
        </div>
        <?php endforeach ?>

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