<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
                         
<div class="page-header">
    <h1>Data Nilai Pengetahuan</h1> 
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/jquery/jquery-1.12.4.js"></script>
    <script src="../assets/jquery/jquery.dataTables.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</div>


                                    <?php
                            $data=$this->session->flashdata('success');
                            if($data!=""){ ?>
                            <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
                            <?php } ?>
   
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Dynamic Table
            <div class="panel-tools">
                <?php echo anchor('nilai_H/add','<i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>',"title='Tambah Data'");?>
                <a class="btn btn-xs btn-link panel-collapse collapses fa-lg" href="#" title='Hide'> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh fa-lg" title='Refresh'></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-eye fa-lg"></i> </a>
                <a target="_blank" class="fa fa-file-pdf-o fa-lg" title='Print List' href="<?=base_url('index.php/nilai_H/printN');?>"></a>
            </div>
        </div><br>

        <div class="panel-body">
            <table id="table1" class="table table-striped table-bordered table-hover table-full-width dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class='text-center' align="center">No</th>
                        <th class='text-center' align="center">Nama</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Semester</th>
                        <th class='text-center' align="center">Tahun Pelajaran</th>
                        <th class='text-center' align="center">Nama Mapel</th>
                        <th class='text-center' align="center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     
                    <?php $no=1; foreach ($dataNilai as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $row['Nama']; ?></td>
                            <td class='text-center' align="center"><?php echo $row['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php if ($row['Semester'] === '1'):?>
                        <label>Ganjil</label>
                        <?php
                    elseif ($row['Semester'] === '2'):?>
                        <label>Genap</label>
                <?php endif;?></td>
                            <td class='text-center' align="center"><?php echo $row['tahun_akademik']; ?></td>
                            <td class='text-center' align="center"><?php echo $row['Nama_Mapel']; ?></td>
                            
                            
                            <td class='text-center' align="center">
                                <center><a href="<?php echo site_url('nilai_H/listnilai/'.$row['ID_P_H']); ?>" class="fa fa-newspaper-o" data-original-title="Detail" data-placement="top"><i class="icon-book"></i></a>
                  </center>     
                  
                            </td>
                        </tr>
                    <?php  endforeach?>   
                </tbody>
            </table>                
        </div>  
    </div>
</center>
</div>
<!--View-->

<script src="../assets/jquery/jquery-1.12.4.js"></script>
<script src="../assets/jquery/jquery.dataTables.min.js"></script>


  <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable();
     
            $('#table1 tbody')
                .on( 'mouseenter', 'td', function () {
                    var colIdx = table.cell(this).index().column;
         
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                } );
        } );
    </script>


