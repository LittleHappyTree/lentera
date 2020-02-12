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
            <div class="form-row">
              <label for="staticEmail" class="col-sm-4 col-form-label text-right">Pickup Location</label>
              <div class="form-group col-md-6">
                <input type="text" name="pickup" id="pac-input" class="form-control" placeholder="Search for Hotel, Airport or Landmark" style="background: #fff" required />
                <span id="alert-date" style="color:#f82249"><small id="alert-text"></small></span>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-4 col-form-label text-right">&nbsp;</label>
              <div class="form-group col-md-6">
                <div style="max-height: 400px; width: 100%">
                  <div id="map"></div>
                </div>
              </div>
            </div>
            <div class="text-center"><button type="submit" id="submit-book">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #booking -->
</main>
<script>
function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -6.194618,
            lng: 106.840006
        },
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    // Membuat Kotak pencarian terhubung dengan tampilan map
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Mengaktifkan detail pada suatu tempat ketika pengguna
    // memilih salah satu dari daftar prediksi tempat 
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // menghilangkan marker tempat sebelumnya
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // Untuk setiap tempat, dapatkan icon, nama dan tempat.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Membuat Marker untuk setiap tempat
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlP9U1OSpTmuF9VuaxWFitgz7gXRSL1M&libraries=places&callback=initAutocomplete"></script>