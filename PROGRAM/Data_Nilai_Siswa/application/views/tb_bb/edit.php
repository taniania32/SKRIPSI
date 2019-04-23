<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Text Fields
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
            echo form_open('tb_bb/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_TB_BB', $ID_TB_BB['ID_TB_BB']);
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    ID TB dan BB
                </label>
                <div class="col-sm-2">
                    <input type="text" readonly="" value="<?php echo $ID_TB_BB['ID_TB_BB']?>" name="ID_TB_BB" placeholder="Masukan ID TB BB" id="form-field-1" class="form-control">
                </div>
            </div>
			
			<div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Siswa - Rombel
                </label>
                <div class="col-sm-5">
                    <select class="form-control" name="NISN" required>
              <option value="">--Select--
              </option>
            <?php foreach($dataCombo as $row) { ?>
              <option value="<?php echo $row['NISN']; ?>"<?= ($row['NISN']==$getrow['NISN'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama']; ?> - Rombel : <?php echo $row['Nama_Rombel']; ?>
              </option>
            <?php } ?>
            </select>
            </div>
            </div>
			
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Tinggi Badan
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" value="<?php echo $ID_TB_BB['TB']?>" name="TB" placeholder="Masukan Tinggi Badan" id="form-field-1" class="form-control">
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
                    <input type="number" required min="0" onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" value="<?php echo $ID_TB_BB['BB']?>" name="BB" placeholder="Masukan Berat Badan" id="form-field-1" class="form-control">
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
                    <input type="text" required value="<?php echo $ID_TB_BB['Penglihatan']?>" name="Penglihatan" placeholder="Masukan Penglihatan" id="form-field-1" class="form-control">
                </div>
            </div>
                              <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Pendengaran
                </label>
                <div class="col-sm-5">
                    <input type="text" required value="<?php echo $ID_TB_BB['Pendengaran']?>" name="Pendengaran" placeholder="Masukan Pendengaran" id="form-field-1" class="form-control">
                </div>
            </div>
			
                                          <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Gigi
                </label>
                <div class="col-sm-5">
                    <input type="text" required value="<?php echo $ID_TB_BB['Gigi']?>" name="Gigi" placeholder="Masukan Gigi" id="form-field-1" class="form-control">
                </div>
            </div>
			            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-2">
                    <?php
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), $ID_TB_BB['Semester'], "class='form-control'");
                    ?>
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('tb_bb', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->
</div>