<div class="col-sm-12">


    <div class="page-header">
    <h1>Input Data Deskripsi</h1>                         
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
            echo form_open('n_desk/add', 'role="form" class="form-horizontal"');
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
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), null, "class='form-control'");
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
                    <SELECT class="form-control" required name="id_tahun_akademik" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCmbThn as $row) { ?>
                     <option value="<?php echo $row['id_tahun_akademik']; ?>"><?php echo $row['tahun_akademik']; ?><?php } ?>
                      </option>
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
                <div class="col-sm-2">
                                       <SELECT class="form-control" required name="ID_Rombel" id="ID_Rombel" style="width:200px;">
 
                            <option value="">Please Select</option>
                            <?php
                            foreach ($data as $rom) {
                                ?>
                                <option <?php echo $rombel_selected == $rom->ID_Rombel ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $rom->ID_Rombel ?>"><?php echo $rom->Nama_Rombel ?></option>
                                <?php
                            }
                            ?>
                </SELECT>
                
                    </div>
            </div>
        </td>

        <td>
                    <div class="form-group">

                <label class="col-sm-5 control-label" form="form-field-1">
                    Nama Siswa
                </label>


                <div class="col-sm-5">
<select class="NISN form-control" name="NISN" id="NISN" >
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
                     <option value="<?php echo $row['ID_Mapel']; ?>"><?php echo $row['Nama_Mapel']; ?><?php } ?>
                      </option>
                </SELECT>
                </div>
            </div>
            </td>
</tr>
<tr>
                    <td>
            <div class="form-group" hidden="">
                <label class="col-sm-5 control-label" for="form-field-1">
                    ID Legger
                </label>
                <div class="col-sm-2">
                   <input type="Number" required name="ID_Desk" readonly="readonly" value="<?php echo $ID_Desk; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
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
                    <textarea type="text" value="" name="Desk_P" placeholder="Desk_P" id="Desk_P" class="form-control"></textarea>
                </div>
            </div>
          </td>
          <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Deskripsi Keterampilan
                </label>
                <div class="col-sm-5">
                    <textarea type="text" value="" name="Desk_K" placeholder="Desk_K" id="Desk_K" class="form-control"></textarea>
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
                    <input type="TEXT" value="" name="N_Sikap1" placeholder="N_Sikap1" id="N_Sikap1" onkeyup="average();" class="form-control">
                </div>

            </div>
        </td>
        <td>
                        <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai Sikap KI 2
                </label>
                <div class="col-sm-3">
                    <input type="TEXT" value="" name="N_Sikap2" placeholder="N_Sikap2" id="N_Sikap2" onkeyup="average();" class="form-control">
                </div>
            </div>
        </td>
    </tr>

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


