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
    <td><img src="<?=base_url('assets/sd2.png')?>"></td> 
  </tr>
   
</table>
<?php foreach($dataSiswa as $siswa)?>
<td><p align="center"><label class="col-sm-3 control-label"><h3 align="center">DAFTAR SISWA<br>TAHUN PELAJARAN 2017 / 2018</h3></label></p></td>
  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
      <tr>
      <td align='center' style='font-weight:bold'>No</td>
      <td align='center' style='font-weight:bold'>NISN</td>
      <td align='center' style='font-weight:bold'>No. Induk</td>
      <td align='center' style='font-weight:bold'>Nama</td>
      <td align='center' style='font-weight:bold'>Jenis Kelamin</td>
      <td align='center' style='font-weight:bold'>Keterangan</td>
      <td align='center' style='font-weight:bold'>Rombel</td>
    <td align='center' style='font-weight:bold'>Kelas</td>
      </tr>
    </thead>
    
      <?php $no=1; foreach ($dataSiswa as $siswa):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $siswa['NISN']; ?></td>
                            <td class='text-center' align="center"><?php echo $siswa['No_Induk']; ?></td>
                            <td class='text-center' align="left"><?php echo $siswa['Nama']; ?></td>
                            <td class='text-center' align="center"><?php echo $siswa['JK']; ?></td>
                            <td class='text-center' align="center"><?php echo $siswa['Ket']; ?></td>
                            <td class='text-center' align="center"><?php echo $siswa['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php echo $siswa['ID_Kelas']; ?></td>  </tr>
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