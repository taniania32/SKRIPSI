<div class="col-sm-12">


    <div class="page-header">
    <h1>Edit Data Absen</h1>                         
    </div>

    <!-- start: TEXT FIELDS PANEL -->

<?php
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>

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
            echo form_open_multipart('n_absen/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_Absen', $n_absen['ID_Absen']);
            ?>

          <table width="100%" align="center">
            <tr>
                    <td>
            <div class="form-group" hidden="">
                <label class="col-sm-5 control-label" for="form-field-1">
                    ID Legger
                </label>
                <div class="col-sm-2">
                   <input type="Number" required name="ID_Absen" readonly="readonly" value="<?php echo $n_absen['ID_Absen']; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
                </div>
            </div>
        </td>
</tr>
          <tr>
              <td width="50%">
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-5">
                <?php
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), $n_absen['Semester'], "class='form-control' ");
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
                    <select class="form-control"  name="id_tahun_akademik" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbThn as $row) { ?>
              <option value="<?php echo $row['id_tahun_akademik']; ?>"<?= ($row['id_tahun_akademik']==$n_absen['id_tahun_akademik'])?'selected="selected"':""; ?> >
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

<select class="form-control" name="ID_Rombel" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbRmbl as $row) { ?>
              <option value="<?php echo $row['ID_Rombel']; ?>"<?= ($row['ID_Rombel']==$n_absen['ID_Rombel'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama_Rombel']; ?>
              </option>
            <?php } ?>
            </select>
                
                    </div>
            </div>
        </td>

        <td>
                    <div class="form-group">

                <label class="col-sm-5 control-label" form="form-field-1">
                    Nama Siswa
                </label>


                <div class="col-sm-5">
<select class="form-control" name="NISN" required>
    <option value="">--Select--
              </option>
<?php foreach($dataCmbSis as $row) { ?>
              <option value="<?php echo $row['NISN']; ?>"<?= ($row['NISN']==$n_absen['NISN'])?'selected="selected"':""; ?> >
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
                    Sakit
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="<?php echo $n_absen['S'] ?>" name="S" placeholder="0" id="S" onkeyup="average();" class="form-control">
                </div>

            </div>
        </td>
        <td>
                        <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Ijin
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="<?php echo $n_absen['I'] ?>" name="I" placeholder="0" id="I" onkeyup="average();" class="form-control">
                </div>
            </div>
        </td>
    </tr>

<tr>
    <td>
                        <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Alfa
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="<?php echo $n_absen['A'] ?>" name="A" placeholder="0" id="A" onkeyup="average();" class="form-control">
                </div>
            </div>
        </td>
</tr>


        <script src="<?php echo base_url('js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#NISN").chained("#ID_Rombel");
        </script>


<script type="text/javascript"> 
        $("#ID_Rombel").change(function(){
                var ID_Rombel = {ID_Rombel:$("#ID_Rombel").val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url(); ?>index.php/nilai_tugas/add",
               data: ID_Rombel,
               success: function(msg){
               $('#add').html(msg);
               }
            });
              });
       </script>

</table>

        
<table align="center">
    <tr>
        <td width="50%">
            <div class="form-group">
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                </div>



            </div>
            </td>
<td width="50%">
            <div class="form-group">
                <div class="col-sm-1">
                    <?php echo anchor('n_absen', 'KEMBALI', array('class' => 'btn btn-info btn-sm')); ?>
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


