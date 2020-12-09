<?php include "../api_endpoint/api.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Geo Near</title>
  <?php
  include "../header/header.php";
  ?>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
   <link href="../assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/>

</head>

<body>
  <?php
  include "../header/navigation.php";
  ?>
  <br/><br/>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">

              <div class="card-box">
                <h4 class="m-t-0 header-title">Country</h4>
                <select id="countryP" class="selectpicker" data-live-search="true">
                    <option data-tokens="Argentina">Argentina</option>
                    <option data-tokens="Spain">Spain</option>
                    <option data-tokens="Germany">Germany</option>
                    <option data-tokens="Brazil">Brazil</option>
                  </select><br/><br/>
                  <div class="col-sm-8">
                  <h4 class="m-t-0 header-title">Radius (in kms)</h4>
                  <input name="radius" type="text" id="radius_range"><br/>
                  <a id="geoSubmit" class="btn btn-block btn-primary waves-effect waves-light">Get Players <i class="fa fa-location-arrow"></i></a>
                  </div>
              </div>

              <div class="card-box">
                  <h4 class="m-t-0 header-title">Geo Near Query</h4>

                  <div id="mapid" style="height: 380px;"></div>
              </div>
          </div>
          <form style="display: hidden" action="geo.php" method="POST" id="hiddenForm">
  <input type="hidden" id="locations" name="locations" value=""/>
  <input type="hidden" id="radius_range_x" name="radius_range_x" value=""/>

</form>
      </div> <!-- end row -->
  </div>
</div>
    <?php
    include "../footer/footer.php";
    ?>

            <!-- range slider js -->
            <script src="../assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
            <script src="../assets/pages/jquery.ui-sliders.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
crossorigin=""></script>
<?php if(isset($_POST["locations"])){ ?>
  <script type="text/javascript">
  var locations = <?php echo $_POST["locations"]; ?>;
                      const mapLatLng =  L.latLng(locations[0]["lat"], locations[0]["lon"]);
                      var mymap = L.map('mapid').setView(mapLatLng, 4);

                      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'pk.eyJ1IjoicGhlcndhbmkzNyIsImEiOiJja2lncXRzMW4wNXkzMnJwZXRwbDdnMHRqIn0.iQuKxMRPV4xIlJ9jMgD29g'
                    }).addTo(mymap);
                    for (i = 0; i < locations.length; i++) {
                      const markerLatLng = L.latLng(locations[i]["lat"], locations[i]["lon"]);
                      var marker = L.marker(markerLatLng).addTo(mymap);
                      marker.bindPopup(locations[i]["name"]);
                    }
                    $("#radius_range").ionRangeSlider({
                      type: "single",
                      grid: true,
                      min: 300,
                      max: 5000
                    });
                    var circleLatLng = L.latLng(locations[0]["lat"], locations[0]["lon"]);
                    var circle = L.circle(circleLatLng, {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: <?php echo $_POST["radius_range_x"]*1000; ?>
                    }).addTo(mymap);
                    circle.bindPopup('<?php echo "<b>Radius ".$_POST["radius_range_x"]." km(s)</b>"; ?>');
  </script>

  <?php
} else {?>
    <script type="text/javascript">
                    var mLatLng = L.latLng(44.968046, -94.420307);
                    var mymap = L.map('mapid').setView(mLatLng, 10);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                      maxZoom: 18,
                      id: 'mapbox/streets-v11',
                      tileSize: 512,
                      zoomOffset: -1,
                      accessToken: 'pk.eyJ1IjoicGhlcndhbmkzNyIsImEiOiJja2lncXRzMW4wNXkzMnJwZXRwbDdnMHRqIn0.iQuKxMRPV4xIlJ9jMgD29g'
                  }).addTo(mymap);
                  var marker = L.marker(mLatLng).addTo(mymap);
                  /*var circle = L.circle([44.968046, -94.420307], {
                      color: 'red',
                      fillColor: '#f03',
                      fillOpacity: 0.5,
                      radius: 50000000
                  }).addTo(mymap);*/
                  marker.bindPopup("Select a country and enter a distance(in kms) to find the players in that radius!").openPopup();
                  //circle.bindPopup("Specify a value for me! (I'm the radius!)");

                  $("#radius_range").ionRangeSlider({
                    type: "single",
                    grid: true,
                    min: 300,
                    max: 5000
                  });
                  </script>
                <?php } ?>
                  <script>
                  $("#geoSubmit").click(function() {
                        var radius = $('#radius_range').val();
                        var country = $('#countryP').val();

                          $.ajax({url: 'https://pothole.ml/php/gofifa/getGeoNearData.php?country='+country+'&distance='+radius,
                          success: function(result){
                            console.log(result);
                            $('#locations').val(result);
                            $('#radius_range_x').val(radius);
                            $('#hiddenForm').submit();
                          }});

                  });
    </script>

</body>
</html>
