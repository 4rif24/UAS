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
              <form action="<?= $action; ?>" method="post" autocomplete="off">
              <div class="card-body">
                <?php if(validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?= validation_list_errors(); ?>
                </div>
                <?php } ?>
                <?php if(session()->getFlashdata('error')){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Error</h5>
                        <?= session()->getFlashdata('error'); ?>
                    </div> 
                <?php } ?>
               
                <?= csrf_field(); ?>
                <?php if(current_url(true)->getSegment(2) == 'edit'){ ?>
                  <input type="hidden" name="param" id="param" value="<?= $edit_data['id_prodi']; ?>">

                <?php } ?>
                  <div class="form-group">
                    <label for="id_prodi">Id Prodi</label>
                    <input type="text" name="id_prodi" id="id_prodi" value="<?= empty(set_value('id_prodi')) ? (empty($edit_data['id_prodi']) ? "" : $edit_data['id_prodi']) : set_value('id_prodi');"" ?>"class="form-control">                    
                  </div>
                  <div class="form-group">
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" value="<?= empty(set_value('nama_prodi')) ? (empty($edit_data['nama_prodi']) ? "" : $edit_data['nama_prodi']) : set_value('nama_prodi');"" ?>"class="form-control">                    
                  </div>
                  <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" value="<?= empty(set_value('fakultas')) ? (empty($edit_data['fakultas']) ? "" : $edit_data['fakultas']) : set_value('fakultas');"" ?>"class="form-control">                    
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  class="form-control">                    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-save"></i>Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
<?php 
echo $this->endSection(); 

?>