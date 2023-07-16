<?php 
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $title_card; ?></h3>
              </div>
              <!-- card reader -->
              <div class="card-body">
                 <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kd Prodi</th>
                      <th>Nama Prodi</th>
                      <th>Fakultas</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                   $no = 1;
                   foreach ($data_prodi  as $r) { ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['id_prodi']; ?></td>
                      <td><?= $r['nama_prodi']; ?></td>
                      <td><?= $r['fakultas']; ?></td>
                      <td> edit | delete</td>
                    </tr>
                    <?php 
                      $no++;
                   } ?>
                  </tbody>
                </table>
              </div>              
            </div>  
        </div>
</div>
<?php 
echo $this->endSection(); 
?>