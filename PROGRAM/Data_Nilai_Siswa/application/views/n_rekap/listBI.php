<div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
                         
<div class="page-header">
    <h1>DATA REKAPITULASI B. INDO</h1> 
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
                <a class="btn btn-xs btn-link panel-collapse collapses fa-lg" href="#" title='Hide'> </a>
                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh fa-lg" title='Refresh'></i> </a>
                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-eye fa-lg"></i> </a>
            </div>
        </div><br>

        <div class="panel-body">

<?php
            echo form_open('n_rekap/listnilaiBI', 'role="form" class="form-horizontal"');
            echo form_hidden('ID_Rombel', $n_rekap['ID_Rombel']);
            ?>

            <table id="table1" class="table table-striped table-bordered table-hover table-full-width dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class='text-center' align="center" rowspan="3">No</th>
                        <th class='text-center' align="center" rowspan="3">NAMA</th>
                        <th class='text-center' align="center" colspan="20">REKAPITULASI NILAI BAHASA INDONESIA</th>
                        <th class='text-center' align="center" rowspan="3">KETERANGAN</th>
                    </tr>
                                        <tr>
                        <th class='text-center' align="center" colspan="10">PENGETAHUAN</th>
                        <th class='text-center' align="center" colspan="10">KETERAMPILAN</th>
                    </tr>

               <tr>
                <th class='text-center' align="center" rowspan="">3.1</th>
                <th class='text-center' align="center" rowspan="">3.2</th>
                <th class='text-center' align="center" rowspan="">3.3</th>
                <th class='text-center' align="center" rowspan="">3.4</th>
                <th class='text-center' align="center" rowspan="">3.5</th>
                <th class='text-center' align="center" rowspan="">3.6</th>
                <th class='text-center' align="center" rowspan="">3.7</th>
                <th class='text-center' align="center" rowspan="">3.8</th>
                <th class='text-center' align="center" rowspan="">NA</th>
                <th class='text-center' align="center" rowspan="">P</th>
                <th class='text-center' align="center" rowspan="">4.1</th>
                <th class='text-center' align="center" rowspan="">4.2</th>
                <th class='text-center' align="center" rowspan="">4.3</th>
                <th class='text-center' align="center" rowspan="">4.4</th>
                <th class='text-center' align="center" rowspan="">4.5</th>
                <th class='text-center' align="center" rowspan="">4.6</th>
                <th class='text-center' align="center" rowspan="">4.7</th>
                <th class='text-center' align="center" rowspan="">4.8</th>
                <th class='text-center' align="center" rowspan="">NA</th>
                <th class='text-center' align="center" rowspan="">P</th>
                    </tr>

                </thead>
                <tbody>
                     
                   <?php $no=1; foreach ($getrow1 as $row):?>
                        <tr>
                            <td class='text-center' align="center"><?php echo $no++;?></td>
                            <td class='text-center' align="center"><?php echo $row->Nama; ?></td>
                            <td class='text-center' id="N1" align="center"><?php echo number_format($row->N1) ?></td>
                            <td class='text-center' id="N2" align="center"><?php echo number_format($row->N2) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N3) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N4) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N5) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N6) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N7) ?></td>
                            <td class='text-center' id="N3" align="center"><?php echo number_format($row->N8) ?></td>
                            <td class='text-center' align="center"><?php echo number_format($row->Rata1); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->Rata1) >= 90) echo "A"; elseif(number_format($row->Rata1) > 80 && number_format($row->Rata1) <90) echo "B";elseif(number_format($row->Rata1) > 70 && number_format($row->Rata1) <=80) echo "C"; else echo "D" ; ?></td>            
                            <td class='text-center' id="N4" align="center"><?php echo number_format($row->N9) ?></td>
                            <td class='text-center' id="N5" align="center"><?php echo number_format($row->N10) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N11) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N12) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N13) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N14) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N15) ?></td>
                            <td class='text-center' id="N6" align="center"><?php echo number_format($row->N16) ?></td>
                            <td class='text-center' align="center"><?php echo number_format($row->Rata2); ?></td>
                            <td class='text-center' align="center"><?php if(number_format($row->Rata2) >= 90) echo "A"; elseif(number_format($row->Rata2) > 80 && number_format($row->Rata2) <90) echo "B";elseif(number_format($row->Rata2) > 70 && number_format($row->Rata2) <=80) echo "C"; else echo "D" ; ?></td>
                             <td class='text-center' align="center">&nbsp;</td>
                        </tr>
                    <?php  endforeach?>   
                </tbody>
            </table>                
<table align="center" >
    <tr>
        <td>
            <div class="form-group">
<div class="col-sm-1">


<a target="_blank" class="btn btn-info btn-sm" title='Print List' href="<?=base_url('index.php/n_rekap/printNilaiBI/'.$n_rekap['ID_Rombel']);?>">PRINT</a>


 </div>
            </div>
            </td>
    
<td>
            <div class="form-group">
                <div class="col-sm-1">
                    <?php echo anchor('n_rekap', 'KEMBALI', array('class' => 'btn btn-danger btn-sm')); ?>
                </div>
            </div>
        </td>


</tr>
</table>

        </div>  
    </div>
</center>
</div>
<!--View-->

<script src="../assets/jquery/jquery-1.12.4.js"></script>
<script src="../assets/jquery/jquery.dataTables.min.js"></script>

<script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script>
<script>
$(document).ready(function(){
    $("#print").hide();
 function myFunction(){
  $("#submit").toggle();
}
});
</script>
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


