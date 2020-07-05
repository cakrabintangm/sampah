<script type="text/javascript">
var x=0;
 var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng( -3.808590, 102.264435),
          mapTypeId: 'roadmap'
        });
        
        var icons = {
          jalan: {
            icon: 'http://maps.google.com/mapfiles/kml/pal2/icon7.png',
            name:'Simpang Jalan'
          },
          // tps: {
          //   icon: 'http://maps.google.com/mapfiles/kml/pal4/icon13.png',
          //   name:'Pembuangan Sementara'
          // },
          // supir: {
          //   icon: 'http://maps.google.com/mapfiles/kml/pal4/icon15.png',
          //   name:'supir'
          // }
        };

        var features = [
         <?php foreach($data_jalan->result_array() as $dt){?>
            
            {
            position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
            type: 'jalan',
            id : '<?php echo $dt['id_jalan'] ?>',
            nama : '<?php echo $dt['nama'] ?>',
            lat : '<?php echo $dt['latitude'] ?>',
            lng : '<?php echo $dt['longitude'] ?>',
          },
          <?php } ?>
          //  <?php foreach($data_tps->result_array() as $dt){?>
            
          //   {
          //   position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
          //   type: 'tps',
          //   id : '<?php echo $dt['id_tps'] ?>',
          //   nama : '<?php echo $dt['nm_tps'] ?>',
          //   lat : '<?php echo $dt['latitude'] ?>',
          //   lng : '<?php echo $dt['longitude'] ?>',
          // },
          // <?php } ?>
          //  <?php foreach($data_supir->result_array() as $dt){?>
            
          //   {
          //   position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
          //   type: 'supir',
          //   id :'<?php echo $dt['id_supir'] ?>',
          //   nama : '<?php echo $dt['nm_supir'] ?>',
          //   lat : '<?php echo $dt['latitude'] ?>',
          //   lng : '<?php echo $dt['longitude'] ?>', 
          // },
          // <?php } ?>
           
        ];


        // Create markers.
        features.forEach(function(feature) {
       	 
          var markers = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        
          markers.addListener('click', function() {
         
            if (x==0) {
            	document.getElementById("lat1").value = feature.lat;
            	document.getElementById("long1").value = feature.lng;
            	document.getElementById("nama1").value = feature.nama;
            	document.getElementById("id1").value = feature.id;
            	x++;
            }else{
            	document.getElementById("lat2").value = feature.lat;
            	document.getElementById("long2").value = feature.lng;
            	document.getElementById("nama2").value = feature.nama;
            	document.getElementById("id2").value = feature.id;
            	x=0;
            }

            var lat1 = document.getElementById("lat1").value; // koordinat latitude jakarta
            var lon1 = document.getElementById("long1").value; // koordinat longitude jakarta
            var lat2 = document.getElementById("lat2").value; // koordinat latitude cikarang
            var lon2 = document.getElementById("long2").value; // koordinat longitude cikarang
            var R = 6371;
           if(lat1 && lon1 && lat2 && lon2){
              var lat1rad = lat1*Math.PI/180;
              var lat2rad = lat2*Math.PI/180;
              var tatac = (lat2-lat1)*Math.PI/180;
              var lontac = (lon2-lon1)*Math.PI/180;
              var a = Math.sin(tatac/2) * Math.sin(tatac/2) +
                        Math.cos(lat1rad) * Math.cos(lat2rad) *
                        Math.sin(lontac/2) * Math.sin(lontac/2);
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

              var d = Math.round(R * c*1000);
              document.getElementById("jarak_antar_titik").value=d;
            }

          });

        });

        var flightPlans = [
        <?php foreach($data_antik->result_array() as $dta){?>
          {
            titik_1_lat: <?=$dta['titik_1_lat']?>,
            titik_1_long: <?=$dta['titik_1_long']?>,
            titik_2_lat: <?=$dta['titik_2_lat']?>,
            titik_2_long: <?=$dta['titik_2_long']?>,
            jarak: <?=$dta['jarak']?>,
            muatan: <?=$dta['muatan']?>,
            id_antik: <?=$dta['id_antik']?>
          },
        <?php } ?>
        ];

        flightPlans.forEach(function(fp) {
          var flightPlanCoordinates = [
            {lat: fp.titik_1_lat, lng: fp.titik_1_long},
            {lat: fp.titik_2_lat, lng: fp.titik_2_long}
          ];
          var flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2,
            map:map
          });
          flightPath.addListener('click', function(){
            $('#modal_lat1').html(fp.titik_1_lat);
            $('#modal_lng1').html(fp.titik_1_long);
            $('#modal_lat2').html(fp.titik_2_lat);
            $('#modal_lng2').html(fp.titik_2_long);
            $('#modal_jarak').html(fp.jarak);
            $('#modal_muatan').html(fp.muatan);
            $('.modal_id').val(fp.id_antik);
            $('#modal_muatan_ubah').val(fp.muatan);
            $('#modal_antik').modal('show');
          });
        });

        var legend = document.getElementById('legend');
            for (var key in icons) {
                var type = icons[key];
                var name = type.name;
                var icon = type.icon;
                var div = document.createElement('div');
                div.innerHTML = '<img src="' + icon + '"> ' + name;
                legend.appendChild(div);
            }
            map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
          
      }
     

  </script>
</script>