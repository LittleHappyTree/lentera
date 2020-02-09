<main id="main" class="main-page">
    <section id="booking" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Booking</h2>
          <p>Minimum booking date is 2 days</p>
        </div>

        <div class="form">
          <form action="" method="post" role="form" class="bookingForm">
            <div class="form-row">
              <label for="staticEmail" class="col-sm-4 col-form-label text-right">Select Date</label>
              <div class="form-group col-md-6">
                <input type="text" name="date" class="form-control date-book" id="date" placeholder="Select Date" data-language="en" data-multiple-dates-separator=" to " data-date-format="dd/mm/yyyy" data-range="true" readonly="" style="background: #fff" required />
                <span id="alert-date" style="color:#f82249"><small id="alert-text"></small></span>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-4 col-form-label text-right">Select Vehicle</label>
              <div class="form-group col-md-6">
                <select class="form-control selecting" name="vehicle" id="vehicle" required>
                  <option value=""></option>
                  <optgroup label="Motorcycle">
                  <?php foreach ($vehicle as $value): ?>
                  <?php if ($value->kind=='M'): ?>
                  <option value="<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?></option>
                  <?php endif ?>
                  <?php endforeach ?>
                  </optgroup>
                  <optgroup label="Car">
                  <?php foreach ($vehicle as $value): ?>
                  <?php if ($value->kind=='C'): ?>
                  <option value="<?=$value->id?>"><?=$value->type_name?> <?=$value->vehicle_series?></option>
                  <?php endif ?>
                  <?php endforeach ?>
                  </optgroup>
                </select>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-4 col-form-label text-right">Select Option</label>
              <div class="form-group col-md-6">
                <select class="form-control option" name="option" id="option" required>
                  <option value="">Mazda 2</option>
                </select>
                <div class="validation"></div>
              </div>
            </div>
            <div class="text-center"><button type="submit" id="submit-book">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #booking -->
</main>