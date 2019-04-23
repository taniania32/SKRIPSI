<div class="col-sm-12">
<div class="page-header">
<h1>List Data Nilai</h1>							
</div>
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            List Data Nilai
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
            echo form_open('nilai_H/list', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_P_H', $nilai_H['ID_P_H']);
            ?>

          <table width="100%" align="center">
          <tr>
            <td width="50%">
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-5">
                <?php
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), $nilai_H['Semester'], "class='form-control' readonly");
                    ?>
                </div>
            </div>            
            </td>
            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Tahun Pelajaran
                </label>
                <div class="col-sm-5">
                    <select class="form-control" readonly="readonly" name="id_tahun_akademik" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbThn as $row) { ?>
              <option value="<?php echo $row['id_tahun_akademik']; ?>"<?= ($row['id_tahun_akademik']==$getrow['id_tahun_akademik'])?'selected="selected"':""; ?> >
                <?php echo $row['tahun_akademik']; ?>
              </option>
            <?php } ?>
            </select>
                </SELECT>
                </div>
            </div>
        </td>
</tr>
<tr>
   <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Rombel
                </label>
                <div class="col-sm-5">

<select class="form-control" name="ID_Rombel" readonly="readonly" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbRmbl as $row) { ?>
              <option value="<?php echo $row['ID_Rombel']; ?>"<?= ($row['ID_Rombel']==$getrow['ID_Rombel'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama_Rombel']; ?>
              </option>
            <?php } ?>
            </select>


                </div>

            </div>
        </td>
        <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nama Lengkap
                </label>
                <div class="col-sm-5">
                    
<select class="form-control" name="ID_Mapel" required readonly="readonly">
    <option value="">--Select--
              </option>
<?php foreach($dataCmbSis as $row) { ?>
              <option value="<?php echo $row['NISN']; ?>"<?= ($row['NISN']==$getrow['NISN'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama']; ?>
              </option>
            <?php } ?>
            </select>
                    
                </div>
            </div>
            </td>
      </tr>

<tr>
   <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nama Mapel
                </label>
                <div class="col-sm-5">

<select class="form-control" name="ID_Mapel" id="ID_Mapel" readonly="readonly" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbMapel as $row) { ?>
              <option value="<?php echo $row['ID_Mapel']; ?>"<?= ($row['ID_Mapel']==$getrow['ID_Mapel'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama_Mapel']; ?>
              </option>
            <?php } ?>
            </select>


                </div>

            </div>
        </td>
        <td>
            <div class="form-group">
<label class="col-sm-5 control-label" for="form-field-1">
                    KKM
                </label>
                <div class="col-sm-5">
                    <input type="text" readonly="" value="<?php echo $getrow['KKM'];?>" name="KKM" placeholder="Masukan ID Mapel" id="form-field-1" class="form-control">
                </div>                    
                </div>
            </div>
            </td>

                    </td>
        <td hidden="">
            <div class="form-group">
<label class="col-sm-5 control-label" for="form-field-1">
                    ID
                </label>
                <div class="col-sm-5">
                    <input type="text" readonly="" value="<?php echo $getrow['ID_P_H'];?>" name="KKM" placeholder="Masukan ID Mapel" id="form-field-1" class="form-control">
                </div>                    
                </div>
            </div>
            </td>
      </tr>


        <script src="<?php echo base_url('js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#NISN").chained("#ID_Rombel");
        </script>

        <script>
            $("#ID_KD2").chained("#ID_Mapel");
        </script>

<tr>
    <td><div class="form-group">
    <h4>Detail Data Nilai</h4>
</div>
</td>
</tr>

</table>                
        

<table class="table table-striped table-condensed table-bordered" id="tb_NTugas">
          <thead>
              <th align="center" class="text-center" width="20">NO</th><th align="center" width="15%" class="text-center">ID Kompetensi Dasar</th><th align="center" class="text-center">Nilai ke 1</th><th align="center" class="text-center">Nilai ke 2</th><th class="text-center" align="center">Nilai ke 3</th><th class="text-center" align="center">Nilai Ulangan Harian</th><th class="text-center" align="center">Nilai Rata-Rata</th><th class="text-center" align="center">Nilai UTS</th><th class="text-center" align="center">Nilai UAS</th><th class="text-center" align="center">Nilai Rekap</th>
        </thead>
          <tbody>
                    <?php $no=1; foreach ($getrow1 as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center">
                              <?php echo $row->Kode_KD; ?></td>
                         
                             <td class='text-center' align="center"><input type='text' class='form-control' name='N_1[]'  id='N_1<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_1; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_2[]'  id='N_2<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_2; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_3[]'  id='N_3<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_3; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_4[]'  id='N_4<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_4; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_N[]'  id='N_N<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_N; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_UT[]'  id='N_UT<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_UT; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_UAS[]'  id='N_UAS<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_UAS; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='N_R[]'  id='N_R<?php echo $no;?>' readonly="readonly" value='<?php echo $row->N_R; ?>' ></td>
                        </tr>

                    <?php endforeach ?>

                    <?php $no=1; foreach ($getRata as $row):?>
                        <tr>
                        <th colspan="8" class='text-center' align="center">Nilai Akhir</th>
                        <th class='text-center' colspan="2" align="center"><input type='TEXT' class='form-control' name='N[]'  id='N<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->N); ?>' ></th>     
                        </tr>
                        <?php endforeach ?>
                </tbody>
        </table>
        

<table align="center">

<td width="50%">
            <div class="form-group">
                <div class="col-sm-1">
                    <?php echo anchor('nilai_H', 'KEMBALI', array('class' => 'btn btn-danger btn-sm')); ?>
                </div>
            </div>
        </td>
</tr>
</table>
            </form>

        </div>
    </div>

    <!-- end: TEXT FIELDS PANEL -->
</div>


