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
            <div class="card-body">
                <?php
                if(session()->getFlashdata('success')){
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h5><i class="icon fas fa-check"></i> Success</h5>
                    <?php echo session()->getFlashdata('success');?>
                </div>
                <?php
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No.</th>
                            <th>Kd Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Fakultas</th>
                            <th>Nilaip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1; 
                        foreach ($data_prodi as $r) {
                            ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['kdmhs'];?></td>
                            <td><?php echo $r['nama_mhs'];?></td>
                            <td><?php echo $r['fakultas'];?></td>
                            <td>
                                <a class="btn btn-xs btn-info"
                                    href="<?php echo base_url(); ?>/prodi/edit/<?php echo $r['kdmhs']; ?>"><i
                                        class="fa-solid fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger" href="#"
                                    onclick="return hapusConfig(<?php echo $r['kdmhs'];?>)"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function hapusConfig(id) {
    Swal.fire({
        title: 'yakin Ingin Menghapusnya ?',
        text: "Jika setuju data akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus saja !'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php echo base_url();?>/prodi/hapus/' + id;
        }
    })
}
</script>
<?php 
echo $this->endSection();