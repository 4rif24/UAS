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
              <?php if(session()->getFlashdata('success')){ ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success</h5>
                        <?= session()->getFlashdata('success'); ?>
                    </div> 
                <?php } ?>               
                <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>/prodi/tambah"><i class="fa-solid fa-plus"></i>Tambah Prodi</a>
                 <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kd Prodi</th>
                      <th>Nama Prodi</th>
                      <th>Fakultas</th>
                      <th>Action</th>
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
                      <td>
                          <a class=" btn btn-xs btn-info" href="<?= base_url(); ?>/prodi/edit/<?= $r['id_prodi']; ?>"><i class="fa-solid fa-edit"></i></a>
                          <a class=" btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?= $r['id_prodi'];?>);"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      
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
<script>
  function hapusConfig(id) {
    Swal.fire({
    title: 'anda yakin ingin menghapus data ini ?',
    text: "data akan dihapus secara permanen!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = '<?=base_url(); ?>/prodi/hapus/' + id;
  }
});
}
</script>
<?php 
echo $this->endSection(); 
?>