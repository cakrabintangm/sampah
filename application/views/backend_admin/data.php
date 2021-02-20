<!-- <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <table>
                      <p>DATA TPS</p>
                      <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($tps as $key){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key['nm_tps']?></td>
                          <td>
                            <a class="btn btn-success btn-flat center-block" href="<?php echo base_url('master-data/edit_tps/').$key['id_tps']?>">Edit</a>
                            <a class="btn btn-danger btn-flat center-block"  href="<?php echo base_url('master-data/delete_tps/').$key['id_tps']?>" onclick="return confirm('apakah ada ingin menghapus data?');">Hapus</a>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <table>
                      <p>DATA SUPIR</p>
                      <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($supir as $key){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key['nm_supir']?></td>
                          <td>
                            <a class="btn btn-success btn-flat center-block" href="<?php echo base_url('master-data/edit_supir/').$key['id_supir']?>">Edit</a>
                            <a class="btn btn-danger btn-flat center-block"  href="<?php echo base_url('master-data/delete_supir/').$key['id_supir']?>" onclick="return confirm('apakah ada ingin menghapus data?');">Hapus</a>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <table>
                      <p>DATA JALAN</p>
                      <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th width="40%">Aksi</th>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($jalan as $key){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key['nama']?></td>
                          <td>
                            <a class="btn btn-success btn-flat center-block" href="<?php echo base_url('master-data/edit_jalan/').$key['id_jalan']?>">Edit</a>
                            <a class="btn btn-danger btn-flat center-block"  href="<?php echo base_url('master-data/delete_jalan/').$key['id_jalan']?>" onclick="return confirm('apakah ada ingin menghapus data?');">Hapus</a>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> -->