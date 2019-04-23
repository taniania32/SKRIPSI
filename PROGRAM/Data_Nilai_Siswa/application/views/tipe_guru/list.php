<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
   <div class="page-header">
    <h1>Data Tipe Guru</h1>                         

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
                <?php echo anchor('tipe_guru/add','<i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>',"title='Tambah Data'");?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>

                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-eye fa-lg"></i> </a>
            </div>
        </div>

        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class='text-center' align="center">NO</th>
                        <th class='text-center' align="center">Nama Tipe Guru</th>
                        <th class='text-center' align="center">Aksi</th>
                    </tr>
                </thead>
            <tbody>
                     
                    <?php $no=1; foreach ($dataTipeGuru as $tipe_guru):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center">
                            <?php
                                if ($tipe_guru['Nama_Tipe_Guru'] === 'GP'):?>
                        <label>Guru Mapel</label>
                        <?php
                    elseif ($tipe_guru['Nama_Tipe_Guru'] === 'GK'):?>
                        <label>Guru Kelas</label>
                <?php endif;?>
                                </td>
                            <td class='text-center' align="center">
                                <center>
                                    <a href="<?php echo site_url('tipe_guru/edittipe/'.$tipe_guru['ID_Tipe_Guru']); ?>" class="fa fa-pencil-square-o" data-original-title="Update" data-placement="top"><i class="icon-pencil5"></i></a>
                                    <a href="<?php echo site_url('tipe_guru/delete/'.$tipe_guru['ID_Tipe_Guru']); ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');" class="fa fa-trash" data-popup="tooltip" data-original-title="Delete" style="color: red" data-placement="top"><i class="icon-x"></i></a>
                  </center>     
                            </td>
                        </tr>
                    <?php  endforeach?>   
                </tbody>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="../assets/jquery-1.12.4.js"></script>
<script src="../assets/jquery.dataTables.min.js"></script>

  <script>
        $(document).ready(function() {
            var table = $('#mytable').DataTable();
     
            $('#mytable tbody')
                .on( 'mouseenter', 'td', function () {
                    var colIdx = table.cell(this).index().column;
         
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                } );
        } );
    </script>

