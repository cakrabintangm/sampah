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
                    <div id="legend" class="panel panel-primary" style="background: white; padding: 10px;">
                        <div class="panel-heading">Keterangan Ikon</div>
                    </div>
                    <div id="map" style="width:100%;height:400px;"></div><br/>
                    <p class="text-muted">Klik icon untuk mengubah atau menghapus data</p>
                  </div>
                  <div class="col-md-4">
                    
                    <div class="col-sm-12">
                      <label class="col-sm-4 control-label">Jenis Titik</label>
                      <select class="form-control" name="jenis_titik" id="jenis_titik_1" onchange="jenis_titik_2()" >
                        <option value="">-- Pilihan --</option>
                        <option value="tps">TPS</option>
                        <option value="jalan">Jalan</option>
                        <option value="supir">Supir</option>
                      </select>                        
                    </div>
                    
                    <form style="display: none;" id="id_tps" action="<?=base_url('master-data/save_tps')?>" method='post'>
                    <div class="row">
                      
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="latitude" >Latitude</label>
                        <input  type="text" id="latitude_tps" name="latitude_tps" class="form-control" placeholder="latitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="longitude" >Longitude</label>
                        <input  type="text" id="longitude_tps" name="longitude_tps" class="form-control" placeholder="Longtitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label  id="label_alamat" class="col-sm-4 control-label">Alamat</label>
                        <input  type="text" id="alamat_tps" name="alamat_tps" class="form-control" placeholder="Alamat" >
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label  id="label_tps" class="col-sm-4 control-label">Nama Tps</label>
                        <input  type="text" id="nama_tps" name="nama_tps" class="form-control" placeholder="Nama Tps" >
                      </div>
                      <br>
                      <br>
                    </div>
                    <br>
                    <button id="button" type="submit" class="btn btn-primary btn-flat center-block" id="simpan">Simpan</button></form>    

                    <form style="display: none;" id="id_jalan" action="<?=base_url('master-data/save_jalan')?>" method='post'>
                    <div class="row">

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="latitude" >Latitude</label>
                        <input  type="text" id="latitude_jalan" name="latitude_jalan" class="form-control" placeholder="latitude">
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="longitude" >Longitude</label>
                        <input  type="text" id="longitude_jalan" name="longitude_jalan" class="form-control" placeholder="Longtitude">
                      </div>
                      
                      <div class="col-sm-12">
                        <br>
                        <label  id="label_alamat" class="col-sm-4 control-label">Alamat</label>
                        <input  type="text" id="alamat_jalan" name="alamat_jalan" class="form-control" placeholder="Alamat" >
                      </div>

                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="latitude" >Nama Jalan</label>
                        <input  type="text"  name="nama" class="form-control" placeholder="Nama Jalan">
                      </div>
                      <br>

                    </div>
                    <br>
                    <button id="button" type="submit" class="btn btn-primary btn-flat center-block" id="simpan">Simpan</button></form>

                    <form style="display: none;" id="id_supir" action="<?=base_url('master-data/save_supir')?>" method='post'>
                    <div class="row">
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="latitude" >Latitude</label>
                        <input  type="text" id="latitude_supir" name="latitude_supir" class="form-control" placeholder="latitude">
                      </div>
                      <div class="col-sm-12">
                        <br>
                        <label class="col-sm-4 control-label" id="longitude" >Longitude</label>
                        <input  type="text" id="longitude_supir" name="longitude_supir" class="form-control" placeholder="Longtitude" >
                      </div>
                      <div class="col-sm-12">
                        <br>
                        <label  id="label_alamat" class="col-sm-4 control-label">Alamat</label>
                        <input  type="text" id="alamat_supir" name="alamat_supir" class="form-control" placeholder="Alamat" >
                      </div>
                      <div class="col-sm-12">
                        <br>
                        <label  id="label_supir" class="col-sm-4 control-label">Nama Supir</label>
                        <input  type="text" id="nama_supir" name="nama_supir" class="form-control" placeholder="Nama Supir" >
                      </div>
                        <div class="col-sm-12">
                        <br>
                        <label  id="label_angkutan" class="col-sm-8 control-label">Jenis Angkutan (Muatan)</label>
                        <select  class="form-control" id="jenis_angkutan" name="jenis_angkutan" >
                          <option value="">-- Pilihan --</option>
                          <option value="1">Dump Truk (7 kubik)</option>
                          <option value="2">Pick Up (3 kubik)</option>
                        </select>
                      </div>
                      <br>
                    </div>
                    <br>
                    <button id="button" type="submit" class="btn btn-primary btn-flat center-block" id="simpan">Simpan</button></form>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <?php $this->load->view('backend_admin/data') ?>
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

