<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
                         
<div class="page-header">
    <h1>Data Rekapitulasi Nilai</h1> 
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
           
                
            </div>
        </div><br>

        <div class="panel-body">
            <table id="table1" class="table table-striped table-bordered table-hover table-full-width dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class='text-center' align="center">No</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Semester</th>
                        <th class='text-center' align="center">Tahun Pelajaran</th>
                        <th class='text-center' align="center">Rekap Mapel</th>
                    </tr>
                </thead>
                <tbody>
                     
                    <?php $no=1; foreach ($dataNilai as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $row['Nama_Rombel']; ?></td>
                            <td class='text-center' align="center"><?php if ($row['Semester'] === '1'):?>
                        <label>Ganjil</label>
                        <?php
                    elseif ($row['Semester'] === '2'):?>
                        <label>Genap</label>
                <?php endif;?></td>
                            <td class='text-center' align="center"><?php echo $row['tahun_akademik']; ?></td>
                            
                            
                            <td class='text-center' align="center">
                                <center>
                                    <a href="<?php echo site_url('n_rekap/listnilai/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">PKN</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiBI/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">BI</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiMTK/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">MTK</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiIPA/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">IPA</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiIPS/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">IPS</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiSB/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">SBdP</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiAG/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">AGAMA</a>
                                    <a href="<?php echo site_url('n_rekap/listnilaiPJ/'.$row['ID_Rombel']); ?>" style='font-weight:bold' class="btn btn-info btn-sm">PJOK</a>

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


