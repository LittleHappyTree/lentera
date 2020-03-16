<main id="main" class="main-page">
<?php $total = explode(';', $imgtotal) ?>
<!--==========================
      Speaker Details Section
    ============================-->
    <?php $totalimg = explode(';', $imgtotal); ?>
    <?php if(count($totalimg)<=1): ?>
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
                <b>Price List:</b>
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
    <?php endif ?>

    <?php if(count($totalimg)>1): ?>
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2><?=$type?></h2>
        </div>
      </div>
      
      <?php foreach ($load as $value): ?>
      <div class="owl-carousel gallery-carousel" style="padding: 0 60px">
        <?php $gambar = explode(';', $value->img); $jumlah = count($gambar);?>
        <?php for ($i = 0; $i < $jumlah; $i++) {?>
        <a href="<?=base_url()?>assets/img/motor/<?=$gambar[$i]?>" class="venobox" data-gall="gallery-carousel"><img src="<?=base_url()?>assets/img/motor/<?=$gambar[$i]?>" alt=""></a>
        <?php } ?>
      </div>
      &nbsp;
      <div class="container">
        <h3 class="text-center"><b><?=$value->type_name?> <?=$value->vehicle_series?></b></h3>
        <p class="text-center" style="margin-top: -15px;"><i><?=$value->silinder?>cc &bull; <?=$value->year?> &bull; <?=$value->capacity?> seat</i></p>
        <p><?=$value->description?></p>
        <p><b>Price List:</b></p>
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
        <br>
        <div class="text-center">
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

    </section>
    <?php endif ?>
</main>