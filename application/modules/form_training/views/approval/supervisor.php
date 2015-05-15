<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		
		
	    <div id="container">
	    	<div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Form Pengajuan <span class="semi-bold">Pelatihan</span></h4>
            </div>
            <div class="grid-body no-border">
            <?php
            if($_num_rows > 0){
              foreach($form_training as $user){
                if ($user->tanggal == 0000-00-00) {
                  $tanggal = "";
                  $jam = "";
                }else{
                  $tanggal = getDateFormat($user->tanggal);
                  $jam = $user->jam;
                }
              ?>
              <form class="form-no-horizontal-spacing" id="formAppLv1" action="<?php echo site_url() ?>form_training/do_approve_spv" method="post">
                <input type="hidden" name="form_training_id" value="<?php echo $user->id ?>">
                <div class="row column-seperation">
                  <div class="col-md-12">    
                    <?php foreach ($user_info as $ui) { ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="nik" value="<?php echo $ui->nik ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-9">
                        <input name="emp_name" id="emp_name" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->first_name.' '.$user->last_name ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="position" id="position" type="text"  class="form-control" placeholder="-" value="<?php echo $ui->position_nm ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Dept/Bagian</label>
                      </div>
                      <div class="col-md-9">
                        <input name="org_id" id="org_id" type="text"  class="form-control" placeholder="-" value="<?php echo $ui->org_nm ?>" disabled="disabled">
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Nama Program Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="training_nm" id="training_nm" type="text"  class="form-control" placeholder="Nama program pelatihan" value="<?php echo $user->training_name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tujuan Pelatihan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="tujuang_training" id="tujuang_training" type="text"  class="form-control" placeholder="Tujuan pelatihan" value="<?php echo $user->tujuan_training?>" disabled="disabled">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="col-md-12 text-center">
                    <div class="row wf-cuti">
                      <div class="col-md-4">
                        Diusulkan oleh,<br/><br/>
                         <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo $user->first_name.' '.$user->last_name ?></span><br/>
                            <span class="small"><?php echo $user->created_on?></span><br/>
                          </p>
                      </div>
                      <div class="col-md-4">
                        Persetujuan atasan,<br/><br/>
                        <?php if ($user->is_app_lv1 == 1) { ?>
                            <span class="semi-bold"><?php echo $user_app_lv1_nm?></span><br/>
                            <span class="small"><?php echo $user->date_app_lv1?></span>
                        <?php } else { ?>
                          <button type="submit" class="btn btn-danger btn-cons" id="btn_app_lv1" type=""><i class="icon-ok"></i>Approve</button>
                        <?php } ?>
                      </div>
                      <div class="col-md-4">
                        Mengetahui HRD,<br/><br/>
                        <p class="wf-approve-sp">
                          <?php if ($user->is_app_lv2 == 1) { ?>
                            <span class="semi-bold"><?php echo $user_app_lv2_nm?></span><br/>
                            <span class="small"><?php echo $user->date_app_lv1?></span>  
                          <?php } else { ?>
                            <span class="semi-bold">-</span><br/>
                            <span class="small">-</span>
                          <?php } ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE --> 