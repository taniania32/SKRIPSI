<div class="col-sm-12">


    <div class="page-header">
    <h1>Input Data Nilai Keterampilan</h1>                         
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
            echo form_open('nilai_HK/add', 'role="form" class="form-horizontal"');
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
                    Nama Mapel
                </label>
                <div class="col-sm-5">
                    
                        <SELECT  class="form-control" required onchange="myFunction()" id="ID_Mapel" name="ID_Mapel" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCmbMapel as $row) { ?>
                     <option <?php echo $mapel_selected == $row->ID_Mapel ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $row->ID_Mapel ?>"><?php echo $row->Nama_Mapel ?></option>
                                <?php
                            }
                            ?>
                </SELECT>

                </div>
            </div>
            </td>
</tr>
<tr>

            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    KKM
                </label>
                <div class="col-sm-2">
                   <input readonly="" type="text" required onKeyDown="if(this.value.length==2) this.value = this.value.slice(0,-1);" name="KKM" placeholder="0" id="KKM" class="form-control">
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
                    <td hidden="">
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    ID Nilai H
                </label>
                <div class="col-sm-2">
                   <input type="Number" required name="ID_Nilai_H_K" readonly="readonly" value="<?php echo $ID_Nilai_H_K; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
                </div>
            </div>
        </td>

    <td>
                    <div class="form-group">

                <label class="col-sm-5 control-label" form="form-field-1">
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
</td>

<tr>
    <td><div class="form-group">
    <h4>Input Detail Data Nilai</h4>
</div>
</td>
</tr>
<tr>

    <td>
                    <div class="form-group">

                <label class="col-sm-5 control-label" form="form-field-1">
                    ID Kompetensi Dasar
                </label>
                <div class="col-sm-5">
<select class="ID_KD form-control" name="ID_KD" id="ID_KD" >
<option value="">Please Select</option>
                            <?php
                            foreach ($KD as $kd) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $kd_selected == $kd->ID_KD ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $kd->ID_Mapel ?>" value="<?php echo $kd->ID_KD ?>"><?php echo $kd->Kode_KD ?></option>
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
                    Nilai ke 1
                </label>
                <div class="col-sm-3">
                    <input type="Number" value="" onKeyDown="if(this.value.length==3) this.value = this.value.slice(0, - 1);" name="N_1" placeholder="0" id="N_1" onkeyup="average();" class="form-control">
                </div>
            </div>
          </td>
            <td>
                                    <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai ke 2
                </label>
                <div class="col-sm-3">
                                       <input autocomplete="off" type="Number" value="" name="N_2" placeholder="0" id="N_2" onkeyup="average();" class="form-control">   
            </div>
            </div>
            </td>
      </tr>
      <tr>
                        <td>
                                    <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai ke 3
                </label>
                <div class="col-sm-3">
                                       <input autocomplete="off" type="Number" value="" name="N_3" onkeyup="average();" placeholder="0" id="N_3" class="form-control">   
            </div>
            </div>
            </td>
                                    <td>
                                    <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai ke 4
                </label>
                <div class="col-sm-3">
                                       <input onkeyup="average();" autocomplete="off" type="Number" value="" name="N_4" placeholder="0" id="N_4" class="form-control">   
            </div>
            </div>
            </td>
    </tr>

<tr>
              </td>
                                    <td>
                                    <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nilai Rata-Rata
                </label>
                <div class="col-sm-3">
                                       <input onkeyup="average();" readonly="" autocomplete="off" type="Number" value="" name="N_N" placeholder="0" id="N_N" class="form-control">   
            </div>
            </div>
            </td>
</tr>

</table>

        <script src="<?php echo base_url('js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#NISN").chained("#ID_Rombel");
        </script>

                <script>
            $("#ID_KD").chained("#ID_Mapel");
        </script>
    
<script>
    function myFunction() {
    var x = document.getElementById("ID_Mapel").value;
    if(x=="") {
      $('#KKM').val("");
    }else{
    $.ajax({
      url:'<?php echo base_url(); ?>index.php/Nilai_H/KKM/'+x, 
      type: 'GET',
      success:function(data){
        $('#KKM').val(data);
      },error:function(data){
        $('#KKM').val("");
      }
    });
}
}
</script>

<script>
function average() {
      var txtNilai1 = document.getElementById('N_1').value;
      var txtNilai2 = document.getElementById('N_2').value;
      var txtNilai3 = document.getElementById('N_3').value;
      var txtNilai4 = document.getElementById('N_4').value;
      var txtKKM = document.getElementById('KKM').value;
      var result = (parseFloat(txtNilai1) + parseFloat(txtNilai2)+parseFloat(txtNilai3)+parseFloat(txtNilai4))/4;
      if (!isNaN(result)) {
         document.getElementById('N_N').value = result;
      }
      var result1 = (result < parseFloat(txtKKM));
      if (result1) {
        alert("Nilai rata-rata kurang dari KKM : " + txtKKM);
      }
}
</script>

<script>
$(document).ready(function() {
   var ID_KD  = "";
   var N_1  = "";
   var N_2  = "";
   var N_3  = "";
   var N_4  = "";
   var N_N  = "";

   $("#btnTambah").click(function(){
        var rowCount = $("#tb_NH tr").length;
        var row = rowCount - 1;
        
        if(rowCount>10){// menandai maksimal
          alert("Maksimal data hanya 10");
        }else{
        
          tro = "<tr>";
          col0 = "<td> <label id='row" + rowCount + "' />" + rowCount + "</td>";
          col1 = "<td>" + "<input type='hidden' class='form-control' style='width:50px' name='ID_KD[]' id='ID_KD"+rowCount+"' value='" + $("#ID_KD").val() + "' readonly='readonly'>"+$("#ID_KD option:selected").text()+"</td>";
          col2 = "<td width='100px'>" + "<input type='text' class='form-control' style='width:50px' name='N_1[]' id='N_1"+rowCount+"' value='" + $("#N_1").val() + "' readonly='readonly'></td>";
          col3 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_2[]'  id='N_2"+rowCount+"' value='" + $("#N_2").val() + "' readonly='readonly'></td>";
          col4 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_3[]'  id='N_3"+rowCount+"' value='" + $("#N_3").val() + "' readonly='readonly'></td>";
          col5 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_4[]'  id='N_4"+rowCount+"' value='" + $("#N_4").val() + "' readonly='readonly'></td>";
          col6 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_N[]'  id='N_N"+rowCount+"' value='" + $("#N_N").val() + "' readonly='readonly'></td>";
          col7 = "<td><input type='button' value='delete' class='rowdel' /><input type='button' value='edit' id='rowed"+rowCount+"' /><i class='icon-x'></i></td>";
          col8 = "";
          trc = "</tr>";

          th = tro + col0 + col1 + col2 + col3 + col4  + col5 + col6 + col7 + col8 + trc;

                 //alert (row) ;
          $("#tb_NH tbody").append(th);
          $("#ID_KD").val("");
   var N_1  = "";
   var N_2  = "";
   var N_3  = "";
   var N_4  = "";
   var N_N  = "";
            $("#N_1").val("");
            $("#N_2").val("");
            $("#N_3").val("");
            $("#N_4").val("");
            $("#N_N").val("");
        } //else maksimal
        
        /*  var num = 1;
          $('input[name="jenis_pesanan[]"]').each(function(){
              if(num>1){
                //if(num==row)
                alert($(this).val());
              }
              num++;
          });
*/
          $(".rowdel").click(function(){
            var tr = $(this).parent().parent();
            tr.remove();
          });

          $("#rowed"+rowCount).click(function(){
            $("#ID_KD").val($("#ID_KD"+rowCount).val());
            $("#N_1").val($("#N_1"+rowCount).val());
            $("#N_2").val($("#N_2"+rowCount).val());
            $("#N_3").val($("#N_3"+rowCount).val());
            $("#N_4").val($("#N_4"+rowCount).val());
            $("#N_N").val($("#N_N"+rowCount).val());
            var tr = $(this).parent().parent();
            tr.remove();
          });
   }); 
}); 
   
</script>

<table>
<tr><td><input type="button" value="Add Detail Nilai" id="btnTambah"><br></td><br></tr></table>
                
        <table class="table table-striped table-condensed table-bordered" id="tb_NH">
          <thead>
              <th align="center" class="text-center" width="20">NO</th><th align="center" width="15%" class="text-center">ID Kompetensi Dasar</th><th align="center" class="text-center">Nilai ke 1</th><th align="center" class="text-center">Nilai ke 2</th><th class="text-center" align="center">Nilai ke 3</th><th class="text-center" align="center">Nilai ke 4</th><th class="text-center" align="center">Nilai Rata-Rata</th><th class="text-center" align="center">Action</th>
          </thead>
          <tbody> 
                </tbody>
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
                    <?php echo anchor('nilai_HK', 'KEMBALI', array('class' => 'btn btn-info btn-sm')); ?>
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


