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
function toColor($n) {
    $n = crc32($n);
    $n &= 0xffffffff;
    return("#".substr("000000".dechex($n),-6));
}
                
    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url().'admin/index'?>" class="brand-link">
      <span class="brand-text font-weight-light">SIM Sampah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url().'admin/index'?>" class="nav-link ">
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
            <li class="nav-item">
            <a href="<?php echo base_url().'admin/jalur_pengangkutan'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Individu
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo base_url().'admin/jalur_pengangkutan2'?>" class="nav-link">
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
            <a href="<?php echo base_url().'admin/master_data'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                nambah titik
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo base_url().'admin/antar_titik'?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                nyambungkan titik
              </p>
            </a>
            </li>
          </ul>
          <li class="nav-item">
            <a href="<?php echo base_url().'admin/keluar'?>" class="nav-link">
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
                      <a href="<?=base_url('admin/jalur_pengangkutan2/generate')?>" class="btn btn-primary"> GENERATE</a>
                    </div>
                </div>
              </div>
              <!-- ./card-body -->

            </div>
            <!-- /.card -->

            <!-- Card Peta Kelompok -->
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><a data-toggle="collapse" href="#collapse-kelompok">Peta Kelompok</a></h5>
              </div>
              <div id="collapse-kelompok" class="collapse">
                <div class="card-body">
                  <div class="row">
                    <div id="map-kelompok" style="width:100%;height:400px;"></div>
                    <div id="legend-kelompok" class="panel panel-primary" style="background: white; padding: 10px;">
                      <div class="panel-heading">KETERANGAN IKON<br>! Klik garis untuk melihat detail</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php if(!empty($supir)){ 
              foreach($supir as $row){ ?>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><a data-toggle="collapse" href="#collapse<?=$row['supir']['id_supir']?>">SUPIR : <?=$row['supir']['nm_supir']?></a></h5>
              </div>
              <!-- /.card-header -->
              <div id="collapse<?=$row['supir']['id_supir']?>" class="collapse">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <h6><strong>Jarak tempuh total :</strong> <?=$row['distance']?></h6>
                      <h6><strong>Muatan total :</strong> <?=$row['muatan']?></h6>
                      <h6><strong>Rute :</strong> <?=implode(' -- ', $row['ruteStr'])?></h6>
                      <h6><strong>TPS :</strong> <?=$row['tps']['nm_tps']?></h6>
                    </div>
                    <div class="col-md-2">
                      <a href="#" class="btn btn-success text-right" data-idsupir="<?=$row['supir']['id_supir']?>" data-toggle="modal" data-target="#modal_map">Lihat Peta</a>
                    </div>
                  </div>
                  <table class="table table-bordered">
                    <thead>
                      <th>Titik 1</th>
                      <th>Titik 2</th>
                      <th>Jarak</th>
                      <th>Muatan</th>
                    </thead>
                    <tbody>
                      <?php foreach($row['ruteArr'] as $rta){ ?>
                      <tr>
                        <td><?=$rta['titik_1'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_1'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_1'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_1'])->row()->nama_titik?></td>
                        <td><?=$rta['titik_2'].' - '.$this->db->query('SELECT nama as nama_titik FROM jalan WHERE id_jalan='.$rta['titik_2'].' UNION SELECT nm_supir FROM supir WHERE id_supir='.$rta['titik_2'].' UNION SELECT nm_tps FROM tps WHERE id_tps='.$rta['titik_2'])->row()->nama_titik?></td>
                        <td><?=$rta['jarak']?></td>
                        <td><?=$rta['muatan']?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- ./card-body -->
              </div>

            </div>
            <!-- /.card -->

            <?php }} ?>

                  <!-- Modal -->
                  <div id="modal_map" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Info Path</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                      <div id="legend" class="panel panel-primary" style="background: white; padding: 10px;">
                          <div class="panel-heading">KETERANGAN IKON<br>! Klik garis untuk melihat detail</div>
                      </div>
                      <div id="map" style="width:100%;height:400px;"></div>

                        </div>
                      </div>

                    </div>
                  </div>

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


<?php if(!empty($supir)){ ?>

<script type="text/javascript">

   var map;

  var color = ['#002685', '#449ADF', '#4DC7FD', '#4CDE77', '#5E53C7', '#7E77D2', '#CD1E10', '#FC007F', '#FE79D1', '#763931', '#F1AB00', '#FADF00', '#000000', '#007E34', '#64D13E'];
  
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
      name:'supir'
    }
  };

  var legend = document.getElementById('legend');
  for (var key in icons) {
      var type = icons[key];
      var name = type.name;
      var icon = type.icon;
      var div = document.createElement('div');
      div.innerHTML = '<img src="' + icon + '"> ' + name;
      legend.appendChild(div);
  }

  $('#modal_map').on('shown.bs.modal', function(e) {
        var element = $(e.relatedTarget);
        var data = element.data("idsupir")
        initialize(data);
    });

  function initMap(){
    console.log('API Loaded');
  }

  function initialize(id_supir){
    console.log(id_supir)
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -3.80859, lng: 102.264435}, 
      zoom: 12
    });

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

    var flightPlans = {

      <?php if(!empty($supir)){ 
          foreach($supir as $row){ ?>

      <?=$row['supir']['id_supir']?> : [
          // rumah supir
          {
            titik_1_lat: <?=$row['supir']['latitude']?>,
            titik_1_long: <?=$row['supir']['longitude']?>,
            titik_2_lat: <?=$row['ruteAwal']['latitude']?>,
            titik_2_long: <?=$row['ruteAwal']['longitude']?>
          },

          // rute jalan
        <?php foreach($row['ruteArr'] as $dta){?>
          {
            titik_1_lat: <?=$dta['titik_1_lat']?>,
            titik_1_long: <?=$dta['titik_1_long']?>,
            titik_2_lat: <?=$dta['titik_2_lat']?>,
            titik_2_long: <?=$dta['titik_2_long']?>
          },
        <?php } ?>

          // rute ke tps
          {
            titik_1_lat: <?=$row['ruteAkhir']['latitude']?>,
            titik_1_long: <?=$row['ruteAkhir']['longitude']?>,
            titik_2_lat: <?=$row['tps']['latitude']?>,
            titik_2_long: <?=$row['tps']['longitude']?>
          }
      ],

      <?php }} ?>

    };

    var fpl = flightPlans[id_supir];

    // DRAW ROUTE
    var directionsService = new google.maps.DirectionsService();
    fpl.forEach(function(fp, index) {
      var origin = {lat: fp.titik_1_lat, lng: fp.titik_1_long};
      var destination = {lat: fp.titik_2_lat, lng: fp.titik_2_long};

      var request = {
        origin: origin,
        destination: destination,
        travelMode: 'DRIVING',
        // provideRouteAlternatives: true
      };

      setTimeout(function() {
        directionsService.route(request, function(result, status) {
          console.log(result);
          if (status == google.maps.DirectionsStatus.OK) {
            new google.maps.DirectionsRenderer({
                map: map,
                directions: result,
                suppressMarkers: true
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
      }, index*500);

    });

    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
  }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1wq4NssgXxRoF1g9jhP6xWYOOA_hOx8&libraries=places&callback=initMap"
    async defer></script>

<?php } ?>

<script>
  let legendKelompok = document.getElementById('legend-kelompok');
  for (let key in icons) {
      let type = icons[key];
      let name = type.name;
      let icon = type.icon;
      let div = document.createElement('div');
      div.innerHTML = '<img src="' + icon + '"> ' + name;
      legendKelompok.appendChild(div);
  }

  function initMap() {
    let myLatLng = {lat: -3.80859, lng: 102.264435};

    let mapKelompok = new google.maps.Map(document.getElementById('map-kelompok'), {
      zoom: 12,
      center: myLatLng
    });

    let features = [
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

    features.forEach(function(feature) {
      let contentString = `
        <div id="content">
          <div id="siteNotice">
          </div>
          <h3 id="firstHeading" class="firstHeading">${feature.nama}</h3>
          <div id="bodyContent">
          </div>
        </div>
      `;

      let infowindow = new google.maps.InfoWindow({
        content: contentString
      });

      let markersKelompok = new google.maps.Marker({
        position: feature.position,
        icon: icons[feature.type].icon,
        map: mapKelompok
      });

      markersKelompok.addListener('click', function() {
        infowindow.open(mapKelompok, markersKelompok);
      });
    });

    let flightPlans = {
      <?php if(!empty($supir)) {
        foreach($supir as $row) { ?>
          <?=$row['supir']['id_supir']?> : [
            // rumah supir
            {
              titik_1_lat: <?=$row['supir']['latitude']?>,
              titik_1_long: <?=$row['supir']['longitude']?>,
              titik_2_lat: <?=$row['ruteAwal']['latitude']?>,
              titik_2_long: <?=$row['ruteAwal']['longitude']?>
            },

            // rute jalan
            <?php foreach($row['ruteArr'] as $dta) { ?>
              {
                titik_1_lat: <?=$dta['titik_1_lat']?>,
                titik_1_long: <?=$dta['titik_1_long']?>,
                titik_2_lat: <?=$dta['titik_2_lat']?>,
                titik_2_long: <?=$dta['titik_2_long']?>
              },
            <?php } ?>

            // rute ke tps
            {
              titik_1_lat: <?=$row['ruteAkhir']['latitude']?>,
              titik_1_long: <?=$row['ruteAkhir']['longitude']?>,
              titik_2_lat: <?=$row['tps']['latitude']?>,
              titik_2_long: <?=$row['tps']['longitude']?>
            }
          ],
        <?php }
      } ?>
    };

    <?php if(!empty($supir)) {
      foreach($supir as $row) { ?>
        let fpl_<?=$row['supir']['id_supir']?> = flightPlans[<?=$row['supir']['id_supir']?>];

        // DRAW ROUTE
        let directionsService_<?=$row['supir']['id_supir']?> = new google.maps.DirectionsService();
        fpl_<?=$row['supir']['id_supir']?>.forEach(function(fp, index) {
          let origin = {lat: fp.titik_1_lat, lng: fp.titik_1_long};
          let destination = {lat: fp.titik_2_lat, lng: fp.titik_2_long};

          let request = {
            origin: origin,
            destination: destination,		
            travelMode: 'DRIVING',
          };

          setTimeout(function() {
            directionsService_<?=$row['supir']['id_supir']?>.route(request, function(result, status) {
              console.log(result);
              if (status === google.maps.DirectionsStatus.OK) {
                new google.maps.DirectionsRenderer({
			polylineOptions: { strokeColor: "<?php echo toColor(substr($row['supir']['id_supir'],2,2));?>" },
                  map: mapKelompok,
                  directions: result,
                  suppressMarkers: true
                });
              }
            });
          }, index*500);
        });
      <?php }
    } ?>

    mapKelompok.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legendKelompok);
  }
</script>

</body>

</html>