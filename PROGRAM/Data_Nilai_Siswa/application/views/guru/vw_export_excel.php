<?php 
 header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th>NIP</th>

 <th>Nama Guru</th>



 </tr>

</thead>

<tbody>

<?php $i=1; foreach($guru1 as $guru) { ?>

<tr>
 <td class='text-center' align="center"><?php echo $guru['NIP']; ?></td>
                            <td class='text-center' align="center"><?php echo $guru['Nama_Guru']; ?></td>
                           

 </tr>

<?php $i++; } ?>

</tbody>

</table>