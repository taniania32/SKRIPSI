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
    <h1>Laporan Siswa</h1> 
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/jquery/jquery-1.12.4.js"></script>
    <script src="../assets/jquery/jquery.dataTables.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</div>

  <div class="panel-body">
  <form class="form-inline" action="<?php echo site_url('laporansw/l_sw'); ?>" method="post">
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
      <button type="submit" class="btn btn-default">Search</button>
    </td>
    <td>
      <?php if($count>0){ ?>
<a target="_blank" class="btn btn-primary btn-sm"  href="<?=base_url('index.php/laporansw/report');?>/<?php if(isset($_POST['ID_Rombel'])) echo $_POST['ID_Rombel']; ?>"> PRINT </a>
      <?php } ?>
</td>
    </div>
    </table>
    <script type="text/javascript">
   $("#ID_Rombel").val("<?php echo $_POST['ID_Rombel'];?>");
</script>
  </form>
   <table class="table table-bordered">
    <thead>
                    <tr>
                        <th class='text-center' align="center">No</th>
                        <th class='text-center' align="center">NISN</th>
                        <th class='text-center' align="center">No. Induk</th>
                        <th class='text-center' align="center">Nama</th>
                        <th class='text-center' align="center">Jenis Kelamin</th>
                        <th class='text-center' align="center">Keterangan</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                     
                   <?php $no=0; foreach ($dataSiswa as $row):$no++;?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no;?></td>
                            <td class='text-center' align="center"><?php echo $row->NISN; ?></td>
                            <td class='text-center' align="center"><?php echo $row->No_Induk; ?></td>
                            <td class='text-left' align="center"><?php echo $row->Nama; ?></td>
                            <td class='text-center' align="center"><?php if ($row->JK === 'L'):?>
                        <label>LAKI-LAKI</label>
                        <?php
                    elseif ($row->JK === 'P'):?>
                        <label>PEREMPUAN</label>
                <?php endif;?>  
                            </td>
                            <td class='text-center' align="center"><?php echo $row->Ket; ?></td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Rombel; ?></td>
                            <td class='text-center' align="center"><?php echo $row->ID_Kelas; ?></td>
                          
                        </tr>
                    <?php  endforeach?>   
</table>  
  </div>
</div>

