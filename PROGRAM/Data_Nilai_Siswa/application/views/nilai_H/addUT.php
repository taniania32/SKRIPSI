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
            echo form_open('nilai_H/addUT', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_P_H', $nilai_H['ID_P_H']);
            ?>

                    <table width="100%" align="center">


<tr>
    <td><div class="form-group">
    <h4>Input Detail Data Nilai</h4>
</div>
</td>
</tr>
<tr>

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

                <label class="col-sm-5 control-label" form="form-field-1">
                    Kategori Nilai
                </label>
                <div class="col-sm-5">
<select class="ID_KD form-control" name="ID_N" id="ID_N" >
<option value="" >Please Select</option>
    
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option value="1">Nilai UTS</option>
                                <option value="2">Nilai UAS</option>
            </select>
                </div>
            </div>
</td>
</tr>

<script>
 $(document).ready(function() {
    // Kondisi saat Form di-load
    if ($("#ID_N").val() == "") {
        $('#N_UT').hide();
        $('#N_R').hide();
        $('#N_UAS').hide();
        $('#N_RUAS').hide();
        $('#UTS').hide();
        $('#UTSR').hide();
        $('#UAS').hide();
        $('#UASR').hide();
    } else {
        $('#N_UAS').hide();
        $('#N_RUAS').hide();
    }
    // Kondisi saat ComboBox (Select Option) dipilih nilainya
    $("#ID_N").change(function() {
        if ($(this).val() == "1") {
            $('#N_UT').show();
            $('#N_R').show();
                      $('#UTS').show();
            $('#UTSR').show();
            $('#N_UAS').hide();
            $('#N_RUAS').hide();
                        $('#UAS').hide();
            $('#N_UT').focus();
      

    

           } else if ($(this).val() == "2") {
            $('#N_UAS').show();
            $('#N_RUAS').show();
                     $('#UAS').show();
            $('#N_R').show();
            $('#N_UT').hide();
                     $('#UTS').hide();
            $('#UTSR').show();
            $('#N_UAS').focus();
        } else {
            $('#N_UAS').val('');
            $('#N_R').val('');
            $('#N_UAS').hide();
        }
    });
});
</script>


<tr>
<td>
      <td>
            <div class="form-group">
<label class="col-sm-5 control-label" for="form-field-1">
                    N_N
                </label>
                <div class="col-sm-5">
                    <input type="text" readonly="" value="<?php echo $nilai_H['N_N'];?>" name="N_N" id="N_N" placeholder="Masukan ID Mapel" id="form-field-1" class="form-control">
                </div>                    
                </div>
            </div>
            </td>
</td>
              </td>
                                    <td>
                                    <div class="form-group">
                <label id="UTS" class="col-sm-5 control-label" for="form-field-1">
                    Nilai UTS
                </label>
                <form name=f1 method=post>
                <div class="col-sm-3">
                                       <input onkeyup="average();" autocomplete="off" type="Number" value="" name="N_UT" placeholder="0" id="N_UT" class="form-control">   
            </div>
            </form>
            </div>
            </td>
</tr>

<tr>
              </td>
                                    <td>
                                    <div class="form-group">
                <label id="UAS" class="col-sm-5 control-label" for="form-field-1">
                    Nilai UAS
                </label>
                <div class="col-sm-3">
                                       <input onkeyup="average();" autocomplete="off" type="Number" value="" name="N_UAS" placeholder="0" id="N_UAS" class="form-control">   
            </div>
            </div>
            </td>
            </td>
                  
</tr>

<tr>
                                      <td>
                                    <div class="form-group">
                <label id="UTSR" class="col-sm-5 control-label" for="form-field-1">
                    Nilai Rekap
                </label>
                
                <div class="col-sm-3">
                  
                                       <input onkeyup="average();" readonly="" autocomplete="off" type="Number" value="" name="N_R" placeholder="0" id="N_R" class="form-control"> 
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

      var result = document.getElementById('N_N').value;
      var txtNilai5 = document.getElementById('N_UT').value;
      var txtNilai6 = document.getElementById('N_UAS').value;
      var txtNilai7 = document.getElementById('ID_N').value;
      var txtKKM = document.getElementById('KKM').value;
      

if(txtNilai7=1){
      
      var result2 =((parseFloat(result)+parseFloat(result)+parseFloat(txtNilai5))/3);
            if (!isNaN(result2)) {
         document.getElementById('N_R').value = result2;
      }
      var result1 = (result2 < parseFloat(txtKKM));
      if (result1) {
        alert("Nilai rata-rata kurang dari KKM : " + txtKKM);
      }
}
if(txtNilai7=2){
            var result3 =((parseFloat(result)+parseFloat(result)+parseFloat(txtNilai6))/3);
            if (!isNaN(result3)) {
         document.getElementById('N_R').value = result3;
      }
      var result4 = (result3 < parseFloat(txtKKM));
      if (result4) {
        alert("Nilai rata-rata kurang dari KKM : " + txtKKM);
      }
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
   var N_UT  = "";
   var N_R  = "";
      var N_UAS  = "";

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
          col7 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_UT[]'  id='N_UT"+rowCount+"' value='" + $("#N_UT").val() + "' readonly='readonly'></td>";
           col8 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_UAS[]'  id='N_UAS"+rowCount+"' value='" + $("#N_UAS").val() + "' readonly='readonly'></td>";
          col9 = "<td>" + "<input type='text' class='form-control' style='width:50px' name='N_R[]'  id='N_R"+rowCount+"' value='" + $("#N_R").val() + "' readonly='readonly'></td>";
          col11 = "<td><input type='button' value='delete' class='rowdel' /><input type='button' value='edit' id='rowed"+rowCount+"' /><i class='icon-x'></i></td>";
          col12 = "";
          trc = "</tr>";

          th = tro + col0 + col1 + col2 + col3 + col4  + col5 + col6 + col7 + col8 + col9 + col11 + col12+ trc;

                 //alert (row) ;
          $("#tb_NH tbody").append(th);
          $("#ID_KD").val("");
   var N_1  = "";
   var N_2  = "";
   var N_3  = "";
   var N_4  = "";
   var N_N  = "";
   var N_UT  = "";
   var N_R  = "";
      var N_UAS  = "";

            $("#N_1").val("");
            $("#N_2").val("");
            $("#N_3").val("");
            $("#N_4").val("");
            $("#N_N").val("");
            $("#N_UT").val("");
            $("#N_R").val("");
                        $("#N_UAS").val("");
    
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
            $("#N_UT").val($("#N_UT"+rowCount).val());
            $("#N_R").val($("#N_R"+rowCount).val());
                        $("#N_UAS").val($("#N_UAS"+rowCount).val());
            
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
              <th align="center" class="text-center" width="20">NO</th><th align="center" width="15%" class="text-center">ID Kompetensi Dasar</th><th align="center" class="text-center">Nilai ke 1</th><th align="center" class="text-center">Nilai ke 2</th><th class="text-center" align="center">Nilai ke 3</th><th class="text-center" align="center">Nilai Ulangan Harian</th><th class="text-center" align="center">Nilai Rata-Rata</th><th class="text-center" align="center">Nilai UTS</th><th class="text-center" align="center">Nilai UAS</th><th class="text-center" align="center">Nilai Rekap</th><th class="text-center" align="center">Action</th>
          </thead>
          <tbody> 
                </tbody>
        </table>
        

<table align="center">
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


