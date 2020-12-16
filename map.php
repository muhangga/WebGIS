<?php
   require_once 'component/header.php';
   require_once 'function/config.php';

   $query = pg_query($koneksi, "SELECT x, y, indomaret, kecamatan, alamat FROM indomaret");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="py-5">
            <div id="map" style="height: 600px;">
            
               <script>
                     var map = L.map('map').setView([-6.6061381, 106.801851], 13);
                     var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                     });
                     basemap.addTo(map);
                     
                    var indomaretMarker = L.icon({
                        iconUrl: "assets/img/Logo_Indomaret.svg",
                        iconSize: [60, 80],
                        iconAnchor: [20, 5],
                     });

                     <?php while ($row = pg_fetch_assoc($query)) : ?>
                        L.marker([<?= $row['y']; ?>, <?= $row['x']; ?>], {
                                 icon: indomaretMarker
                           }).addTo(map)
                           .bindPopup(`<b><?= $row['indomaret']; ?></b><br> <?= $row['alamat']; ?> <br><?= $row['kecamatan']; ?>`);
                     <?php endwhile; ?>
               </script>

               <script>
                  var firebaseConfig = {
                     apiKey: "AIzaSyBIw-8hMXDGqI5vgL62PhNr9haaOMhFO8U",
                     authDomain: "sig-1-50fd3.firebaseapp.com",
                     databaseURL: "https://sig-1-50fd3.firebaseio.com",
                     projectId: "sig-1-50fd3",
                     storageBucket: "sig-1-50fd3.appspot.com",
                     messagingSenderId: "927414654809",
                     appId: "1:927414654809:web:b4db1e5b4d0506c2525e48"
                  };
                  firebase.initializeApp(firebaseConfig);

                  var fbMarker = L.icon({
                     iconUrl: "assets/img/pin-map.svg",
                     iconSize: [40, 40],
                     iconAnchor: [20, 5],
                  });

                  var db = firebase.database();
                  db.ref('DHT11').once('value', function(snapshot) {
                     if (snapshot.exists()) {
                        snapshot.forEach(function(data) {
                           var val = data.val();
                           L.marker([val.latitude, val.longitude], { icon: fbMarker })
                              .addTo(map)
                              .bindPopup(`<b>${val.desa} </b><br>Diperbarui Pada : ${val.diperbarui} <br>Suhu : ${val.suhu} &deg;<br>Kelembaban : ${val.kelembaban}%<br>Latitude : ${val.latitude} <br>Longitude : ${val.longitude}`);
                        });
                     }
                  });
            </script>
         </div>
      </div>
   </div>
</main>
<?php require_once 'component/footer.php'; ?>