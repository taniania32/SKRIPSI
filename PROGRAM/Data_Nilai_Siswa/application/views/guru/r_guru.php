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
    <td align="center"><img src="<?=base_url('assets/sd2.png')?>"></td> 
  </tr>
   
</table>
<td><p align="center"><label class="col-sm-3 control-label"><h3 align="center">DATA PNS/CPNS PENDIDIK SD NEGERI<br>DI LINGKUNGAN SUDIN PENDIDIKAN WILAYAH II KOTA ADMINISTRASI JAKARTA UTARA</h3></label></p></td>
  <table border="1" cellpadding="1" cellspacing="0" width="100%">
    <thead>
                    <tr>
                        <th class='text-center' align="center">NO</th>
                        <th class='text-center' align="center">Nama Guru</th>
                        <th class='text-center' align="center">NIP</th>
                        <th class='text-center' align="center">Tempat Lahir</th>
            <th class='text-center' align="center">Tanggal Lahir</th>
                        <th class='text-center' align="center">Guru Kelas/Mapel</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Mapel</th>
                        <th class='text-center' align="center">Tugas Tambahan</th>
                        <th class='text-center' align="center">Status</th>
            </tr>

                </thead>
<tbody>
                     
                    <?php $no=1; foreach ($dataGuru as $guru):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $guru['Nama_Guru']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['NIP']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Tempat_Lahir']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Tanggal_Lahir']; ?></td>
                            <td class='text-center' align="center"><?php
                                if ($guru['Nama_Tipe_Guru'] === 'GP'):?>
                        <label>Guru Mapel</label>
                        <?php
                    elseif ($guru['Nama_Tipe_Guru'] === 'GK'):?>
                        <label>Guru Kelas</label>
                <?php endif;?></td>
                            <td class='text-center' align="center"><?php echo $guru['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Nama_Mapel']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Tugas_Tambahan']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Status']; ?></td>
                        </tr>
                    <?php  endforeach?>   
                </tbody>
</table>  


  </div>
  </div>
</div>
</html>