// $(document).ready(function () {
//     var selectedItems = $('input[name="selectednpsn"]').val();
//     $(".npsn").select2({
//         placeholder: "Pilih Sekolah Asal",
//         ajax: {
//             url: "/api/npsn",
//             dataType: "json",
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term,
//                     selected: selectedItems,
//                 };
//             },
//             processResults: function (data) {
//                 return {
//                     results: $.map(data, function (item) {
//                         return {
//                             text: item.nama_sekolah,
//                             id: item.id,
//                         };
//                     }),
//                 };
//             },
//             cache: true,
//         },
//     });
// });

$(document).ready(function () {
    $(".penghasilan_ibu").select2({
        placeholder: "Pilih Penghasilan Ibu",
    });
});

$(document).ready(function () {
    $(".pekerjaan_ibu").select2({
        placeholder: "Pilih Pekerjaan Ibu",
    });
});
$(document).ready(function () {
    $(".penghasilan_ayah").select2({
        placeholder: "Pilih Penghasilan Ayah",
    });
});

$(document).ready(function () {
    $(".pekerjaan_ayah").select2({
        placeholder: "Pilih Pekerjaan Ayah",
    });
});

$(document).ready(function () {
    $(".penghasilan_wali").select2({
        placeholder: "Pilih Penghasilan Wali",
    });
});

$(document).ready(function () {
    $(".pekerjaan_wali").select2({
        placeholder: "Pilih Pekerjaan Wali",
    });
});
$(document).ready(function () {
    $(".jalur").select2({
        placeholder: "Jalur Pendaftaran",
    });
});
$(document).ready(function () {
    const lat = document.querySelector("#lat").value;
    const lon = document.querySelector("#lon").value;
    mapboxgl.accessToken =
        "pk.eyJ1IjoicHBkYnNtcGRpc2Rpa2NpYW5qdXIiLCJhIjoiY204ZnNrbHNoMGczdDJqcHhucTdjZmNtZyJ9.Ary-pbzrfR8kLH-A13ZWLw";
    var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/ppdbsmpdisdikcianjur/cm8fsoaka00ev01r0dfdrho3d",
        center: [lon ? lon : 107.13182, lat ? lat : -6.81463],
        zoom: 16,
    });
    console.log(lat, lon);
    var marker = new mapboxgl.Marker({color: "#4aa3ff"})
        .setLngLat([lon, lat])
        .addTo(map);
    map.on("click", function add_marker(event) {
        var coordinates = event.lngLat;
        console.log("Lng:", coordinates.lng, "Lat:", coordinates.lat),
            "id",
            event.id;
        marker.setLngLat(coordinates).addTo(map);
        $("#lat").val(coordinates.lat).trigger("change");
        $("#lon").val(coordinates.lng).trigger("change");
    });
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
        })
    );
});
