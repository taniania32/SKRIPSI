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
<?php foreach($dataR as $Nilai)?>
<tr>
<td align="center" class="text-center"><p align="center" class="text-center"><label align="center" class="text-center"><h3 align="center" class="text-center">DATA REKAP ABSEN SISWA</h3></label></p></td></tr>
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
                        <th class='text-center' align="center">No</th>
                        <th class='text-center' align="center">Nama</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Semester</th>
                        <th class='text-center' align="center">Tahun Akademik</th>
                        <th class='text-center' align="center">Sakit</th>
                        <th class='text-center' align="center">Ijin</th>
                        <th class='text-center' align="center">Alfa</th>
                        <th class='text-center' align="center">Jumlah Absen</th>
                    </tr>
                </thead>
                <tbody>
                     
                    <?php $no=1; foreach ($dataR as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-LEFT' align="center"><?php echo $row['Nama']; ?></td>
                            <td class='text-center' align="center"><?php echo $row['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php echo $row['Semester']; ?></td>
                            <td class='text-center' align="center"><?php echo $row['tahun_akademik']; ?></td>
                            <td class='text-LEFT' align="center"><?php echo $row['S']; ?></td>
                            <td class='text-LEFT' align="center"><?php echo $row['I']; ?></td>
                            <td class='text-LEFT' align="center"><?php echo $row['A']; ?></td>
                            <td class='text-LEFT' align="center"><?php echo $row['J_A']; ?></td>
                            
                        </tr>
                    <?php  endforeach?>   
                </tbody>
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