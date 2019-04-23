<div class="col-sm-12">
<div class="page-header">
<h1>Input Data Siswa</h1>							
</div>

    <!-- start: TEXT FIELDS PANEL -->

                            <?php
                            $data=$this->session->flashdata('error');
                            if($data!=""){ ?>
                            <div class="alert alert-danger"><strong>Error! </strong> <?=$data;?></div>
                            <?php } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Input Data Siswa
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
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>


            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    NISN
                </label>
                <div class="col-sm-9">
                    <input type="number" onKeyDown="if(this.value.length==10) this.value = this.value.slice(0, - 1);" name="NISN" placeholder="Masukan NISN" required id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    No. Induk
                </label>
                <div class="col-sm-9">
                    <input type="number" name="No_Induk" onKeyDown="if(this.value.length==4) this.value = this.value.slice(0, - 1);" required placeholder="Masukan No. Induk" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Nama
                </label>
                <div class="col-sm-9">
                    <input type="text" name="Nama" required maxlength="250" placeholder="Masukan Nama" id="form-field-1" class="form-control">
                </div>
            </div>            
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Jenis Kelamin
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('JK', array('L' => 'LAKI-LAKI', 'P' => 'PEREMPUAN'), null, "class='form-control'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Keterangan
                </label>
                <div class="col-sm-9">
                    <input type="text" name="Ket" placeholder="Masukan Keterangan" id="form-field-1" class="form-control">
                </div>
            </div>            
            <div class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Rombel
                </label>
                <div class="col-sm-2" required>
                    <?php
                    echo cmb_dinamis('ID_Rombel', 'tb_m_rombel', 'Nama_Rombel', 'ID_Rombel');
                    ?>
                </div>
            </div>
            <div  class="form-group">
                <label class='col-md-2' class="col-sm-2 control-label" for="form-field-1">
                    Kelas
                </label>
                <div class="col-sm-2" required>
                   <?php echo cmb_dinamis('ID_Kelas', 'tb_m_kelas', 'ID_Kelas', 'ID_Kelas')?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
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