<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="page-header">
    <h1>Data Mata Pelajaran</h1>                         

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
                <?php echo anchor('mapel/add','<i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>',"title='Tambah Data'");?>
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-eye fa-lg"></i> </a>
            </div>
        </div>


        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Mapel</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>


  <script>
        $(document).ready(function() {
            var t = $('#mytable').DataTable( {
                "ajax": '<?php echo site_url('mapel/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "ID_Mapel",
                        "width": "120px",
                        "sClass": "text-center"
                    },
                    { "data": "Nama_Mapel", "sClass": "text-center" },
                    { "data": "aksi","width": "80px", "sClass": "text-center" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>