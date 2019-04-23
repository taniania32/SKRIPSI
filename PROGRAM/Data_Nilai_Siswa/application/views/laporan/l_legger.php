<style type="text/css">
.modal-dialog {
    width: 900px;
    margin: 30px auto;
}
</style>

<body>
<?php
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
<div class="panel panel-primary">
  <div class="page-header">
    <h1>Laporan Legger</h1> 
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/jquery/jquery-1.12.4.js"></script>
    <script src="../assets/jquery/jquery.dataTables.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</div>

  <div class="panel-body">
  <form class="form-inline" action="<?php echo site_url('laporan/reportlegger'); ?>" method="post">
    <div class="form-group">
    <table>  
<td>
                <div class="col-sm-2">
                                       <SELECT class="form-control" required name="ID_Rombel" id="ID_Rombel" ">
 <option value="">--Rombel--</option>
                            <?php
                            foreach ($data1 as $rom) {
                                ?>

                                <option value="<?php echo $rom->ID_Rombel ?>"><?php echo $rom->Nama_Rombel ?></option>
                                <?php
                            }
                            ?>
                </SELECT>
                
                    </div>
</td>
<td>
  <SELECT class="form-control" required name="id_tahun_akademik" id="id_tahun_akademik" style="width:200px;">
                     <option value="">--Tahun Akademik--</option>
                     <?php foreach($dataCmbThn as $row) { ?>
                     <option value="<?php echo $row['id_tahun_akademik']; ?>"><?php echo $row['tahun_akademik']; ?><?php } ?>
                      </option>
                </SELECT>
</td>

<td>
<div class="col-sm-2">
      <input type="text" name="Semester" value="<?php if(isset($_POST['Semester'])) echo $_POST['Semester']; ?>" placeholder="Semester"></div></td>
      <td>
      <button type="submit" class="btn btn-default">Search</button>
    </td>
    <td>
      <?php if($count>0){ ?>
<a target="_blank" class="btn btn-primary btn-sm"  href="<?=base_url('index.php/laporan/reportleggerPdf');?>/<?php if(isset($_POST['ID_Rombel'])) echo $_POST['ID_Rombel']; ?>/<?php if(isset($_POST['Semester'])) echo $_POST['Semester']; ?>/<?php if(isset($_POST['id_tahun_akademik'])) echo $_POST['id_tahun_akademik']; ?>"> PRINT </a>
      <?php } ?>
    </div>
   </td>
    </table>
<script type="text/javascript">
   $("#id_tahun_akademik").val("<?php echo $_POST['id_tahun_akademik'];?>");
   $("#ID_Rombel").val("<?php echo $_POST['ID_Rombel'];?>");
</script>
  </form>
   <table class="table table-bordered">
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
    
      </tr>
      
<tr>
  <th align='center' class='text-center' style='font-weight:bold'>KKM</th>
  <?php $no=1;foreach($dataKKM as $KKM1):?>
  <th class='text-center' align="center" colspan="2"><?php echo $KKM1['KKM']; ?></th>
<?php  endforeach?>
  <th class='text-center' align="center" colspan="2"></th>
  <th class='text-center' align="center" colspan="2"></th>
</tr>

      <tr>
        <td align='center' style='font-weight:bold'>URUT</td>
        <td align='center'  style='font-weight:bold'>INDUK</td>
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
    
                        <?php $no=0; foreach ($dataNilai2 as $Nilai):$no++;?>
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
                            </tr>
                            <?php  endforeach?> 
</table>  
  </div>
</div>


