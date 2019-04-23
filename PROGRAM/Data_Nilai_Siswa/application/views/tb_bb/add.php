<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Input Data Fisik Siswa
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
<?php
                            $data=$this->session->flashdata('error');
                            if($data!=""){ ?>
                            <div class="alert alert-danger"><strong>Error! </strong> <?=$data;?></div>
                            <?php } ?>

        <div class="panel-body">

            <?php
            echo form_open('tb_bb/add', 'role="form" class="form-horizontal"');
            ?>

			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Rombel
                </label>
                <div class="col-sm-9">
                 <SELECT class="form-control" required name="ID_Rombel" id="ID_Rombel" style="width:200px;">
 
                            <option value="">Please Select</option>
                            <?php
                            foreach ($dataCombo as $rom) {
                                ?>
                                <option <?php echo $rombel_selected == $rom['ID_Rombel'] ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $rom['ID_Rombel'] ?>"><?php echo $rom['Nama_Rombel'] ?></option>
                                <?php
                            }
                            ?>
                </SELECT>
                 </div>
                
            </div>
			
<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Siswa
                </label>
<div class="col-sm-5">
<select class="form-control" name="NISN" id="NISN" >
<option value="">Please Select</option>
                            <?php
                            foreach ($siswa as $sw) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $siswa_selected == $sw->ID_Rombel ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $sw->ID_Rombel ?>" value="<?php echo $sw->NISN ?>"><?php echo $sw->Nama ?></option>
                                <?php
                            }
                            ?>
            </select>
                </div>
 </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Tinggi Badan
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" name="TB" placeholder="Masukan Tinggi Badan" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-1">
                    <input type="TEXT" readonly placeholder="CM" id="form-field-1" class="form-control">
                </div>
            </div>
			
			            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Berat Badan
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" name="BB" required placeholder="Masukan Berat Badan" id="form-field-1" class="form-control">
                </div>
                                <div class="col-sm-1">
                    <input type="TEXT" readonly placeholder="KG" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Penglihatan
                </label>
                <div class="col-sm-5">
                    <input type="TEXT" required name="Penglihatan" required placeholder="Masukan Penglihatan" id="form-field-1" class="form-control">
                </div>
            </div>

                        <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Pendengaran
                </label>
                <div class="col-sm-5">
                    <input type="TEXT" required name="Pendengaran" required placeholder="Masukan Pendengaran" id="form-field-1" class="form-control">
                </div>
            </div>

                                    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Gigi
                </label>
                <div class="col-sm-5">
                    <input type="TEXT" required name="Gigi" required placeholder="Masukan Gigi" id="form-field-1" class="form-control">
                </div>
            </div>
			
			
			            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), null, "class='form-control'");
                    ?>
                </div>
            </div>
			
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('tb_bb', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
            <script src="<?php echo base_url('js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#NISN").chained("#ID_Rombel");
        </script>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>