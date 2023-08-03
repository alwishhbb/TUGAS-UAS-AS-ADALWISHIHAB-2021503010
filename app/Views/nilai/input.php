<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>

            <!-- /.card-header -->

            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if(validation_errors()){
                        ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                        <?php echo validation_list_errors() ?>
                    </div>

                    <?php 
                    }
                    ?>

                    <?php
                if(session()->getFlashdata('error')){
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5><i class="icon fas fa-ban"></i> Error</h5>
                        <?php echo session()->getFlashdata('error');?>
                    </div>
                    <?php
                }
                ?>

                    <?php echo csrf_field()?>
                    <div class="form-group">
                        <label for="kdmhs">Kode Mahasiswa</label>
                        <input type="text" name="kdmhs" id="kdmhs" value="<?php echo set_value('kdmhs')?>"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" id="nama_mhs" value="<?php echo set_value('nama_mhs') ?>"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" name="fakultas" id="fakultas" value="<?php echo set_value('fakultas')?>"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();