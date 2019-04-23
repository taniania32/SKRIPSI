<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Input Data Kurikulum
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
            echo form_open_multipart('kurikulum/add', 'role="form" class="form-horizontal"');
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Kurikulum
                </label>
                <div class="col-sm-9">
                    <input type="text" required maxlength="250" name="Nama_Kurikulum" required placeholder="MASUKAN NAMA KURIKULUM" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Status Aktif
                </label>
                <div class="col-sm-9">
                    <?php echo form_dropdown('Status',array('N'=>'TIDAK','Y'=>'AKTIF'),'',"class='form-control'")?>
                </div>
            </div>

			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Lampiran
                </label>
                <div class="col-sm-2">
                    <input type="file" name="Lampiran">
                </div>
            </div>			
			
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('kurikulum', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>