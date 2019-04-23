<div class="col-sm-12">
<div class="page-header">
<h1>Edit Data Siswa</h1>							
</div>
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Siswa
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>
                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                    <i class="fa fa-wrench"></i>
                </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#">
                    <i class="fa fa-refresh"></i>
                </a>
                <a class="btn btn-xs btn-link panel-expand" href="#">
                    <i class="fa fa-resize-full"></i>
                </a>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">

            <?php
            echo form_open_multipart('siswa/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('NISN', $siswa['NISN']);
            ?>

            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    NISN
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['NISN'] ?>" onKeyDown="if(this.value.length==10) this.value = this.value.slice(0, - 1);" readonly="" placeholder="Masukan NISN" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    No. Induk
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['No_Induk'] ?>" readonly="" onKeyDown="if(this.value.length==4) this.value = this.value.slice(0, - 1);" placeholder="Masukan No. Induk" id="form-field-1" class="form-control">
                </div>
            </div>            
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Nama
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['Nama'] ?>" name="Nama" placeholder="Nama" id="form-field-1" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Jenis Kelamin
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('JK', array('L' => 'LAKI-LAKI', 'P' => 'PEREMPUAN'), $siswa['JK'], "class='form-control'");
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Keterangan
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $siswa['Ket'] ?>" name="Ket" placeholder="Ket" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Rombel
                </label>
                <div class="col-sm-3">
                    <?php
                    echo cmb_dinamis('ID_Rombel', 'tb_m_rombel', 'Nama_Rombel', 'ID_Rombel', $siswa['ID_Rombel']);
                    ?>
                </div>
            </div>
                        <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Kelas
                </label>
                <div class="col-sm-2">
                   <?php echo cmb_dinamis('ID_Kelas', 'tb_m_kelas', 'ID_Kelas', 'ID_Kelas',$siswa['ID_Kelas'])?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('siswa', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>