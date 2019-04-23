<div class="col-sm-12">
    <!-- start: TEXT FIELDS PANEL -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i>
            Edit Data Guru
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
            echo form_open('guru/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('NIP', $guru['NIP']);
            ?>
        <div class="panel-body">

            <table align="center" width="100%">
    <tr>
        <td width="50%">
            <div class="form-group">
                            <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NIP
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==18) this.value = this.value.slice(0,-1);" name="NIP" value="<?php echo $guru['NIP']?>" placeholder="MASUKAN NIP" class="form-control">
                </div>
            </div>
            </td>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NAMA
                </label>
                <div class="col-sm-6">
                    <input type="text" name="Nama_Guru" required maxlength="250" value="<?php echo $guru['Nama_Guru']?>" placeholder="MASUKAN NAMA" class="form-control">
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
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==6) this.value = this.value.slice(0,-1);" name="NRK" value="<?php echo $guru['NRK']?>" placeholder="MASUKAN NRK" class="form-control">
                </div>            
            </div>
            </td>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    NUPTK
                </label>
                <div class="col-sm-5">
                    <input type="number" name="NUPTK" required min="0" required onKeyDown="if(this.value.length==16) this.value = this.value.slice(0,-1);" value="<?php echo $guru['NUPTK']?>" placeholder="MASUKAN NUPTK" class="form-control">
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
                    <input type="text" required maxlength="250" value="<?php echo $guru['Tempat_Lahir']?>" name="Tempat_Lahir" placeholder="MASUKAN TEMPAT LAHIR" class="form-control">
                </div>
            </div></td>
            
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tanggal Lahir
                </label>
                <div class="col-sm-5">
                    <input type="date" required name="Tanggal_Lahir" value="<?php echo $guru['Tanggal_Lahir']?>" placeholder="MASUKAN TANGGAL LAHIR" class="form-control">
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
                    <input type="text" required maxlength="250" value="<?php echo $guru['Pangkat']?>" name="Pangkat" placeholder="MASUKAN PANGKAT" class="form-control">
                </div>
            </div>
            </td>

<td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Golongan
                </label>
                <div class='col-md-5' class="col-sm-5">
                    <input type="text" required maxlength="10" name="Golongan" value="<?php echo $guru['Golongan']?>" placeholder="MASUKAN GOLONGAN" class="form-control">
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
                    <input type="date" required name="TMT" value="<?php echo $guru['TMT']?>" placeholder="MASUKAN TMT" class="form-control">
                </div>
            </div>
            </td>

            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Status
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" value="<?php echo $guru['Status']?>" name="Status" placeholder="MASUKAN STATUS" class="form-control">
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
                    <input type="date" name="TMT_Status" value="<?php echo $guru['TMT_Status']?>"  placeholder="MASUKAN TMT STATUS" class="form-control">
                </div>
            </div>
            </td>

            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Masa Kerja (Tahun)
                </label>

                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==2) this.value = this.value.slice(0,-1);" name="Masa_Kerja_TH" value="<?php echo $guru['Masa_Kerja_TH']?>" placeholder="MASUKAN MASA KERJA" class="form-control">
                </div>
            </div>
            </td>
            </tr>

            <tr>
               <td width="50%"> 
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Masa Kerja (Bulan)
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==2) this.value = this.value.slice(0,-1);" name="Masa_Kerja_BL" value="<?php echo $guru['Masa_Kerja_BL']?>" placeholder="MASUKAN KERJA" class="form-control">
                </div>
            </div>
</td>

<td width="50%">
            <div class="form-group">
               <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Nama Instansi
                </label>
                <div class="col-sm-5">
                    <input type="text" required maxlength="250" name="Nama_Instansi" value="<?php echo $guru['Nama_Instansi']?>" placeholder="MASUKAN INSTANSI" class="form-control">
                </div>
            </div>
            </td>
            </tr>

            <tr>
            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Tahun Lulus
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;<select required name="TH_Lulus">
<option selected="selected"><?php echo $guru['TH_Lulus']; ?></option>
<option>Tahun</option>>
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
                    <input type="text" required maxlength="5" value="<?php echo $guru['Tingkat']?>" name="Tingkat" placeholder="MASUKAN TINGKAT" class="form-control">
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
                    <input type="text" required maxlength="250" name="Jurusan" value="<?php echo $guru['Jurusan']?>" placeholder="MASUKAN JURUSAN" class="form-control">
                </div>
            </div>
            </td>

            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    No. Ijazah
                </label>
                <div class="col-sm-5">
                    <input type="text" name="No_Ijazah" value="<?php echo $guru['No_Ijazah']?>" placeholder="MASUKAN NO. IJAZAH" class="form-control">
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

                    <select class="form-control" name="ID_Tipe_Guru" required>
              <option value="">--Select--
              </option>
            <?php foreach($dataCombo as $row) { ?>
              <option value="<?php echo $row['ID_Tipe_Guru']; ?>"<?= ($row['ID_Tipe_Guru']==$getrow['ID_Tipe_Guru'])?'selected="selected"':""; ?> >
                <?php
                                if ($row['Nama_Tipe_Guru'] === 'GP'):?>
                        <label>Guru Mapel</label>
                        <?php
                    elseif ($row['Nama_Tipe_Guru'] === 'GK'):?>
                        <label>Guru Kelas</label>
                <?php endif;?>
              </option>
            <?php } ?>
            </select>
                </div>
            </div>
            </td>

            <td width="50%">
            <div class="form-group">
               <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Jumlah
                </label>
                <div class="col-sm-5">
                    <input type="number" required min="0" required onKeyDown="if(this.value.length==3) this.value = this.value.slice(0,-1);" name="Jumlah" value="<?php echo $guru['Jumlah']?>" placeholder="MASUKAN JUMLAH" class="form-control">
                </div>
            </div>
            </td>
            </tr>

<tr>
            <td width="50%">
                <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Rombel
                </label>

                <div class="col-sm-5">

                    <SELECT class="form-control" id="ID_Rombel" name="ID_Rombel" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCombo1 as $row) { ?>
                     <option value="<?php echo $row['ID_Rombel']; ?>"<?= ($row['ID_Rombel']==$getrow['ID_Rombel'])?'selected="selected"':""; ?>><?php echo $row['Nama_Rombel']; ?><?php } ?>
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
                    <input type="text" name="Tugas_Tambahan" value="<?php echo $guru['Tugas_Tambahan']?>" maxlength="250" placeholder="MASUKAN TUGAS TAMBAHAN" class="form-control">
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
                     <option value="<?php echo $row['ID_Mapel']; ?>"<?= ($row['ID_Mapel']==$getrow['ID_Mapel'])?'selected="selected"':""; ?>><?php echo $row['Nama_Mapel']; ?><?php } ?>
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
                    <input type="text" maxlength="250" name="Riwayat_Mutasi" value="<?php echo $guru['Riwayat_Mutasi']?>" placeholder="MASUKAN RIWAYAT MUTASI" class="form-control">
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
                    <input type="date" required name="TMT_Tugas" value="<?php echo $guru['TMT_Tugas']?>" placeholder="MASUKAN TMT TUGAS" class="form-control">
                </div>
            </div></td>

            <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    Alamat Rumah
                </label>
                <div class="col-sm-7">
                    <textarea type="text" required maxlength="500" name="Alamat_Rumah" value="<?php echo $guru['Alamat_Rumah']?>" placeholder="MASUKAN ALAMAT RUMAH" class="form-control"><?php echo $guru['Alamat_Rumah']?></textarea>
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
                    <input type="text" name="Ket_Guru" value="<?php echo $guru['Ket_Guru']?>" maxlength="100" placeholder="MASUKAN KETERANGAN" class="form-control">
                </div>
            </div>
</td>

            <td width="50%">            
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    No. HP
                </label>
                <div class="col-sm-5">
                    <input type="text" name="No_HP" value="<?php echo $guru['No_HP']?>" required onKeyDown="if(this.value.length==12) this.value = this.value.slice(0,-1);" placeholder="MASUKAN NO. HP" class="form-control">
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
                    <input type="text" name="username" value="<?php echo $guru['username']?>" required placeholder="MASUKAN USERNAME" class="form-control">
                </div>
            </div>
        </td>

        <td width="50%">
            <div class="form-group">
                <label class='col-md-5' class="col-sm-5 control-label" for="form-field-1">
                    PASSWORD
                </label>
                <div class="col-sm-5">
                    <input type="password" name="password" value="<?php echo $guru['password']?>" required placeholder="MASUKAN PASSWORD" class="form-control">
                </div>
            </div>  
            </td>       
    </tr>	
				<tr align="center">    
<td></td>
<td></td>
        <td width="50%">
            <div class="col-sm-2 control-label" for="form-field-1">
                    <button type="submit" name="submit" class="btn btn-danger  btn-sm">SIMPAN</button>
                </div>
            </td>
                <td width="50%">
                    <div class="col-sm-2 control-label" for="form-field-1">
                    <?php echo anchor('guru', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div></td>
            </tr>
</div>
            </table>
            
            </form>
        </div>
    </div>
    <!-- end: TEXT FIELDS PANEL -->

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
</div>

