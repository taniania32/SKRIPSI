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
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=base_url('assets/sd2.png')?>"></td> 
  </tr>
   
</table >
<table width="100%">
<?php foreach($dataNilai2 as $Nilai)?>
<tr>
<td align="center" class="text-center"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">LEGGER NILAI SISWA</h3></label></p></td></tr>
<tr>
<td align="center" class="text-center"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">TAHUN PELAJARAN <?php echo $Nilai->tahun_akademik; ?></h3></label></p></td>
</tr>
</table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>
<table><br></table>
  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
      <td align='center' style='font-weight:bold' colspan="2" rowspan="2">No</td>
      <td align='center' style='font-weight:bold'>NAMA SISWA</td>
      <td align='center' style='font-weight:bold' colspan="2">AGAMA</td>
      <td align='center' style='font-weight:bold' colspan="2">PPKN</td>
      <td align='center' style='font-weight:bold' colspan="2">BI</td>
      <td align='center' style='font-weight:bold' colspan="2">MTK</td>
      <td align='center' style='font-weight:bold' colspan="2">IPA</td>
    <td align='center' style='font-weight:bold' colspan="2">IPS</td>
    <td align='center' style='font-weight:bold' colspan="2">SBdP</td>
    <td align='center' style='font-weight:bold' colspan="2">PJOK</td>
    <td align='center' style='font-weight:bold' colspan="2">MULOK 1</td>
    <td align='center' style='font-weight:bold' colspan="2">MULOK 2</td>
    <td align='center' style='font-weight:bold' colspan="2" rowspan="2">RATA-RATA</td>
    <td align='center' style='font-weight:bold' colspan="2" rowspan="2">SIKAP</td>
    <td align='center' style='font-weight:bold' colspan="3">ABSENSI</td>
      </tr>
      
<tr>
  <th align='center' style='font-weight:bold'>KKM</th>
  <?php $no=1;foreach($dataKKM as $KKM1):?>
  <th class='text-center' align="center" colspan="2"><?php echo $KKM1['KKM']; ?></th>
<?php  endforeach?>
  <th class='text-center' align="center" colspan="2"></th>
  <th class='text-center' align="center" colspan="2"></th>
                        <td rowspan="2" align='center' style='font-weight:bold'>Sakit</td>
        <td align='center' rowspan="2" style='font-weight:bold'>Ijin</td>
        <td align='center' rowspan="2" style='font-weight:bold'>Alfa</td>
</tr>

      <tr>
        <td align='center' style='font-weight:bold'>URUT</td>
        <td align='center' style='font-weight:bold'>INDUK</td>
        <td align='center' style='font-weight:bold'></td>
        <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                        <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                        <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                        <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                        <td align='center' style='font-weight:bold'>KI 3</td>
        <td align='center' style='font-weight:bold'>KI 4</td>
                        <td align='center' style='font-weight:bold'>KI 1</td>
        <td align='center' style='font-weight:bold'>KI 2</td>

      </tr>

    </thead>
    
                        <?php $no=1; foreach ($dataNilai2 as $Nilai):?>
                        <tr>
                               <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->No_Induk; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->Nama; ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->AG_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->AG_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->PK_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->PK_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->BI_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->BI_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->MT_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->MT_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->IPA_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->IPA_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->IPS_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->IPS_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->SB_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->SB_KI4); ?></td>
                              <td class='text-center' align="center"><?php echo number_format($Nilai->PJ_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->PJ_KI4); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->MK1_KI3); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->MK1_KI4); ?></td>
                              <td class='text-center' align="center"><?php echo number_format($Nilai->MK2_KI3); ?></td>
                            <td class='text-center'  align="center"><?php echo number_format($Nilai->MK2_KI4); ?></td> <td class='text-center' align="center"><?php echo number_format($Nilai->Rata1); ?></td>
                            <td class='text-center' align="center"><?php echo number_format($Nilai->Rata2); ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->N_Sikap1; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->N_Sikap2; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->S; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->I; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai->A; ?></td>
                          </tr>
                            <?php  endforeach?>   
</table>  
  
  
  
  <div class="w3-row-padding w3-tiny">
  <div class="w3-col s4">
<?php foreach($dataNilai2 as $siswa)?>
<tr>
    <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Guru Kelas <?php echo $siswa->Nama_Rombel; ?></p>
    <p>Ka. SDN Sukapura 01 Pagi</p></td>
    <br>
    <br>
    <br>
    
    <td><p>Dra. Nunuk Tati T, M.Pd<br>NIP. 196307071986032008&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <u><b><?php echo $siswa->Nama_Guru; ?></b></u></p></td>
   
   </tr> 


  </div>
  </div>
    
</body>
</div>
</html>