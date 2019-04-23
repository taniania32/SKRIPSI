<div class="col-sm-12">


    <div class="page-header">
    <h1>Edit Data Deskripsi</h1>                         
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
            echo form_open_multipart('n_desk/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_Desk', $n_desk['ID_Desk']);
            ?>

          <table width="100%" align="center">
            <tr>
                    <td>
            <div class="form-group" hidden="">
                <label class="col-sm-5 control-label" for="form-field-1">
                    ID Legger
                </label>
                <div class="col-sm-2">
                   <input type="Number" required name="ID_Desk" readonly="readonly" value="<?php echo $n_desk['ID_Desk']; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
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
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), $n_desk['Semester'], "class='form-control' ");
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
              <option value="<?php echo $row['id_tahun_akademik']; ?>"<?= ($row['id_tahun_akademik']==$n_desk['id_tahun_akademik'])?'selected="selected"':""; ?> >
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
              <option value="<?php echo $row['ID_Rombel']; ?>"<?= ($row['ID_Rombel']==$n_desk['ID_Rombel'])?'selected="selected"':""; ?> >
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
              <option value="<?php echo $row['NISN']; ?>"<?= ($row['NISN']==$n_desk['NISN'])?'selected="selected"':""; ?> >
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
                    
                        <SELECT class="form-control" id="ID_Mapel" name="ID_Mapel" onchange="myFunction()" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCmbMapel as $row) { ?>
                     <option value="<?php echo $row['ID_Mapel']; ?>"<?= ($row['ID_Mapel']==$n_desk['ID_Mapel'])?'selected="selected"':""; ?> >
                <?php echo $row['Nama_Mapel']; ?>
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
                    Deskripsi Pengetahuan
                </label>
                <div class="col-sm-5">
                    <input type="text" type="text" value="<?php echo $n_desk['Desk_P'] ?>" name="Desk_P" placeholder="Desk_P" id="Desk_P" class="form-control">
                </div>
            </div>
          </td>
          <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Deskripsi Keterampilan
                </label>
                <div class="col-sm-5">
                    <input type="text" value="<?php echo $n_desk['Desk_K'] ?>" name="Desk_K" placeholder="Desk_K" id="Desk_K" class="form-control">
                </div>
            </div>
          </td>    
  </tr>
<tr>
                <td>

            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai Sikap KI 1
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="<?php echo $n_desk['N_Sikap1'] ?>" name="N_Sikap1" placeholder="N_Sikap1" id="N_Sikap1" onkeyup="average();" class="form-control">
                </div>

            </div>
        </td>
        <td>
                        <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai Sikap KI 2
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="<?php echo $n_desk['N_Sikap2'] ?>" name="N_Sikap2" placeholder="N_Sikap2" id="N_Sikap2" onkeyup="average();" class="form-control">
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
                    <?php echo anchor('n_desk', 'KEMBALI', array('class' => 'btn btn-info btn-sm')); ?>
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


