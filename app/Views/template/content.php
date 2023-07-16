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
                <?= $selamat_datang; ?>
              </div>              
            </div>  
        </div>
</div>

<?php
echo $this->endSection();   