window.onload = function() {
    var HOME_PATH = window.HOME_PATH || '.';
    var cityhall = new naver.maps.LatLng(37.761413, 127.361606),
        map = new naver.maps.Map('map', {
            center: cityhall,
            zoom: 10
        }),
        marker = new naver.maps.Marker({
            map: map,
            position: cityhall
        });
    
    var infowindow = new naver.maps.InfoWindow({
        maxWidth: 140,
        backgroundColor: "#eee",
        borderColor: "#2db400",
        borderWidth: 5,
        anchorSize: new naver.maps.Size(30, 30),
        anchorSkew: true,
        anchorColor: "#eee",
        pixelOffset: new naver.maps.Point(20, -20)
    });
    
}