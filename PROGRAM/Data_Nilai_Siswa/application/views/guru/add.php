<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->

 <?php
                            $data=$this->session->flashdata('error');
                            if($data!=""){ ?>
                            <div class="alert alert-danger"><strong>Error! </strong> <?=$data;?></div>
                            <?php } ?>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Input Data Guru
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
            echo form_open('guru/add', 'role="form" class="form-horizontal"');
            ?>

                                       
<table align="center" width="100%">
    <tr>
        <td width="50%">
            <div class="form-group">
                            <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NIP
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==18) this.value = this.value.slice(0,-1);" name="NIP" placeholder="MASUKAN NIP" class="form-control">
                </div>
            </div>
            </td>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NAMA
                </label>
                <div class="col-sm-6">
                    <input type="text" name="Nama_Guru" required maxlength="250" placeholder="MASUKAN NAMA" class="form-control">
                </div>
            </div></td>
        </tr>

        <tr>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NRK
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==6) this.value = this.value.slice(0,-1);" name="NRK" placeholder="MASUKAN NRK" class="form-control">
                </div>            
            </div>
            </td>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NUPTK
                </label>
                <div class="col-sm-5">
                    <input type="number" name="NUPTK" required min="0" required onKeyDown="if(this.value.length==16) this.value = this.value.slice(0,-1);" placeholder="MASUKAN NUPTK" class="form-control">
                </div>
            </div>
            </td>
        </tr>
			<tr>
                <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tempat Lahir
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Tempat_Lahir" placeholder="MASUKAN TEMPAT LAHIR" class="form-control">
                </div>
            </div></td>
			
            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tanggal Lahir
                </label>
                <div class="col-sm-5">
                    <input type="date" required name="Tanggal_Lahir" placeholder="MASUKAN TANGGAL LAHIR" class="form-control">
                </div>
            </div>
        </td>
    </tr>
			
			<tr>
                <td width="50%">
                <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Pangkat
                </label>
                
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Pangkat" placeholder="MASUKAN PANGKAT" class="form-control">
                </div>
            </div>
            </td>

<td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Golongan
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="10" name="Golongan" placeholder="MASUKAN GOLONGAN" class="form-control">
                </div>
            </div></td>
			</tr>

			<tr>
                <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    TMT
                </label>
                <div class="col-sm-5">
                    <input type="date" required name="TMT" placeholder="MASUKAN TMT" class="form-control">
                </div>
            </div>
			</td>

            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Status
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Status" placeholder="MASUKAN STATUS" class="form-control">
                </div>
            </div>
            </td>
			</tr>

            <tr>
                <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    TMT Status
                </label>
                <div class="col-sm-5">
                    <input type="date" required name="TMT_Status" placeholder="MASUKAN TMT STATUS" class="form-control">
                </div>
            </div>
			</td>

            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Masa Kerja (Tahun)
                </label>

                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==2) this.value = this.value.slice(0,-1);" name="Masa_Kerja_TH" placeholder="MASUKAN MASA KERJA" class="form-control">
                </div>
            </div>
            </td>
			</tr>

            <tr>
               <td width="50%"> 
			<div  class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Masa Kerja (Bulan)
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==2) this.value = this.value.slice(0,-1);" name="Masa_Kerja_BL" placeholder="MASUKAN KERJA" class="form-control">
                </div>
            </div>
</td>

<td width="50%">
			<div class="form-group">
               <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Nama Instansi
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Nama_Instansi" placeholder="MASUKAN INSTANSI" class="form-control">
                </div>
            </div>
            </td>
			</tr>

            <tr>
			<td width="50%">
            <div  class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tahun Lulus
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;<select required name="TH_Lulus">
<option selected="selected">Tahun</option>
<?php
for($TH_Lulus=date('Y'); $TH_Lulus>=date('Y')-32; $TH_Lulus-=1){
echo"<option value='$TH_Lulus'> $TH_Lulus </option>";
}
?>
            </select>
            </div>
</td>
<td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tingkat
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="5" name="Tingkat" placeholder="MASUKAN TINGKAT" class="form-control">
                </div>
            </div>
        </td>
        </tr>

			<tr>
                <td width="50%">
                <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Jurusan
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Jurusan" placeholder="MASUKAN JURUSAN" class="form-control">
                </div>
            </div>
			</td>

            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    No. Ijazah
                </label>
                <div class="col-sm-5">
                    <input type="text" name="No_Ijazah" placeholder="MASUKAN NO. IJAZAH" class="form-control">
                </div>
            </div>	
            </td>		
			</tr>

			<tr>
            <td width="50%">
                <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tipe Guru
                </label>

                <div class="col-sm-5">

                    <SELECT class="form-control" required id="ID_Tipe_Guru" name="ID_Tipe_Guru" style="width:200px;">
                    
                                             <option value="0">--Select--</option>
                     <?php foreach($dataCombo as $row) { ?>
                     <option value="<?php echo $row['ID_Tipe_Guru']; ?>"><?php
                                if ($row['Nama_Tipe_Guru'] === 'GP'):?>
                        <label>Guru Mapel</label>
                        <?php
                    elseif ($row['Nama_Tipe_Guru'] === 'GK'):?>
                        <label>Guru Kelas</label>
                <?php endif;?><?php } ?>
                      </option>
                </SELECT>
                </div>
            </div>
			</td>

            <td width="50%">
			<div class="form-group">
               <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Jumlah
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" name="Jumlah" placeholder="MASUKAN JUMLAH" class="form-control">
                </div>
            </div>
            </td>
            </tr>

<tr>
            <td width="50%">
                <div class="form-group">
                <label class='col-md-5' class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Rombel
                </label>

                <div class="col-sm-5">
                    <SELECT class="form-control" id="ID_Rombel" name="ID_Rombel" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCombo1 as $row) { ?>
                     <option value="<?php echo $row['ID_Rombel']; ?>"><?php echo $row['Nama_Rombel']; ?><?php } ?>
                      </option>
                </SELECT>
                </div>
            </div>
            </td>

            <td width="50%">
<div class="form-group">
            <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tugas Tambahan
                </label>
                <div class="col-sm-5">
                    <input type="text" name="Tugas_Tambahan" maxlength="250" placeholder="MASUKAN TUGAS TAMBAHAN" class="form-control">
                </div>
            </div>
                
            </td>
            </tr>


            <tr>
                <td width="50%">

            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Nama Mapel
                </label>
			<div class="col-sm-5">
                    <SELECT class="form-control" id="ID_Mapel" name="ID_Mapel" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCombo2 as $row) { ?>
                     <option value="<?php echo $row['ID_Mapel']; ?>"><?php echo $row['Nama_Mapel']; ?><?php } ?>
                      </option>
                </SELECT>
                </div>
            </div>

			</td>

            <td width="50%">
			<div class="form-group">
               <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Riwayat Mutasi
                </label>
                <div class="col-sm-5">
                    <input type="text" maxlength="250" name="Riwayat_Mutasi" placeholder="MASUKAN RIWAYAT MUTASI" class="form-control">
                </div>
            </div>
            </td>
        </tr>
			
            <tr>
                <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    TMT Tugas
                </label>
                <div class="col-sm-5">
                    <input type="date" required name="TMT_Tugas" placeholder="MASUKAN TMT TUGAS" class="form-control">
                </div>
            </div></td>

            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Alamat Rumah
                </label>
                <div class="col-sm-7">
                    <textarea type="text" required maxlength="500" name="Alamat_Rumah" placeholder="MASUKAN ALAMAT RUMAH" class="form-control"></textarea>
                </div>
            </div>
            </td>
        </tr>

        <tr>
            <td width="50%">
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Keterangan
                </label>
                <div class="col-sm-5">
                    <input type="text" name="Ket_Guru" maxlength="100" placeholder="MASUKAN KETERANGAN" class="form-control">
                </div>
            </div>
</td>

            <td width="50%">            
			<div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    No. HP
                </label>
                <div class="col-sm-5">
                    <input type="text" name="No_HP" required onKeyDown="if(this.value.length==12) this.value = this.value.slice(0,-1);" placeholder="MASUKAN NO. HP" class="form-control">
                </div>
            </div>
            </td>
        <tr>

            <tr>
                <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    USERNAME
                </label>
                <div class="col-sm-5">
                    <input type="text" required name="username" placeholder="MASUKAN USERNAME" class="form-control">
                </div>
            </div>
        </td>

        <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    PASSWORD
                </label>
                <div class="col-sm-5">
                    <input type="password" name="password" required placeholder="MASUKAN PASSWORD" class="form-control">
                </div>
            </div>	
            </td>		
    </tr>

    <tr align="center">    
<td></td>
<td></td>

        <td width="50%">
            <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
            </td>
                <td width="50%">
                    <div class="col-sm-1">
                    <?php echo anchor('guru', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div></td>
</div>
            </table>
            </form>
        </div>
    </div>

    <!-- end: TEXT FIELDS PANEL -->
</div>


<script>
          
$(document).ready(function() {

$("#ID_Tipe_Guru").change(function(){
    if($('#ID_Tipe_Guru').val() === '1'){
        document.getElementById("ID_Mapel").disabled = true;
        document.getElementById("ID_Rombel").disabled = false;
    }
    else if($('#ID_Tipe_Guru').val() === '2'){
document.getElementById("ID_Rombel").disabled = true;
document.getElementById("ID_Mapel").disabled = false;
    }
else{
    document.getElementById("ID_Rombel").disabled = true;
    document.getElementById("ID_Mapel").disabled = true;
}
});

});
</script>