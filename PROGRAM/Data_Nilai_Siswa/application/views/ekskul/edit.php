<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Ekstrakulikuler
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
            echo form_open('ekskul/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_Ekskul', $ekskul['ID_Ekskul']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ID Ekskul
                </label>
                <div class="col-sm-9">
                    <input type="text" readonly="" value="<?php echo $ekskul['ID_Ekskul']?>" name="ID_Ekskul" placeholder="Masukan ID Ekskul" id="form-field-1" class="form-control">
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Ekskul
                </label>
				<div class="col-sm-9">
				<input type="text" value="<?php echo $ekskul['Nama_Ekskul']?>" name="Nama_Ekskul" placeholder="Masukan Nama Ekskul" id="form-field-1" class="form-control">
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('ekskul', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>