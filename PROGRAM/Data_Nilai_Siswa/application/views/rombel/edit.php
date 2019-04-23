<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Rombongan Belajar
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
            echo form_open('rombel/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_Rombel', $ID_Rombel['ID_Rombel']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Rombel
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $ID_Rombel['Nama_Rombel']?>" name="Nama_Rombel" placeholder="Masukan Nama Rombel" id="form-field-1" class="form-control">
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Kelas
                </label>
                <div class="col-sm-9">
                    <?php echo cmb_dinamis('ID_Kelas', 'tb_m_kelas', 'ID_Kelas', 'ID_Kelas',$ID_Rombel['ID_Kelas']) ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('rombel', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>