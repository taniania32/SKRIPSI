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
            echo form_open('n_raport/listnilai', 'role="form" class="form-horizontal"');
            echo form_hidden('NISN', $n_raport['NISN']);
            ?>

          <table width="100%" align="center">
          <tr>

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




</tr>
<tr>
<td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    No Induk
                </label>
                <div class="col-sm-5">
                    <?php foreach($getrow4 as $row) { ?>
                    <input type="text" value="<?php echo $row->No_Induk;?>" readonly="" name="No_Induk" class="form-control">
                <?php } ?>
                </div>
            </div>            
            </td>
                    <td width="50%">
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Semester
                </label>
                <div class="col-sm-5">
                <?php
                    echo form_dropdown('Semester', array('1' => 'Ganjil', '2' => 'Genap'), $n_raport['Semester'], "class='form-control' readonly");
                    ?>
                </div>
            </div>            
            </td>
            
        </tr>
        <tr>
                        <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    NISN
                </label>
                <div class="col-sm-5">
                    <?php foreach($getrow4 as $row) { ?>
                    <input type="text" value="<?php echo $row->NISN;?>" readonly="" name="NISN" class="form-control">
                <?php } ?>
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
                    Sikap Spiritual
                </label>
                <div class="col-sm-5">
                    <textarea type="text" required maxlength="250" name="Sikap_Spiritual" required placeholder="MASUKAN SIKAP SPIRITUAL" id="form-field-1" class="form-control"></textarea>
                </div>
            </div>            
            </td>

            <td>
                            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Sikap Sosial
                </label>
                <div class="col-sm-5">
                    <textarea type="text" required maxlength="250" name="Sikap_Sosial" required placeholder="MASUKAN SIKAP SPIRITUAL" id="form-field-1" class="form-control"></textarea>
                </div>
            </div>
            </td>
      </tr>

        <script src="<?php echo base_url('js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#NISN").chained("#ID_Rombel");
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
              <th align="center" class="text-center" width="20">NO</th><th align="center" width="15%" class="text-center">Nama Mapel</th><th align="center" class="text-center">KKM</th><th align="center" class="text-center">Nilai Pengetahuan</th><th align="center" class="text-center">Predikat</th><th align="center" class="text-center">Deskripsi</th><th align="center" class="text-center">Nilai Keterampilan</th><th align="center" class="text-center">Predikat</th><th align="center" class="text-center">Deskripsi</th>
          </thead>
          <tbody>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowAG as $row):?>
                        
                            <td class='text-center' align="center">1</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='AG_KI3[]'  id='AG_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->AG_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->AG_KI3) >= 90) echo "A"; elseif(number_format($row->AG_KI3) > 80 && number_format($row->AG_KI3) <90) echo "B";elseif(number_format($row->AG_KI3) > 70 && number_format($row->AG_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='AG_KI4[]'  id='AG_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->AG_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->AG_KI4) >= 90) echo "A"; elseif(number_format($row->AG_KI4) > 80 && number_format($row->AG_KI4) <90) echo "B";elseif(number_format($row->AG_KI4) > 70 && number_format($row->AG_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowPK as $row):?>
                        
                            <td class='text-center' align="center">2</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='PK_KI3[]'  id='PK_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->PK_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->PK_KI3) >= 90) echo "A"; elseif(number_format($row->PK_KI3) > 80 && number_format($row->PK_KI3) <90) echo "B";elseif(number_format($row->PK_KI3) > 70 && number_format($row->PK_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='PK_KI4[]'  id='PK_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->PK_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->PK_KI4) >= 90) echo "A"; elseif(number_format($row->PK_KI4) > 80 && number_format($row->PK_KI4) <90) echo "B";elseif(number_format($row->PK_KI4) > 70 && number_format($row->PK_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
                    <tr>
<?php $RATA1=0;$RATA2=0; foreach ($getrowBI as $row):?>
                        
                            <td class='text-center' align="center">3</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='BI_KI3[]'  id='BI_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->BI_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->BI_KI3) >= 90) echo "A"; elseif(number_format($row->BI_KI3) > 80 && number_format($row->BI_KI3) <90) echo "B";elseif(number_format($row->BI_KI3) > 70 && number_format($row->BI_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='BI_KI4[]'  id='BI_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->BI_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->BI_KI4) >= 90) echo "A"; elseif(number_format($row->BI_KI4) > 80 && number_format($row->BI_KI4) <90) echo "B";elseif(number_format($row->BI_KI4) > 70 && number_format($row->BI_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>                   
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMTK as $row):?>
                        
                            <td class='text-center' align="center">4</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='MT_KI3[]'  id='MT_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MT_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MT_KI3) >= 90) echo "A"; elseif(number_format($row->MT_KI3) > 80 && number_format($row->MT_KI3) <90) echo "B";elseif(number_format($row->MT_KI3) > 70 && number_format($row->MT_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='MT_KI4[]'  id='MT_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MT_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MT_KI4) >= 90) echo "A"; elseif(number_format($row->MT_KI4) > 80 && number_format($row->MT_KI4) <90) echo "B";elseif(number_format($row->MT_KI4) > 70 && number_format($row->MT_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>

<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowIPA as $row):?>
                        
                            <td class='text-center' align="center">5</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='IPA_KI3[]'  id='IPA_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->IPA_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPA_KI3) >= 90) echo "A"; elseif(number_format($row->IPA_KI3) > 80 && number_format($row->IPA_KI3) <90) echo "B";elseif(number_format($row->IPA_KI3) > 70 && number_format($row->IPA_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='IPA_KI4[]'  id='IPA_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->IPA_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPA_KI4) >= 90) echo "A"; elseif(number_format($row->IPA_KI4) > 80 && number_format($row->IPA_KI4) <90) echo "B";elseif(number_format($row->IPA_KI4) > 70 && number_format($row->IPA_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>

<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowIPS as $row):?>
                        
                            <td class='text-center' align="center">6</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='IPS_KI3[]'  id='IPS_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->IPS_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPS_KI3) >= 90) echo "A"; elseif(number_format($row->IPS_KI3) > 80 && number_format($row->IPS_KI3) <90) echo "B";elseif(number_format($row->IPS_KI3) > 70 && number_format($row->IPS_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='IPS_KI4[]'  id='IPS_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->IPS_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPS_KI4) >= 90) echo "A"; elseif(number_format($row->IPS_KI4) > 80 && number_format($row->IPS_KI4) <90) echo "B";elseif(number_format($row->IPS_KI4) > 70 && number_format($row->IPS_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>

<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowSB as $row):?>
                        
                            <td class='text-center' align="center">7</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='SB_KI3[]'  id='SB_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->SB_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->SB_KI3) >= 90) echo "A"; elseif(number_format($row->SB_KI3) > 80 && number_format($row->SB_KI3) <90) echo "B";elseif(number_format($row->SB_KI3) > 70 && number_format($row->SB_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='SB_KI4[]'  id='SB_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->SB_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->SB_KI4) >= 90) echo "A"; elseif(number_format($row->SB_KI4) > 80 && number_format($row->SB_KI4) <90) echo "B";elseif(number_format($row->SB_KI4) > 70 && number_format($row->SB_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowPJ as $row):?>
                        
                            <td class='text-center' align="center">8</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='PJ_KI3[]'  id='PJ_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->PJ_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->PJ_KI3) >= 90) echo "A"; elseif(number_format($row->PJ_KI3) > 80 && number_format($row->PJ_KI3) <90) echo "B";elseif(number_format($row->PJ_KI3) > 70 && number_format($row->PJ_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='PJ_KI4[]'  id='PJ_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->PJ_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->PJ_KI4) >= 90) echo "A"; elseif(number_format($row->PJ_KI4) > 80 && number_format($row->PJ_KI4) <90) echo "B";elseif(number_format($row->PJ_KI4) > 70 && number_format($row->PJ_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMK1 as $row):?>
                        
                            <td class='text-center' align="center">9. a</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='MK1_KI3[]'  id='MK1_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MK1_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK1_KI3) >= 90) echo "A"; elseif(number_format($row->MK1_KI3) > 80 && number_format($row->MK1_KI3) <90) echo "B";elseif(number_format($row->MK1_KI3) > 70 && number_format($row->MK1_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='MK1_KI4[]'  id='MK1_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MK1_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK1_KI4) >= 90) echo "A"; elseif(number_format($row->MK1_KI4) > 80 && number_format($row->MK1_KI4) <90) echo "B";elseif(number_format($row->MK1_KI4) > 70 && number_format($row->MK1_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMK2 as $row):?>
                        
                            <td class='text-center' align="center">9. b</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                             <td class='text-center' align="center"><input type='text' class='form-control' name='KKM[]'  id='KKM<?php echo $no;?>' readonly="readonly" value='<?php echo $row->KKM; ?>' ></td>
                            <td class='text-center' align="center"><input type='text' class='form-control' name='MK2_KI3[]'  id='MK2_KI3<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MK2_KI3); ?>' ></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK2_KI3) >= 90) echo "A"; elseif(number_format($row->MK2_KI3) > 80 && number_format($row->MK2_KI3) <90) echo "B";elseif(number_format($row->MK2_KI3) > 70 && number_format($row->MK2_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><input type='text' class='form-control' name='MK2_KI4[]'  id='MK2_KI4<?php echo $no;?>' readonly="readonly" value='<?php echo number_format($row->MK2_KI4); ?>' ></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK2_KI4) >= 90) echo "A"; elseif(number_format($row->MK2_KI4) > 80 && number_format($row->MK2_KI4) <90) echo "B";elseif(number_format($row->MK2_KI4) > 70 && number_format($row->MK2_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                       <td class='text-center' align="center" width="80px" height="80px"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>

                </tbody>
        </table>

<table width="100%" align="center">

   <tr>

        <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nama Ekskul
                </label>
                <div class="col-sm-5">
                    <SELECT class="form-control" required name="ID_Ekskul" style="width:200px;">
                     <option value="">--Select--</option>
                     <?php foreach($dataCmbEks as $row) { ?>
                     <option value="<?php echo $row['ID_Ekskul']; ?>"><?php echo $row['Nama_Ekskul']; ?><?php } ?>
                      </option>
                </SELECT>
                </div>
            </div>
        </td>
            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Keterangan
                </label>
                <div class="col-sm-5">
                    <input type="TEXT" value="" name="Ket_Ekskul" placeholder="Ket_Ekskul" id="Ket_Ekskul" class="form-control">
                </div>
            </div>
        </td>
</tr>

<tr>
                <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Saran
                </label>
                <div class="col-sm-5">
                    <textarea type="TEXT" value="" name="Saran" placeholder="Saran" id="Saran" class="form-control">
                </textarea>
                </div>
            </div>
        </td>
</tr>

<tr>
            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Tinggi Badan
                </label>
                <div class="col-sm-2">
<?php foreach($getrow3 as $row) { ?>
                    <input type="text" value="<?php echo $row->TB;?>" readonly="" name="TB" class="form-control">
                <?php } ?>
                    
                </div>
                <div class="col-sm-2"><input type="text" value="CM" readonly="" class="form-control"></div>
            </div>
        </td>

                    <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Berat Badan
                </label>
                <div class="col-sm-2">
<?php foreach($getrow3 as $row) { ?>
                    <input type="text" value="<?php echo $row->BB;?>" readonly="" name="BB" class="form-control">
                <?php } ?>
                    
                </div>
                <div class="col-sm-2"><input type="text" value="KG" readonly="" class="form-control"></div>
            </div>
        </td>    
</tr>

<tr>
            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Pendengaran
                </label>
                <div class="col-sm-2">
<?php foreach($getrow3 as $row) { ?>
                    <input type="text" value="<?php echo $row->Pendengaran;?>" readonly="" name="Pendengaran" class="form-control">
                <?php } ?>
                    
                </div>
            </div>
        </td>

                    <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Penglihatan
                </label>
                <div class="col-sm-2">
<?php foreach($getrow3 as $row) { ?>
                    <input type="text" value="<?php echo $row->Penglihatan;?>" readonly="" name="Penglihatan" class="form-control">
                <?php } ?>
                    
                </div>
            </div>
        </td>    

</tr>

<tr>
     <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Gigi
                </label>
                <div class="col-sm-2">
<?php foreach($getrow3 as $row) { ?>
                    <input type="text" value="<?php echo $row->Gigi;?>" readonly="" name="Gigi" class="form-control">
                <?php } ?>
                    
                </div>
            </div>
        </td>    
</tr>

<tr>
     <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Jenis Prestasi
                </label>
                <div class="col-sm-5">
                    <input type="text" value="" name="J_Prestasi" class="form-control">
                    
                </div>
            </div>
        </td>

        <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Keterangan
                </label>
                <div class="col-sm-5">
                    <textarea type="text" value="" name="K_Prestasi" class="form-control">
                    </textarea>
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
                <div class="col-sm-2">
                    <?php foreach($getAb as $getAb) { ?>
                    <input type="text" readonly="readonly" value="<?php echo $getAb->S; ?>" name="S" placeholder="S" id="form-field-1" class="form-control">
                    
                </div>
            </div>
        </td>

        <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Ijin
                </label>
                <div class="col-sm-2">
<input type="text" readonly="readonly" value="<?php echo $getAb->I; ?>" name="I" placeholder="I" id="form-field-1" class="form-control">

                
                    
                </div>
            </div>
        </td>

   <tr>

            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Alfa
                </label>
                <div class="col-sm-2">
                    <input type="text" readonly="readonly" value="<?php echo $getAb->A; ?>"  name="A" placeholder="0" id="form-field-1" class="form-control">
                    <?php } ?>
                </div>
            </div>
        </td>


            <td>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Keputusan
                </label>
                <div class="col-sm-5">
                    <textarea type="text" value=""  name="KP" placeholder="0" id="form-field-1" class="form-control">
                    </textarea>
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
                   <input type="text" required name="NISN" value="<?php echo $n_raport['NISN']; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
                </div>
            </div>
        </td>
         <td>
            <div class="form-group" hidden="" >
                <label class="col-sm-5 control-label" for="form-field-1">
                    ID Raport
                </label>
                <div class="col-sm-2">
                   <input type="Number" required name="ID_Raport" readonly="readonly" value="<?php echo $ID_Raport; ?>" placeholder="Masukan ID" id="form-field-1" class="form-control">
                </div>
            </div>
        </td>
</tr>


</table>


<table align="center">
    <tr>
        <td width="50%">
            <div class="form-group">


                <div class="col-sm-1"><button type="submit" name="submit" class="btn btn-info btn-sm">SIMPAN</button>

                </div>
            </div>
            </td>

<td width="50%">
            <div class="form-group">
                <div class="col-sm-1">
                    <?php echo anchor('n_raport', 'KEMBALI', array('class' => 'btn btn-danger btn-sm')); ?>
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


