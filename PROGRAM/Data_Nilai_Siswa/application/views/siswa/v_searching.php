<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
  <html>
  <head>
       <title>
            <?php echo $title; ?>
       </title>
       <style>
            body {
                 font-family: 'Raleway', sans-serif;
            }
 
            #gp_head
            {
                 text-align: center;
                 background-color: #61CAFA;
                 height: 66px;
                 margin: 0 0 -29px 0;
                 padding-top: 35px;
                 border-radius: 8px 8px 0 0;
                 color: rgb(255, 255, 255);
            }
 
            #gp_tabel {
                 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                 width: 80%;
                 border-collapse: collapse;
            }
 
            #gp_tabel td, #gp_tabel th {
                 font-size: 1em;
                 border: 1px solid #61CAFA;
                 padding: 3px 7px 2px 7px;
            }
 
            #gp_tabel th {
                 font-size: 1.1em;
                 text-align: center;
                 padding-top: 5px;
                 padding-bottom: 4px;
                 background-color: #61CAFA;
                 color: #ffffff;
            }
 
            #gp_tabel tr.alt td {
                 color: #000000;
                 background-color: #61CAFA;
            }
 
            #gp_tabel a {
                 border:solid 1px;
                 -webkit-border-radius:3px;
                 padding:6px 9px 6px 9px;
            }
 
            #gp_tabel a:hover,
            #gp_tabel a.current
            {
                 color:#FFFFFF;
                 box-shadow:0px 1px #EDEDED;
                 -moz-box-shadow:0px 1px #EDEDED;
                 -webkit-box-shadow:0px 1px #EDEDED;
            }
 
            #gp_tabel a:hover,
            #gp_tabel a.current
            {
                 text-shadow:0px 1px #388DBE;
                 border-color:#3390CA;
                 background:#58B0E7;
                 background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
                 background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
            }
 
            #gp_tabel a
            {
                 color:#58B0E7;
                 display:block;
                 text-decoration:none;
                 padding:7px 10px 7px 10px;
            }
 
            #pagination{
                 margin: 40 40 0;
            }
 
            ul.gp_pagination li a
            {
                 border:solid 1px;
                 border-radius:3px;
                 -moz-border-radius:3px;
                 -webkit-border-radius:3px;
                 padding:6px 9px 6px 9px;
            }
            ul.gp_pagination li
            {
                 padding-bottom:1px;
            }
            ul.gp_pagination li a:hover,
            ul.gp_pagination li a.current
            {
                 color:#FFFFFF;
                 box-shadow:0px 1px #EDEDED;
                 -moz-box-shadow:0px 1px #EDEDED;
                 -webkit-box-shadow:0px 1px #EDEDED;
            }
            ul.gp_pagination
            {
                 margin:4px 0;
                 padding:0px;
                 height:100%;
                 overflow:hidden;
                 font:12px 'Tahoma';
                 list-style-type:none;
            }
            ul.gp_pagination li
            {
                 float:left;
                 margin:0px;
                 padding:0px;
                 margin-left:5px;
            }
            ul.gp_pagination li a
            {
                 color:black;
                 display:block;
                 text-decoration:none;
                 padding:7px 10px 7px 10px;
            }
            ul.gp_pagination li a img
            {
                 border:none;
            }
            ul.gp_pagination li a
            {
                 color:#0A7EC5;
                 border-color:#8DC5E6;
                 background:#F8FCFF;
            }
            ul.gp_pagination li a:hover,
            ul.gp_pagination li a.current
            {
                 text-shadow:0px 1px #388DBE;
                 border-color:#3390CA;
                 background:#58B0E7;
                 background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
                 background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
            }
 
            #container {
                 margin: 10px;
                 border: 1px solid #D0D0D0;
                 box-shadow: 0 0 8px #D0D0D0;
            }
 
            #body {
                 margin: 0 15px 0 15px;
            }
            h1 {
                 color: #444;
                 background-color: transparent;
                 border-bottom: 1px solid #D0D0D0;
                 font-size: 19px;
                 font-weight: normal;
                 margin: 0 0 14px 0;
                 padding: 14px 15px 10px 15px;
            }
 
            input[type=submit] {
                 border:solid 1px;
                 border-radius:3px;
                 -moz-border-radius:3px;
                 -webkit-border-radius:3px;
                 padding:6px 9px 6px 9px;
                 color:black;
 
                 color:#0A7EC5;
                 border-color:#8DC5E6;
                 background:#F8FCFF;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 margin: 4px 2px;
                 cursor: pointer;
            }
 
            input[type=submit]:hover {
                 text-shadow:0px 1px #388DBE;
                 border-color:#3390CA;
                 background:#58B0E7;
                 background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
                 background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
            }
 
            input[type=text] {
                 width: 250px;
                 box-sizing: border-box;
                 border: 2px solid #ccc;
                 border-radius: 4px;
                 padding:6px 9px 6px 9px;
                 font-size: 16px;
                 background-color: white;
                 background-image: url('searchicon.png');
                 background-position: 10px 10px;
                 background-repeat: no-repeat;;
                 -webkit-transition: width 0.4s ease-in-out;
                 transition: width 0.4s ease-in-out;
            }
 
            .gp_btn ul {
                 list-style-type: none;
                 margin: 0;
                 padding: 0;
            }
 
            .gp_btn li {
                 display: inline-block;
            }
 
            .btn2 {
                 border:solid 1px;
                 border-radius:3px;
                 -moz-border-radius:3px;
                 -webkit-border-radius:3px;
                 padding:6px 9px 6px 9px;
                 color:black;
                 display:block;
 
                 color:#0A7EC5;
                 border-color:#8DC5E6;
                 background:#F8FCFF;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 margin: 4px 2px;
                 cursor: pointer;
            }
 
            .btn2:hover {
                 text-shadow:0px 1px #388DBE;
                 border-color:#3390CA;
                 background:#58B0E7;
                 background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
                 background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
            }
       </style>
  </head>
  <body>
      <div id="container">
           <div id="body">
                 <h1>Data Buku</h1>
 
                 <div class="gp_btn">
                      <ul>
                           <li>
                                <?php echo form_open('C_search/cari');?>
                                     <input type="text" name="key" placeholder="Search..." size="50" required>
                                     <input type="submit" name="search" value="Search">
                                <?php echo form_close();?>
                           </li>
                           <li><a class="btn2" href="<?php echo base_url(); ?>index.php/C_search/">Reload</a></li>
                      </ul>
                 </div>
 
                 <table id="gp_tabel">
                 <tr>
                     <th class='text-center' align="center">NO</th>
                        <th class='text-center' align="center">NISN</th>
                        <th class='text-center' align="center">No. Induk</th>
                        <th class='text-center' align="center">Nama</th>
                        <th class='text-center' align="center">Jenis Kelamin</th>
                        <th class='text-center' align="center">Keterangan</th>
                        <th class='text-center' align="center">Rombel</th>
                        <th class='text-center' align="center">Kelas</th>
                        <th class='text-center' align="center">Aksi</th
                 </tr>
                 <?php
                if($this->uri->segment(4)){
                     $no=$this->uri->segment(4);
                }
                else{
                     $no=0;
                }
 
                 
                 foreach ($data_buku as $row)
                 {
                      $no++;
                      ?>

  <tr>
  <td class='text-center' align="center"><?php echo $no++;?></td>
  <td class='text-center' align="center"><?php echo $row->NISN;?></td>
  <td class='text-center' align="center"><?php echo $row->No_Induk;?></td>
  <td class='text-left' align="center"><?php echo $row->Nama;?></td>
  <td class='text-center' align="center"><?php echo $row->JK;?></td>
  <td class='text-center' align="center"><?php echo $row->Ket;?></td>
  <td class='text-center' align="center"><?php echo $row->ID_Rombel;?></td>
  <td class='text-center' align="center"><?php echo $row->ID_Kelas;?></td>
  <td><?php
                 }
                 ?>
            </table>
 
            <div id="pagination">
                 <ul class="gp_pagination">
 
                      <!-- Pagination links -->
                      <?php foreach ($links as $link) {
                           echo "<li>". $link."</li>";
                      } ?>
                 </ul>
            </div>
           </div>
       </div>
  </body>
  </html>