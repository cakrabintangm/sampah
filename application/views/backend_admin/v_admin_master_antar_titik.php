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
                  <div class="col-md-12">
                    <div id="legend" class="panel panel-primary" style="background: white; padding: 10px;">
                        <div class="panel-heading">KETERANGAN IKON<br>! Klik garis untuk melihat detail</div>
                    </div>
                    <div id="map" style="width:100%;height:400px;"></div>
                  </div>
                  
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
                   <form  action="<?=base_url('master-data/save_antar_titik')?>" method='post'>
             <div class="row">
               <div class="col-md-6">
                   
                      
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">Latitude</label>
                        <input  type="text" id="lat1" name="lat1" class="form-control" placeholder="latitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">Longitude</label>
                        <input  type="text" id="long1" name="long1" class="form-control" placeholder="Longtitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">nama</label>
                        <input  type="text" id="nama1" name="nama1" class="form-control" placeholder="Alamat" >
                      </div>
                      

                      <div hidden class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">ID</label>
                        <input  type="text" id="id1" name="id1" class="form-control" placeholder="Nama Tps" >
                      </div>
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">Muatan</label>
                        <input  type="number" step=".01" id="" name="muatan" class="form-control" placeholder="Muatan" >
                      </div>
                      <br>
                      <br>
                   
                    <br>
                     

               </div>
               <div class="col-md-6">
                   
                
                      
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" >Latitude</label>
                        <input  type="text" id="lat2" name="lat2" class="form-control" placeholder="latitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" >Longitude</label>
                        <input  type="text" id="long2" name="long2" class="form-control" placeholder="Longtitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label  class="col-sm-4 control-label">nama</label>
                        <input  type="text" id="nama2" name="nama2" class="form-control" placeholder="Alamat" >
                      </div>

                      <div hidden class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">ID</label>
                        <input  type="text" id="id2" name="id2" class="form-control" placeholder="Nama Tps" >
                      </div>
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label">Jarak</label>
                        <input  type="number" step=".01" id="jarak_antar_titik" name="jarak" class="form-control" placeholder="Jarak" >
                      </div>
                      <br>
                      
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-flat center-block" id="simpan">Simpan</button>
                      </div>
                    </div>
                    
                      
             </div>
                  </form>  

                  
                  <!-- Modal -->
                  <div id="modal_antik" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Info Path</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered">
                            <tr>
                              <td>Titik 1</td>
                              <td>Titik 2</td>
                            </tr>
                            <tr>
                              <td>Latitude : <strong id="modal_lat1"></strong></td>
                              <td>Latitude : <strong id="modal_lat2"></strong></td>
                            </tr>
                            <tr>
                              <td>Longitude : <strong id="modal_lng1"></strong></td>
                              <td>Longitude : <strong id="modal_lng2"></strong></td>
                            </tr>
                            <tr>
                              <td>Jarak : <strong id="modal_jarak"></strong></td>
                              <td>Muatan : <strong id="modal_muatan"></strong></td>
                            </tr>
                          </table>

                          <form action="<?=base_url('master-data/ubah_antar_titik')?>" method="post" class="row">
                            <div class="col-md-6">
                              <input type="hidden" name="id_antik" class="modal_id">
                              <input type="number" step=".01" name="muatan" class="form-control" id="modal_muatan_ubah" value="0">
                            </div>
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Ubah muatan</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <form action="<?=base_url('master-data/hapus_antar_titik')?>" method="post">
                            <input type="hidden" name="id_antik" class="modal_id">
                            <button type="submit" class="btn btn-danger">Hapus Path</button>
                          </form>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
             
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

