<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
                         
<div class="page-header">
    <h1>Data Nilai Raport</h1> 
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

                            <?php
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
   
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> Dynamic Table
            

        <div class="panel-body">
            <table id="table1" class="table table-striped table-bordered table-hover table-full-width dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class='text-center' align="center">No</th>
                        <th class='text-center' align="center">Nama Lengkap</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Semester</th>
                        <th class='text-center' align="center">Tahun Pelajaran</th>
                        <th class='text-center' align="center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     
                    <?php $no=1; foreach ($dataNilai as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $row->Nama; ?></td>
                            <td class='text-center' align="center"><?php echo $row->Nama_Rombel; ?></td>
                            <td class='text-center' align="center"><?php if ($row->Semester === '1'):?>
                        <label>Ganjil</label>
                        <?php
                    elseif ($row->Semester === '2'):?>
                        <label>Genap</label>
                <?php endif;?></td>
                            <td class='text-center' align="center"><?php echo $row->tahun_akademik; ?></td>
                            </td>
                            <td class='text-center' align="center">
                                <center>
                                  
                    <a target="_blank" class="btn btn-info btn-sm" title='Print List' href="<?=base_url('index.php/n_raport/printNilai/'.$row->ID_Raport);?>">PRINT</a>              
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


