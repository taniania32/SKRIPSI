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
<?php foreach($dataNilai as $Nilai)?>
<tr>
<td align="center" class="text-center"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">DATA NILAI KETERAMPILAN SISWA</h3></label></p></td></tr>
<tr>
<td align="center" class="text-center"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">TAHUN PELAJARAN <?php echo $Nilai['tahun_akademik']; ?></h3></label></p></td>
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
      <td align='center' style='font-weight:bold' rowspan="2">No</td>
      <td align='center' style='font-weight:bold' rowspan="2">NAMA SISWA</td>
                        <td align='center' style='font-weight:bold' rowspan="2">ROMBEL</td>
      <td align='center' style='font-weight:bold' rowspan="2">SEMESTER</td>
      <td align='center' style='font-weight:bold' colspan="6">KETERAMPILAN</td>
      <td align='center' style='font-weight:bold' rowspan="2">Nama Mapel</td>
      <td align='center' style='font-weight:bold' rowspan="2">KET</td>
    </tr>
      


<tr>
        <td align='center' style='font-weight:bold'>ID KD</td>
          <td align='center' style='font-weight:bold'>1</td>
        <td align='center' style='font-weight:bold'>2</td>
        <td align='center' style='font-weight:bold'>3</td>
        <td align='center' style='font-weight:bold'>4</td>
        <td align='center' style='font-weight:bold'>N</td>
</tr>




    </thead>
    
                        <?php $no=1; foreach ($dataNilai as $Nilai):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['Nama']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['Semester']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['Kode_KD']; ?></td>

                            <td class='text-center' align="center"><?php echo $Nilai['N_1']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['N_2']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['N_3']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['N_4']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['N_N']; ?></td>
                            <td class='text-center' align="center"><?php echo $Nilai['ID_Mapel']; ?></td>
                            <td class='text-center' align="center">&nbsp;</td>
                          </tr>
                            <?php  endforeach?>   
</table>  
  
  
  
  <div class="w3-row-padding w3-tiny">
  <div class="w3-col s4">
<tr>
    <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p>Ka. SDN Sukapura 01 Pagi</p></td>
    <br>
    <br>
    <br>
    
    <td><p>Dra. Nunuk Tati T, M.Pd<br>NIP. 196307071986032008&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <u><b></b></u></p></td>
   
   </tr> 


  </div>
  </div>
    
</body>
</div>
</html>