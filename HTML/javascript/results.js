
function create_map(it, from_lat, to_lat, from_lng, to_lng) {
        var mymap = L.map('map_' + it).setView([51.505, -0.09], 13);
        console.log(from_lat, from_lng, to_lat, to_lng);

      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
          maxZoom: 18,
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: 'mapbox/streets-v11',
          tileSize: 512,
          zoomOffset: -1
      }).addTo(mymap);

      L.Routing.control({
          waypoints: [
              L.latLng(from_lat, from_lng),
              L.latLng(to_lat, to_lng)],
              router: L.Routing.mapbox('pk.eyJ1IjoiYXhsbWsiLCJhIjoiY2thNzNuODB4MGJxajJ6bnh2NHNzNWNnbyJ9.-KVBB-sw7ZjzueA_LiEp-Q')
          }).addTo(mymap);
  }

function apply(it) {
    var form = document.createElement("form");
    form.style.display = 'none';
    form.method = "POST";
    form.action = "my_rides.php";
    document.body.appendChild(form);
    var form_title = document.createElement("input");
    form_title.name = "id_ride";
    form_title.value = it;
    form.appendChild(form_title);
    form.submit();
}
