<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=$judul?></title>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/adminlte.min.css'?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/adminlte.min.css'?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/toastr/toastr.min.css'?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/jquery-3.4.1.js'?>"/>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url().'master-data/index'?>" class="brand-link">
      <span class="brand-text font-weight-light">SIM Sampah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'master-data/index'?>" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li> 
          <li class="nav-header">MANAJEMAN DATA</li>
             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Jalur Pengangkutan 
              </p>
            </a>
          </li>
          <ul>
            <!-- <li class="nav-item">
            <a href="<?php echo base_url().'master-data/jalur_pengangkutan'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Individu
              </p>
            </a>
            </li> -->
            <li class="nav-item">
            <a href="<?php echo base_url().'master-data/jalur_pengangkutan2'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Kelompok
              </p>
            </a>
            </li>
          </ul>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Master Data
              </p>
            </a>
          </li>
          <ul>
            <li class="nav-item">
            <a href="<?php echo base_url().'master-data/master_data'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                nambah titik
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo base_url().'master-data/antar_titik'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                nyambungkan titik
              </p>
            </a>
            </li>
          </ul>
          <li class="nav-item">
            <a href="<?php echo base_url().'user/logout'?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes --> 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><center><strong> Jalur Pengangkutan </strong></center></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <form method="get" action="<?php echo base_url()?>master-data/jalur_pengangkutan" class="form-horizontal">
                        <div class="col-sm-12">
                          <label class="col-sm-4 control-label" id="latitude" >Nama Supir</label>
                          <select name="id_supir">
                            <?php foreach($data_supir->result_array() as $dt){?>
                              <option value="<?php echo $dt['id_supir'] ?>"><?php echo $dt['nm_supir'] ?></option>
                            <?php } ?>
                          </select>
                          <button type="submit" class="btn btn-primary btn-flat">refresh</button>
                          <?php if(!empty($id_supir)){ ?>
                          <a href="<?=base_url('jalur-pengangkutan/johnson/'.$id_supir)?>" target="_blank" class="btn btn-success btn-flat">debug</a>
                          <?php } ?>
                        </div>
                        
                      </form>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">

                    <?php if(!empty($id_supir)){ ?>
                    <h6>Jarak tempuh total : <?=$distance?></h6>
                    <h6>Muatan total : <?=$muatan?></h6>
                    <h6>Rute : <?=implode(' -- ', $ruteStr)?></h6>
                    <table class="table table-bordered">
                      <thead>
                        <th>Titik 1</th>
                        <th>Titik 2</th>
                        <th>Jarak</th>
                        <th>Muatan</th>
                      </thead>
                      <tbody>
                        <?php foreach($ruteArr as $rta){ ?>
                        <tr>
                          <?php if($rta['type']==1){ ?>
                          <td><?=$rta['titik_1'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_1'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_1'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_1'])->row()->nama_titik?></td>
                          <td><?=$rta['titik_2'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_2'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_2'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_2'])->row()->nama_titik?></td>
                          <?php } else { ?>
                          <td><?=$rta['titik_2'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_2'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_2'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_2'])->row()->nama_titik?></td>
                          <td><?=$rta['titik_1'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_1'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_1'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_1'])->row()->nama_titik?></td>
                          <?php } ?>
                          <td><?=$rta['jarak']?></td>
                          <td><?=$rta['muatan']?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php } ?>

                    <div id="legend" class="panel panel-primary" style="background: white; padding: 10px;">
                        <div class="panel-heading">KETERANGAN IKON<br>! Klik garis untuk melihat detail</div>
                    </div>
                    <div id="map" style="width:100%;height:540px;"></div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy;<a href="">UNIB 2015</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js'?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url().'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.js'?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url().'assets/plugins/sweetalert2/sweetalert2.min.js'?>"></script>
<!-- Toastr -->
<script src="<?php echo base_url().'assets/plugins/toastr/toastr.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js'?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url().'assets/plugins/jquery-mousewheel/jquery.mousewheel.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/raphael/raphael.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-mapael/jquery.mapael.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-mapael/maps/usa_states.min.js'?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url().'assets/plugins/chart.js/Chart.min.js'?>"></script>

<script type="text/javascript">
   var map;
   
  function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -3.82409, lng: 102.264435}, 
          zoom: 12.2
        });
        
         var iconBase = 'https://maps.google.com/mapfiles/kml/pal3/';
        
        var icons = {
          jalan: {
            icon: 'http://maps.google.com/mapfiles/kml/pal2/icon7.png',
            name:'Simpang Jalan'
          },
          tps: {
            icon: 'http://maps.google.com/mapfiles/kml/pal4/icon13.png',
            name:'Pembuangan Sementara'
          },
          supir: {
            icon: 'http://maps.google.com/mapfiles/kml/pal4/icon15.png',
            name:'Supir'
          }
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
           <?php foreach($data_tps->result_array() as $dt){?>
            
            {
            position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
            type: 'tps',
            id : '<?php echo $dt['id_tps'] ?>',
            nama : '<?php echo $dt['nm_tps'] ?>',
            lat : '<?php echo $dt['latitude'] ?>',
            lng : '<?php echo $dt['longitude'] ?>',
          },
          <?php } ?>
           <?php foreach($data_supir->result_array() as $dt){?>
            
            {
            position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
            type: 'supir',
            id :'<?php echo $dt['id_supir'] ?>',
            nama : '<?php echo $dt['nm_supir'] ?>',
            lat : '<?php echo $dt['latitude'] ?>',
            lng : '<?php echo $dt['longitude'] ?>', 
          },
          <?php } ?>
           
        ];

        // Create markers.
        features.forEach(function(feature) {
          var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">'+feature.nama+'</h1>'+
            '<div id="bodyContent">'+
            // '<p>'+aksi+'</p>'+
            '</div>'+
            '</div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });

          var markers = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });

          markers.addListener('click', function() {
            infowindow.open(map, markers);
          });

        });

        <?php if(!empty($id_supir)){ ?>


        var flightPlans = [
        <?php foreach($ruteArr as $dta){?>
          {
            titik_1_lat: <?=$dta['titik_1_lat']?>,
            titik_1_long: <?=$dta['titik_1_long']?>,
            titik_2_lat: <?=$dta['titik_2_lat']?>,
            titik_2_long: <?=$dta['titik_2_long']?>
          },
        <?php } ?>
        ];

        // DRAW POLYLINE

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
        });

        // DRAW ROUTE

        var directionsService = new google.maps.DirectionsService();
        var ind = 0;
        flightPlans.forEach(function(fp) {
          // ind++;
          // if(ind==1){
            var origin = {lat: fp.titik_1_lat, lng: fp.titik_1_long};
            var destination = {lat: fp.titik_2_lat, lng: fp.titik_2_long};

            var request = {
              origin: origin,
              destination: destination,
              travelMode: 'DRIVING',
              // provideRouteAlternatives: true
            };

            directionsService.route(request, function(result, status) {
              console.log(result);
              if (status == google.maps.DirectionsStatus.OK) {
                new google.maps.DirectionsRenderer({
                    map: map,
                    directions: result
                  });
                // Alternative route
                // for (var i = 0, len = result.routes.length; i < len; i++) {
                //   new google.maps.DirectionsRenderer({
                //     map: map,
                //     directions: result,
                //     routeIndex: i
                //   });
                // }
              }
            });
          // }

        });

        <?php } ?>

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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1wq4NssgXxRoF1g9jhP6xWYOOA_hOx8&libraries=places&callback=initMap"
    async defer></script>
</body>

</html>