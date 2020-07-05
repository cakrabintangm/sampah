   <?php 
   $jalan=$data_jalan->result_array();
   $tps= $data_tps->result_array();
   $supir =$data_supir->result_array();

   ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes --> 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><center><strong> Selamat Datang Di Sistem Informasi Jalur Tercepat Pengambilan Sampah Dengan Metode Jhonson </strong></center></h5>
              </div>
              <!-- /.card-header -->
               <div class="row">
              <div class="col-md-9">
                  <div class="card-body">
                   
                      <div id="map" style="width:100%;height:400px;"></div>
                    
                    <!-- /.row -->
                  </div>
              </div>
              <div class="col-md-3">
                         <div  class="small-box bg-red">
                            <div class="inner">
                              <h3><?php echo count($jalan) ?></h3>
                              <p>Titik jalan</p>
                            </div>
                            <div class="icon">
                              <i class="icon ion-android-subway"></i>
                            </div>
                            <a href="#" class="small-box-footer"></a>
                          </div>
                          <div  class="small-box bg-yellow">
                            <div class="inner">
                              <h3><?php echo count($tps) ?></h3>
                              <p>Titik Tempat Pembuangan Sementara</p>
                            </div>
                            <div class="icon">
                              <i class="icon ion-trash-a"></i>
                            </div>
                            <a href="#" class="small-box-footer"></a>
                          </div>
                            <div   class="small-box bg-aqua">
                            <div class="inner">
                              <h3><?php echo count($supir) ?></h3>
                              <p>Titik Supir</p>
                            </div>
                            <div class="icon">
                              <i class="icon ion-ios-people"></i>
                            </div>
                            <a href="#" class="small-box-footer"></a>
                          </div>
              </div>
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

