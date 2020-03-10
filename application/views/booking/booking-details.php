<style>
  .only-timepicker .datepicker--nav,
  .only-timepicker .datepicker--content {
      display: none;
  }
  .only-timepicker .datepicker--time {
      border-top: none;
  }
</style>
<main id="main" class="main-page">
  <section id="speakers-details" class="wow fadeIn">
    <div class="container">
      <div class="section-header">
        <h2>Booking Details</h2>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="details">
            <?php foreach ($booking as $book): ?>
            <h3 class="text-center">Order number #<?=$book->order_number?></h3>
            <div class="row">
              <div class="col-md-2">
                <p><b>Booking Date <span class="pull-right">:</span></b></p>
              </div>
              <div class="col-md-10">
                <p><?=$book->date_start_for?> to <?=$book->date_end_for?> for <?=$book->days?> days</p>
              </div>
              <div class="col-md-2">
                <p><b>Pickup Location <span class="pull-right">:</span></b></p>
              </div>
              <div class="col-md-10">
                <p><?=$book->loc_pickup?> at <?=$book->time_start?></p>
              </div>
              <div class="col-md-2">
                <p><b>Drop Location <span class="pull-right">:</span></b></p>
              </div>
              <div class="col-md-10">
                <p><?=$book->loc_drop?> at <?=$book->time_end?></p>
              </div>
              <div class="col-md-2">
                <p><b>Order Description <span class="pull-right">:</span></b></p>
              </div>
              <div class="col-md-10">
                <table width="70%">
                  <tbody>
                    <?php $sum=0; foreach ($detail as $key): ?>
                    <tr style="border-bottom: 1px #dee2e6 solid">
                      <td width="50%"><?=$key->type_name?> <?=$key->vehicle_series?> - <?=$key->silinder?>cc<br><small>&emsp;<i><?=$key->price_name?> <?=$key->price_description?> / <?=$key->duration?> hour</i></small></td>
                      <td width="50%" class="text-right" style="vertical-align: center;">IDR <?=number_format($key->price)?></td>
                    </tr>
                    <?php $sum += $sum + $key->price; endforeach ?>
                    <tr style="border-top: 2px #dee2e6 solid">
                      <td width="50%" class="text-right"><b>Total (<?=$book->days?> days)</b></td>
                      <td width="50%" class="text-right"><b>IDR <?=number_format($sum*$book->days)?></b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        
      </div>
    </div>

    <div class="container" style="margin-top: 50px;">
      <div class="section-header">
        <p>Personal Information</p>
      </div>

      <div class="form">
          <form action="<?=base_url()?>en/booking/place" method="post" role="form" class="bookingForm">
            <input type="hidden" value="<?=base_url()?>" id="base_url" readonly>
            <input type="hidden" value="<?=$id?>" name="bid" readonly>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Email</label>
              <div class="form-group col-md-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email"style="background: #fff" required="true" />
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Name</label>
              <div class="form-group col-md-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"style="background: #fff" required="true" />
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Citizenship</label>
              <div class="form-group col-md-10">
                <select class="form-control selecting" name="citizen" id="citizen" required>
                  <option value=""></option>
                  <?php foreach ($country as $value): ?>
                  <option value="<?=$value->iso?>"><?=$value->nicename?></option>
                  <?php endforeach ?>
                </select>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-2 col-xs-2 col-form-label text-right">Phone Number</label>
              <div class="form-group col-md-1 col-3 col-sm-3">
                <select class="form-control option" name="phonecode" id="phonecode" required>
                  <option value=""></option>
                  <?php foreach ($country as $phcode): ?>
                  <option value="<?=$phcode->phonecode?>">+<?=$phcode->phonecode?> - <?=$phcode->nicename?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group col-md-9 col-9 col-sm-9">
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number"style="background: #fff" required="true" />
              </div>
            </div>
            <div class="form-row">
              <label for="staticEmail" class="col-sm-2 col-form-label text-right">Notes</label>
              <div class="form-group col-md-10">
                <textarea class="form-control" name="notes" rows="5" data-msg="Please write something for us" placeholder="Notes"></textarea>
              </div>
            </div>
            
            &nbsp;
            <div class="text-center">
              <button style="margin-top: 10px;" onclick="location.href='<?=base_url()?>en/booking/edit/<?=$id?>'" class="my-button">Change My Booking Details</button>&emsp;
              <button style="margin-top: 10px;" type="submit">Place My Booking</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>

  </section>

</main>
<script>
$( document ).ready(function() {
  $('#citizen').on("change",function(){
    var id = $(this).val();
    var baseUrl = $('#base_url').val();
    $.ajax({
      method: 'POST',
      url: baseUrl+'ajax/get_phcode',
      data: {id: id},
      async: true,
      dataType: 'json',
      success: function(data){
        var $phonecode = $('#phonecode');
        $phonecode.val(data).trigger('change');
      }
    });
  });
  $('#phone').on('input propertychange paste keypress', function (e) {
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
        this.value = this.value.replace(reg, '');
    }
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
               return false;
    }
  });
});
// function initAutocomplete() {
//     var map = new google.maps.Map(document.getElementById('map'), {
//         center: {
//             lat: -6.194618,
//             lng: 106.840006
//         },
//         zoom: 13,
//         mapTypeId: 'roadmap'
//     });

//     // Membuat Kotak pencarian terhubung dengan tampilan map
//     var input = document.getElementById('pac-input');
//     var searchBox = new google.maps.places.SearchBox(input);
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


//     var input2 = document.getElementById('pac-inputs');
//     var searchBox2 = new google.maps.places.SearchBox(input2);
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input2);

//     map.addListener('bounds_changed', function() {
//         searchBox.setBounds(map.getBounds());
//         searchBox2.setBounds(map.getBounds());
//     });

//     var markers = [];
//     // Mengaktifkan detail pada suatu tempat ketika pengguna
//     // memilih salah satu dari daftar prediksi tempat 
//     searchBox.addListener('places_changed', function() {
//         var places = searchBox.getPlaces();

//         if (places.length == 0) {
//             return;
//         }

//         // menghilangkan marker tempat sebelumnya
//         markers.forEach(function(marker) {
//             marker.setMap(null);
//         });
//         markers = [];

//         // Untuk setiap tempat, dapatkan icon, nama dan tempat.
//         var bounds = new google.maps.LatLngBounds();
//         places.forEach(function(place) {
//             if (!place.geometry) {
//                 console.log("Returned place contains no geometry");
//                 return;
//             }
//             var icon = {
//                 url: place.icon,
//                 size: new google.maps.Size(71, 71),
//                 origin: new google.maps.Point(0, 0),
//                 anchor: new google.maps.Point(17, 34),
//                 scaledSize: new google.maps.Size(25, 25)
//             };

//             // Membuat Marker untuk setiap tempat
//             markers.push(new google.maps.Marker({
//                 map: map,
//                 icon: icon,
//                 title: place.name,
//                 position: place.geometry.location
//             }));

//             if (place.geometry.viewport) {
//                 bounds.union(place.geometry.viewport);
//             } else {
//                 bounds.extend(place.geometry.location);
//             }
//         });
//         map.fitBounds(bounds);
//     });

//     searchBox2.addListener('places_changed', function() {
//         var places = searchBox.getPlaces();

//         if (places.length == 0) {
//             return;
//         }

//         // menghilangkan marker tempat sebelumnya
//         markers.forEach(function(marker) {
//             marker.setMap(null);
//         });
//         markers = [];

//         // Untuk setiap tempat, dapatkan icon, nama dan tempat.
//         var bounds = new google.maps.LatLngBounds();
//         places.forEach(function(place) {
//             if (!place.geometry) {
//                 console.log("Returned place contains no geometry");
//                 return;
//             }
//             var icon = {
//                 url: place.icon,
//                 size: new google.maps.Size(71, 71),
//                 origin: new google.maps.Point(0, 0),
//                 anchor: new google.maps.Point(17, 34),
//                 scaledSize: new google.maps.Size(25, 25)
//             };

//             // Membuat Marker untuk setiap tempat
//             markers.push(new google.maps.Marker({
//                 map: map,
//                 icon: icon,
//                 title: place.name,
//                 position: place.geometry.location
//             }));

//             if (place.geometry.viewport) {
//                 bounds.union(place.geometry.viewport);
//             } else {
//                 bounds.extend(place.geometry.location);
//             }
//         });
//         map.fitBounds(bounds);
//     });
// }
</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlP9U1OSpTmuF9VuaxWFitgz7gXRSL1M&libraries=places&callback=initAutocomplete"></script> -->