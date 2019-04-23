<div class="col-sm-12">


    <div class="page-header">
    <h1>My Profile</h1>                         
    </div>

    <!-- start: TEXT FIELDS PANEL -->


            <?php
            echo form_open('users/profile', 'role="form" class="form-horizontal"');
            ?>
<?php 
                    $id_user=$this->session->userdata('id_user');
                    $qu=$this->db->query("select * from tbl_user a join tb_m_guru b on a.username=b.username join tb_m_siswa c on a.username=c.NISN where a.id_user='$id_user'")->row_array(); ?>
          <table width="100%" align="center">
          <tr>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Nama Lengkap
                </label>
                <div class="col-sm-5">
                    <?php echo $this->session->userdata('nama_lengkap') ?>
                </div>
            </div>
                
</tr>
<tr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label" for="form-field-1">Username</label>
                      <div class="col-sm-5"><?php echo $qu['username']; ?></div>
                    </div>
</tr>
<tr>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    Foto Profile
                </label>
                <div class="col-sm-5">
                   <img class="circle-img" src="<?php echo base_url('uploads/foto_user/'.$this->session->userdata('foto')); ?>" />
                </div>
            </div>
</tr>
<tr>
            <div class="form-group">
                <label class="col-sm-5 control-label" for="form-field-1">
                    NIP/NISN
                </label>
                <div class="col-sm-5">
<div class="col-sm-5"><?php echo $qu['NIP']; ?><?php echo $qu['NISN']; ?></div>
                    </div>
            </div>
        </tr>
              
</table>
            </form>

        </div>
    </div>

    <!-- end: TEXT FIELDS PANEL -->
</div>


