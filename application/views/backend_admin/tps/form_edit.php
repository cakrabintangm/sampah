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
            <a href="<?php echo base_url();?>admin/jalur_pengangkutan" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Jalur Pengangkutan 
              </p>
            </a>
          </li>
         
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
                <h5 class="card-title"><center><strong> Master Data SIPEJASA </strong></center></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div id="map" style="width:100%;height:400px;"></div>
                  </div>
                  <div class="col-md-4">
                    
                    <div class="col-sm-12">
                      <label class="col-sm-4 control-label">Jenis Titik</label>
                      <select disabled="" class="form-control" name="jenis_titik" id="jenis_titik_1" onchange="jenis_titik_2()" >
                        <option value="">-- Pilihan --</option>
                        <option selected="" value="tps">TPS</option>
                        <option value="jalan">Jalan</option>
                        <option value="supir">Supir</option>
                      </select>                        
                    </div>
                    
                    <form style="display: block;" id="id_tps" action="<?=base_url('master-data/proses_edit/'.$data[0]['id_tps'])?>" method='post'>
                    <div class="row">
                      
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="latitude" >Latitude</label>
                        <input value="<?php echo $data[0]['latitude'] ?>"  type="text" id="latitude_tps" name="latitude_tps" class="form-control" placeholder="latitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="longitude" >Longitude</label>
                        <input value="<?php echo $data[0]['longitude'] ?>"  type="text" id="longitude_tps" name="longitude_tps" class="form-control" placeholder="Longtitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label  id="label_alamat" class="col-sm-4 control-label">Alamat</label>
                        <input value="<?php echo $data[0]['alamat'] ?>" type="text" id="alamat_tps" name="alamat_tps" class="form-control" placeholder="Alamat" >
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label  id="label_tps" class="col-sm-4 control-label">Nama Tps</label>
                        <input value="<?php echo $data[0]['nm_tps'] ?>" type="text" id="nama_tps" name="nama_tps" class="form-control" placeholder="Nama Tps" >
                      </div>
                      <br>
                      <br>
                    </div>
                    <br>
                    <button id="button" type="submit" class="btn btn-primary btn-flat center-block" id="simpan">Simpan</button></form>    


                
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

<?php if($this->session->flashdata('msg')=='warning'):?>
    <script type="text/javascript">
            $.toast({
                heading: 'Peringatan',
                text: "Maaf Ukuran Foto Terlalu Besar.Foto Gagal ditambah",
                showHideTransition: 'slide',
                icon: 'info',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#e6000b'
            });
    </script>
<?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Data Berhasil disimpan ke database.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
    </script>

<?php elseif($this->session->flashdata('msg')=='info'):?>
    <script type="text/javascript">
            $.toast({
                heading: 'Info',
                text: "Data berhasil di ubah",
                showHideTransition: 'slide',
                icon: 'info',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#00C9E6'
            });
    </script>
<?php elseif($this->session->flashdata('msg')=='mapel'):?>
<script type="text/javascript">
        $.toast({
            heading: 'Peringatan',
            text: "Data Gagal Di Input Karena Hari atau Jam Sudah Ada Jawalanya.",
            showHideTransition: 'slide',
            icon: 'info',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#e6000b'
        });
</script>

<?php elseif($this->session->flashdata('msg')=='hapus'):?>
    <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Data Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
    </script>
<?php else:?>

<?php endif;?>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<?php if($this->uri->segment(2)=="antar_titik"){
$this->load->view('script/antar_titik');
}else{ ?>
<script type="text/javascript">
   var map;
   var markers = [];
  function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:-3.635299, lng: 102.321318}, 
          zoom: 6
        });
        
        var geocoder = new google.maps.Geocoder();

         map.addListener('click', function(event) {
            deleteMarkers();
            addMarker(event.latLng);

            var myLatLng = event.latLng;
            var lat = myLatLng.lat();
            var lng = myLatLng.lng();
           
            
             document.getElementById("latitude_tps").value = lat;
             document.getElementById("longitude_tps").value = lng;
             document.getElementById("latitude_supir").value = lat;
             document.getElementById("longitude_supir").value = lng;
             document.getElementById("latitude_jalan").value = lat;
             document.getElementById("longitude_jalan").value = lng;

             geocoder.geocode({
                'latLng': event.latLng
              }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                    document.getElementById("alamat_tps").value = results[0].formatted_address;
                    document.getElementById("alamat_jalan").value = results[0].formatted_address;
                    document.getElementById("alamat_supir").value = results[0].formatted_address;
                    
                  }
                }
              });


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
            name:'supir'
          }
        };

        var features = [
         <?php foreach($data as $dt){?>
            
            {
            position: new google.maps.LatLng(<?php echo $dt['latitude']; ?>, <?php echo $dt['longitude']; ?>),
            type: 'tps',
            id : '<?php echo $dt['id_tps'] ?>',
            nama : '<?php echo $dt['nm_tps'] ?>',
            lat : '<?php echo $dt['latitude'] ?>',
            lng : '<?php echo $dt['longitude'] ?>',
          },
          <?php } ?>
           
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
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
            
            var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
         

    }

      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }
       function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
       
     

  </script>
<?php }?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1wq4NssgXxRoF1g9jhP6xWYOOA_hOx8&libraries=places&callback=initMap"
    async defer></script>
</body>
  <script type="text/javascript">
    function jenis_titik_2() {
    var tes = document.getElementById("jenis_titik_1").value;
        if( tes=="tps"){
          $('#id_tps').show();

          $('#id_jalan').hide();
          $('#id_supir').hide();

        }else if (tes=="jalan"){
          $('#id_jalan').show();

          $('#id_tps').hide();
          $('#id_supir').hide();
        }
        else if (tes=="supir"){
          $('#id_supir').show();

          $('#id_tps').hide();
          $('#id_jalan').hide();
        }

        else{
          $('#id_supir').hide();

          $('#id_tps').hide();
          $('#id_jalan').hide();
        }
        return false;

    }
  </script>

</html>

