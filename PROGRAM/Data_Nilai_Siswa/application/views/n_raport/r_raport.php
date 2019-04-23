<!DOCTYPE html>
<html lang="en">

<!--<head>
    <!-- Bootstrap Core CSS -->
    <!--<link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">-->
    <!-- Custom CSS -->
    <!--<link href="<?= base_url('css/simple-sidebar.css'); ?>" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--<style type="text/css">
  .soe {
    border-style: solid;
    border-width: 1px;
}
</style>
</head>-->

<body>
<table width="100%">
<tr>
<td align="center" class="text-center"><p align="center"><label><h3 align="center"><img src="<?=base_url('assets/logo.jpg')?>">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK</h3></label></p></td>
</tr>
<tr>
<td align="center" class="text-center"><p align="center"><label><h3 align="center">SDN SUKAPURA 01 PAGI</h3></label></p></td>
</tr>
<tr>
<td align="center" class="text-center"><p align="center"><label><h3 align="center">Jl. Beo Rt. 012 Rw. 006</h3></label></p></td>
</tr>
</tr>
</table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>


<table width="100%">
<?php foreach($dataNilai2 as $D)?>
<tr>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">Nama Peserta Didik : <?php echo $D->Nama; ?></h3></label></p></td>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">Kelas : <?php echo $D->Nama_Rombel; ?></h3></label></p></td>
</tr>
<tr>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">Nomor Induk : <?php echo $D->No_Induk; ?></h3></label></p></td>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">Semester : <?php echo $D->Semester; ?></h3></label></p></td>
</tr>
<tr>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">NISN : <?php echo $D->NISN; ?></h3></label></p></td>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">Tahun Pelajaran : <?php echo $D->tahun_akademik; ?></h3></label></p></td>
</tr>
</table>

<table border="1" cellpadding="1" cellspacing="0" width="100%">
<?php foreach($dataNilai2 as $D)?>
<tr>
  <td colspan="2"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">A. Sikap</h3></label></p></td>
</tr>
<tr>
  <td colspan="2" align="center" class="text-center"><p align="center"><label><h3 align="center">Deskripsi :</h3></label></p></td>
</tr>

<tr>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">1. Sikap Spiritual</h3></label></p></td>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center"><?php echo $D->S_Spirit; ?></h3></label></p></td>
</tr>

<tr>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">2. Sikap Sosial</h3></label></p></td>
  <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center"><?php echo $D->S_Sosial; ?></h3></label></p></td>
</tr>
</table>

  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="8"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">B. Pengetahuan dan Keterampilan</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' rowspan="2">No</td>
      <td align='center' style='font-weight:bold' rowspan="2">MUATAN PELAJARAN</td>
      <td align='center' style='font-weight:bold' colspan="3">PENGETAHUAN</td>
      <td align='center' style='font-weight:bold' colspan="3">KETERAMPILAN</td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold'>Nilai</td>
      <td align='center' style='font-weight:bold'>Predikat</td>
      <td align='center' style='font-weight:bold'>Deskripsi</td>
      <td align='center' style='font-weight:bold'>Nilai</td>
            <td align='center' style='font-weight:bold'>Predikat</td>
      <td align='center' style='font-weight:bold'>Deskripsi</td>
      </tr>      

    </thead>
    
                        <tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowAG as $row):?>
                            <td class='text-center' align="center">1</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>
                            <td class='text-center' align="center"><?php echo number_format($row->AG_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->AG_KI3) >= 90) echo "A"; elseif(number_format($row->AG_KI3) > 80 && number_format($row->AG_KI3) <90) echo "B";elseif(number_format($row->AG_KI3) > 70 && number_format($row->AG_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->AG_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->AG_KI4) >= 90) echo "A"; elseif(number_format($row->AG_KI4) > 80 && number_format($row->AG_KI4) <90) echo "B";elseif(number_format($row->AG_KI4) > 70 && number_format($row->AG_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
                    <tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowPK as $row):?>
                        
                            <td class='text-center' align="center">2</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                          
                            <td class='text-center' align="center"><?php echo number_format($row->PK_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->PK_KI3) >= 90) echo "A"; elseif(number_format($row->PK_KI3) > 80 && number_format($row->PK_KI3) <90) echo "B";elseif(number_format($row->PK_KI3) > 70 && number_format($row->PK_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->PK_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->PK_KI4) >= 90) echo "A"; elseif(number_format($row->PK_KI4) > 80 && number_format($row->PK_KI4) <90) echo "B";elseif(number_format($row->PK_KI4) > 70 && number_format($row->PK_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>


                    <tr>    
<?php foreach ($getrowBI as $row):?>
                            <td class='text-center' align="center">3</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                         
                            <td class='text-center' align="center"><?php echo number_format($row->BI_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->BI_KI3) >= 90) echo "A"; elseif(number_format($row->BI_KI3) > 80 && number_format($row->BI_KI3) <90) echo "B";elseif(number_format($row->BI_KI3) > 70 && number_format($row->BI_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->BI_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->BI_KI4) >= 90) echo "A"; elseif(number_format($row->BI_KI4) > 80 && number_format($row->BI_KI4) <90) echo "B";elseif(number_format($row->BI_KI4) > 70 && number_format($row->BI_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr> 
                    <tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMTK as $row):?>
                        
                            <td class='text-center' align="center">4</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                         
                            <td class='text-center' align="center"><?php echo number_format($row->MT_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MT_KI3) >= 90) echo "A"; elseif(number_format($row->MT_KI3) > 80 && number_format($row->MT_KI3) <90) echo "B";elseif(number_format($row->MT_KI3) > 70 && number_format($row->MT_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->MT_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MT_KI4) >= 90) echo "A"; elseif(number_format($row->MT_KI4) > 80 && number_format($row->MT_KI4) <90) echo "B";elseif(number_format($row->MT_KI4) > 70 && number_format($row->MT_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
                    <tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowIPA as $row):?>
                        
                            <td class='text-center' align="center">5</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                         
                            <td class='text-center' align="center"><?php echo number_format($row->IPA_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPA_KI3) >= 90) echo "A"; elseif(number_format($row->IPA_KI3) > 80 && number_format($row->IPA_KI3) <90) echo "B";elseif(number_format($row->IPA_KI3) > 70 && number_format($row->IPA_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->IPA_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPA_KI4) >= 90) echo "A"; elseif(number_format($row->IPA_KI4) > 80 && number_format($row->IPA_KI4) <90) echo "B";elseif(number_format($row->IPA_KI4) > 70 && number_format($row->IPA_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowIPS as $row):?>
                        
                            <td class='text-center' align="center">6</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                         
                            <td class='text-center' align="center"><?php echo number_format($row->IPS_KI4); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPS_KI3) >= 90) echo "A"; elseif(number_format($row->IPS_KI3) > 80 && number_format($row->IPS_KI3) <90) echo "B";elseif(number_format($row->IPS_KI3) > 70 && number_format($row->IPS_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->IPS_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->IPS_KI4) >= 90) echo "A"; elseif(number_format($row->IPS_KI4) > 80 && number_format($row->IPS_KI4) <90) echo "B";elseif(number_format($row->IPS_KI4) > 70 && number_format($row->IPS_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>

<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowSB as $row):?>
                        
                            <td class='text-center' align="center">7</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                  
                            <td class='text-center' align="center"><?php echo number_format($row->SB_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->SB_KI3) >= 90) echo "A"; elseif(number_format($row->SB_KI3) > 80 && number_format($row->SB_KI3) <90) echo "B";elseif(number_format($row->SB_KI3) > 70 && number_format($row->SB_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->SB_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->SB_KI4) >= 90) echo "A"; elseif(number_format($row->SB_KI4) > 80 && number_format($row->SB_KI4) <90) echo "B";elseif(number_format($row->SB_KI4) > 70 && number_format($row->SB_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowPJ as $row):?>
                        
                            <td class='text-center' align="center">8</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>
                            <td class='text-center' align="center"><?php echo number_format($row->PJ_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->PJ_KI3) >= 90) echo "A"; elseif(number_format($row->PJ_KI3) > 80 && number_format($row->PJ_KI3) <90) echo "B";elseif(number_format($row->PJ_KI3) > 70 && number_format($row->PJ_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->PJ_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->PJ_KI4) >= 90) echo "A"; elseif(number_format($row->PJ_KI4) > 80 && number_format($row->PJ_KI4) <90) echo "B";elseif(number_format($row->PJ_KI4) > 70 && number_format($row->PJ_KI4) <=80) echo "C"; else echo "D" ; ?></td>
                            <td><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMK1 as $row):?>
                        
                            <td class='text-center' align="center">9. a</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td> 
                            <td class='text-center' align="center"><?php echo number_format($row->MK1_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK1_KI3) >= 90) echo "A"; elseif(number_format($row->MK1_KI3) > 80 && number_format($row->MK1_KI3) <90) echo "B";elseif(number_format($row->MK1_KI3) > 70 && number_format($row->MK1_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->MK1_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK1_KI4) >= 90) echo "A"; elseif(number_format($row->MK1_KI4) > 80 && number_format($row->MK1_KI4) <90) echo "B";elseif(number_format($row->MK1_KI4) > 70 && number_format($row->MK1_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>
<tr>
                    <?php $RATA1=0;$RATA2=0; foreach ($getrowMK2 as $row):?>
                        
                            <td class='text-center' align="center">9. b</td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Mapel; ?></td>                      
                            <td class='text-center' align="center"><?php echo number_format($row->MK2_KI3); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK2_KI3) >= 90) echo "A"; elseif(number_format($row->MK2_KI3) > 80 && number_format($row->MK2_KI3) <90) echo "B";elseif(number_format($row->MK2_KI3) > 70 && number_format($row->MK2_KI3) <=80) echo "C"; else echo "D" ; ?></td> 
                            <td class='text-center' align="center"><?php echo $row->Desk_P; ?></td>
                       <td class='text-center' align="center"><?php echo number_format($row->MK2_KI4); ?></td>
                       </td>
                            <td class='text-center' align="center"><?php if(number_format($row->MK2_KI4) >= 90) echo "A"; elseif(number_format($row->MK2_KI4) > 80 && number_format($row->MK2_KI4) <90) echo "B";elseif(number_format($row->MK2_KI4) > 70 && number_format($row->MK2_KI4) <=80) echo "C"; else echo "D" ; ?></td> 
                        <td class='text-center' align="center"><?php echo $row->Desk_K; ?></td>
                    <?php endforeach ?>
                    </tr>                    

</table>  

<table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="3"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">C. Ekstra Kurikuler</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' >NO</td>
      <td align='center' style='font-weight:bold' >Ekstra Kurikuler</td>
      <td align='center' style='font-weight:bold' >Keterangan dalam kegiatan</td>
      </tr>      

    </thead>
    
                        <?php $no=1; foreach ($dataE as $R):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $R->Nama_Ekskul; ?></td>
                            <td class='text-center' align="center"><?php echo $R->Ket_Ekskul; ?></td>
                          </tr>
                            <?php  endforeach?>   
</table>  
  
  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">D. Saran-saran</h3></label></p></td>

    </thead>
    
                        <?php $no=1; foreach ($dataE as $R):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $R->Saran; ?></td>
                          </tr>
                            <?php  endforeach?>   
</table>  
  
  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="4"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">E. Tinggi dan Berat Badan</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' rowspan="2">NO</td>
      <td align='center' style='font-weight:bold' rowspan="2">Aspek Yang Dinilai</td>
      <td align='center' style='font-weight:bold' colspan="2">Semester</td>
      </tr>
            <tr>
      <td align='center' style='font-weight:bold' >1</td>
      <td align='center' style='font-weight:bold' >2</td>
      </tr>      

    </thead>
    

                        <tr>
                          <?php foreach ($dataTB as $dataT)?>
                            <th class='text-center' align="center">1</th>
                            <th class='text-center' align="center">Tinggi Badan</th>
                            <th class='text-center' align="center"><?php echo $dataT->TB; ?>&nbsp;Cm</th>
                            <th class='text-center' align="center"></th>
                          </tr>
                          <tr>
                            <?php foreach ($dataTB as $dataT)?>
                            <td class='text-center' style='font-weight:bold' align="center">2</td>
                            <td class='text-center' style='font-weight:bold' align="center">Berat Badan</td>
                            <th class='text-center' align="center"><?php echo $dataT->BB; ?>&nbsp;Kg</th>
                            <th class='text-center' align="center"></th>
                          </tr>

</table>

<table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="3"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">F. Kondisi Kesehatan</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' >NO</td>
      <td align='center' style='font-weight:bold' >Aspek Fisik</td>
      <td align='center' style='font-weight:bold'  >Keterangan</td>
      </tr>      

    </thead>
    
                                                <tr>
                          <?php foreach ($dataTB as $dataT)?>
                            <th class='text-center' align="center">1</th>
                            <th class='text-center' align="center">Pendengaran</th>
                            <th class='text-center' align="center"><?php echo $dataT->Pendengaran; ?></th>
                            
                          </tr>
                          <tr>
                            <?php foreach ($dataTB as $dataT)?>
                            <td class='text-center' style='font-weight:bold' align="center">2</td>
                            <td class='text-center' style='font-weight:bold' align="center">Penglihatan</td>
                            <th class='text-center' align="center"><?php echo $dataT->Penglihatan; ?></th>
                             </tr> 
                                                    <tr>
                            <?php foreach ($dataTB as $dataT)?>
                            <td class='text-center' style='font-weight:bold' align="center">3</td>
                            <td class='text-center' style='font-weight:bold' align="center">Gigi</td>
                            <th class='text-center' align="center"><?php echo $dataT->Gigi; ?></th>
                             </tr> 
</table>  

<table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="3"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">G. Prestasi</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' >NO</td>
      <td align='center' style='font-weight:bold' >Jenis Prestasi</td>
      <td align='center' style='font-weight:bold'  >Keterangan</td>
      </tr>      

    </thead>
    <?php $no=1; foreach ($dataP as $R):?>
                                          <tr>
                            <th class='text-center' align="center">1</th>
                            <th class='text-center' align="center"><?php echo $R->J_Prestasi; ?></th>
                            <th class='text-center' align="center"><?php echo $R->K_Prestasi; ?></th>
                          </tr>
                          <tr>
                            <th class='text-center' align="center">2</th>
                            <th class='text-center' align="center"></th>
                            <th class='text-center' align="center"></th>
                             </tr> 
                                                    <tr>
                            <th class='text-center' align="center">3</th>
                            <th class='text-center' align="center"></th>
                            <th class='text-center' align="center"></th>
                             </tr> 
                             <?php  endforeach?> 
</table>  

<table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
         <td colspan="3"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">H. Ketidakhadiran</h3></label></p></td>
      </tr>
      <tr>
      <td align='center' style='font-weight:bold' >NO</td>
      <td align='center' style='font-weight:bold' >Ekstra Kurikuler</td>
      <td align='center' style='font-weight:bold' >Keterangan dalam kegiatan</td>
      </tr>      

    </thead>
    
                        <?php $no=1; foreach ($dataAb as $R):?>
                <tr>
                            <td class='text-center' style='font-weight:bold' align="center">1</td>
                            <td class='text-center' style='font-weight:bold' align="center">Sakit</td>
                            <th class='text-center' align="center"><?php echo $R->S; ?></th>
                             </tr> 
                                                   <tr>
                            <td class='text-center' style='font-weight:bold' align="center">2</td>
                            <td class='text-center' style='font-weight:bold' align="center">Ijin</td>
                            <th class='text-center' align="center"><?php echo $R->I; ?></th>
                             </tr> 
                                             <tr>
                            <td class='text-center' style='font-weight:bold' align="center">3</td>
                            <td class='text-center' style='font-weight:bold' align="center">Alfa</td>
                            <th class='text-center' align="center"><?php echo $R->A; ?></th>
                             </tr> 


                                                         <?php  endforeach?>   
</table>

<table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>

<tr>
      <td align='center' style='font-weight:bold' >Keputusan</td>
      </tr>      

    </thead>
    
    <?php $no=1; foreach ($dataP as $R):?>
                              <tr>
                            <td class='text-center' style='font-weight:bold' align="center"><?php echo $R->Keputusan; ?></td>
                           </tr> 
<?php  endforeach?>   
  
</table>
  
  <div class="w3-row-padding w3-tiny">
  <div class="w3-col s4">
<?php foreach($dataNilai2 as $d)?>
<tr>
    <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Jakarta,<?php echo date('d M Y');?></p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orang tua / Wali,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wali Kelas <?php echo $d->Nama_Rombel; ?></p></td>
    <br>
    <br>
    <br>
    
    <td><p>..........................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <u><b><?php echo $d->Nama_Guru; ?></b></u><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP.&nbsp;<?php echo $d->NIP; ?></p></td>
   
   </tr> 


  </div>
  </div>
    
</body>
</div>
</html>