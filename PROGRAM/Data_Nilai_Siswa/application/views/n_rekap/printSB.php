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
<td align="center" class="text-center"><p align="center"><label><h3 align="center">REKAPTULASI NILAI SISWA</h3></label></p></td>
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


<table border="1" cellpadding="1" cellspacing="0" width="100%">
 <thead>
                    <tr>
                        <th class='text-center' align="center" rowspan="3">No</th>
                        <th class='text-center' align="center" rowspan="3">NAMA</th>
                        <th class='text-center' align="center" colspan="12">REKAPITULASI NILAI SBdP</th>
                        <th class='text-center' align="center" rowspan="3">KETERANGAN</th>
                    </tr>
                                        <tr>
                        <th class='text-center' align="center" colspan="6">PENGETAHUAN</th>
                        <th class='text-center' align="center" colspan="6">KETERAMPILAN</th>
                    </tr>

               <tr>
                <th class='text-center' align="center" rowspan="">3.1</th>
                <th class='text-center' align="center" rowspan="">3.2</th>
                <th class='text-center' align="center" rowspan="">3.3</th>
                <th class='text-center' align="center" rowspan="">3.4</th>
                <th class='text-center' align="center" rowspan="">NA</th>
                <th class='text-center' align="center" rowspan="">P</th>
                <th class='text-center' align="center" rowspan="">4.1</th>
                <th class='text-center' align="center" rowspan="">4.2</th>
                <th class='text-center' align="center" rowspan="">4.3</th>
                <th class='text-center' align="center" rowspan="">4.4</th>
                <th class='text-center' align="center" rowspan="">NA</th>
                <th class='text-center' align="center" rowspan="">P</th>
                    </tr>

                </thead>
                <tbody>
                     
                    <?php $no=1; $RATA2=0; $RATA1=0; foreach ($getrow1 as $row):?>
                       <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $row->Nama; ?></td>
                            <td class='text-center' id="N1" align="center"><?php echo number_format($row->N1) ?></td>
                            <td class='text-center' id="N2" align="center"><?php echo number_format($row->N2) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N3) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N4) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->RATA1) ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->RATA1) >= 90) echo "A"; elseif(number_format($row->RATA1) > 80 && number_format($row->RATA1) <90) echo "B";elseif(number_format($row->RATA1) > 70 && number_format($row->RATA1) <=80) echo "C"; else echo "D" ; ?></td>            
                            <td class='text-center' id="N4" align="center"><?php echo number_format($row->N5) ?></td>
                            <td class='text-center' id="N4" align="center"><?php echo number_format($row->N6) ?></td>
                            <td class='text-center' id="N5" align="center"><?php echo number_format($row->N7) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N8) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->RATA2) ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->RATA2) >= 90) echo "A"; elseif(number_format($row->RATA2) > 80 && number_format($row->RATA2) <90) echo "B";elseif(number_format($row->RATA2) > 70 && number_format($row->RATA2) <=80) echo "C"; else echo "D" ; ?></td>
                             <td class='text-center' align="center">&nbsp;</td>
                        </tr>
                    <?php  endforeach?>   
                </tbody>
              </table>
  <div class="w3-row-padding w3-tiny">
  <div class="w3-col s4">
<?php foreach($dataSiswa as $siswa)?>
<tr>
    <td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Guru Kelas <?php echo $siswa['Nama_Rombel']; ?></p>
    <p>Ka. SDN Sukapura 01 Pagi</p></td>
    <br>
    <br>
    <br>
    
    <td><p>Dra. Nunuk Tati T, M.Pd<br>NIP. 196307071986032008&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <u><b><?php echo $siswa['Nama_Guru']; ?></b></u></p></td>
   
   </tr> 

  </div>
  </div>
    

</body>

</html>