// function firebase() {
//     var firebaseConfig = {
//        apiKey: "AIzaSyBIw-8hMXDGqI5vgL62PhNr9haaOMhFO8U",
//        authDomain: "sig-1-50fd3.firebaseapp.com",
//        databaseURL: "https://sig-1-50fd3.firebaseio.com",
//        projectId: "sig-1-50fd3",
//        storageBucket: "sig-1-50fd3.appspot.com",
//        messagingSenderId: "927414654809",
//        appId: "1:927414654809:web:b4db1e5b4d0506c2525e48"
//     };
//     // Initialize Firebase
//     firebase.initializeApp(firebaseConfig);

//     var redmarker = L.icon({
//        iconUrl: "assets/img/red-marker.png",
//        iconSize: [40, 40],
//        iconAnchor: [20, 5],
//     });


//     var db = firebase.database();
//     db.ref('DHT11').once('value', function (snapshot) {
//        if (snapshot.exists()) {
//           snapshot.forEach(function (data) {
//              var val = data.val();
//              L.marker([val.latitude, val.longitude], {
//                    icon: redmarker
//                 }).addTo(map)
//                 .bindPopup(`<b>  ${val.desa} </b><br>Diperbarui Pada ${val.diperbarui} <br>Suhu ${val.suhu} &deg;<br>Kelembaban ${val.kelembaban} + "%<br>Latitude ${val.latitude} <br>Longitude ${val.longitude}`);
//           });
//        }
//     });
// }